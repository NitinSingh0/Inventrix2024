<?php
session_start();
header('Content-Type: application/json');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Fetch details of a single user
        async function fetchUserDetails(email) {
            const response = await fetch('admin.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: 'fetch_one',
                    email
                })
            });
            const data = await response.json();
            if (data) {
                document.getElementById('userDetails').innerHTML = `
                    <p><strong>Email:</strong> ${data.email}</p>
                    <p><strong>Event:</strong> ${data.event}</p>
                    <p><strong>Leader Name:</strong> ${data.leader_name}</p>
                    <p><strong>Roll No:</strong> ${data.roll_no}</p>
                    <p><strong>Class:</strong> ${data.class}</p>
                    <p><strong>Players:</strong> ${data.players.length > 0 ? data.players.join(', ') : 'No players'}</p>
                    <p><strong>Payment Status:</strong> ${data.Payment_status}</p>
                    <button onclick="updatePayment('${data.email}', '${data.Payment_status}')" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Toggle Payment Status</button>
                    <button onclick="deleteUser('${data.email}')" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Delete User</button>
                `;
            }
        }

        // Fetch all registrations
        async function fetchAllRegistrations() {
            const response = await fetch('admin.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: 'fetch_all'
                })
            });
            const data = await response.json();
            let table = `
                <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">Email</th>
                            <th class="border border-gray-300 px-4 py-2">Event</th>
                            <th class="border border-gray-300 px-4 py-2">Leader Name</th>
                            <th class="border border-gray-300 px-4 py-2">Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
            `;
            data.forEach(user => {
                table += `
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">${user.email}</td>
                        <td class="border border-gray-300 px-4 py-2">${user.event}</td>
                        <td class="border border-gray-300 px-4 py-2">${user.leader_name}</td>
                        <td class="border border-gray-300 px-4 py-2">${user.Payment_status}</td>
                    </tr>
                `;
            });
            table += '</tbody></table>';
            document.getElementById('userDetails').innerHTML = table;
        }

        // Update payment status
        async function updatePayment(email, current_status) {
            const response = await fetch('admin.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: 'update',
                    email,
                    current_status
                })
            });
            const data = await response.json();
            alert(data.message || data.error);
            fetchUserDetails(email);
        }

        // Delete user
        async function deleteUser(email) {
            if (confirm('Do you really want to delete this user?')) {
                const response = await fetch('admin.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        action: 'delete',
                        email
                    })
                });
                const data = await response.json();
                alert(data.message || data.error);
                document.getElementById('userDetails').innerHTML = '';
            }
        }
    </script>
</head>
<?php

require 'config/connect.php'; // Ensure the correct path to your config file

// Redirect if not logged in as admin
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}



// Handle AJAX requests
$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $data['action'] ?? null;
    $email = $data['email'] ?? null;

    if ($action === 'update') {
        $current_status = $data['current_status'] ?? null;
        $new_status = ($current_status === 'P') ? 'U' : 'P';

        $stmt = $conn->prepare("UPDATE registration SET Payment_status = ? WHERE email = ?");
        $stmt->bind_param('ss', $new_status, $email);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Payment status updated successfully!"]);
        } else {
            echo json_encode(["error" => "Failed to update payment status."]);
        }
    } elseif ($action === 'delete') {
        $stmt = $conn->prepare("DELETE FROM registration WHERE email = ?");
        $stmt->bind_param('s', $email);

        if ($stmt->execute()) {
            echo json_encode(["message" => "User deleted successfully!"]);
        } else {
            echo json_encode(["error" => "Failed to delete user."]);
        }
    } elseif ($action === 'fetch_all') {
        $result = $conn->query("SELECT * FROM registration");
        echo json_encode($result->fetch_all(MYSQLI_ASSOC));
    } elseif ($action === 'fetch_one') {
        $stmt = $conn->prepare("SELECT * FROM registration WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (!empty($user['players'])) {
            $user['players'] = json_decode($user['players'], true); // Decode JSON array
        } else {
            $user['players'] = [];
        }
        echo json_encode($user);
    }
    exit;
}
?>

<body class="bg-gray-100 text-gray-900">
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-md rounded-md">
        <h2 class="text-xl font-bold mb-4">Admin - Payment Management</h2>
        <label for="email" class="block text-sm font-medium mb-2">Enter User Email:</label>
        <input id="email" type="email" class="border border-gray-300 rounded-md p-2 w-full mb-4">
        <button onclick="fetchUserDetails(document.getElementById('email').value)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Fetch Details</button>
        <button onclick="fetchAllRegistrations()" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Show All Registrations</button>
        <div id="userDetails" class="mt-4 p-4 bg-gray-200 rounded-md"></div>
    </div>
</body>

</html>