<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

require 'config/connect.php';

// Fetching user details if email is submitted
$registrations = [];
$email = '';

if (isset($_POST['fetch_email']) && !empty($_POST['email'])) {
    $email = $_POST['email'];

    // Prepare the query to fetch all registrations with this email
    $stmt = $conn->prepare("SELECT * FROM registrations WHERE email = ?");

    if ($stmt === false) {
        die('Error preparing query: ' . $conn->error);
    }

    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are results
    if ($result->num_rows > 0) {
        $registrations = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $error = "No user found with this email.";
    }
}

// Fetching all registrations for report
if (isset($_POST['generate_report'])) {
    $registrations = [];
    $stmt = $conn->query("SELECT * FROM registrations");
    if ($stmt) {
        $registrations = $stmt->fetch_all(MYSQLI_ASSOC);
    }
}

// Toggle payment status
if (isset($_POST['toggle_payment_status'])) {
    $id = $_POST['id'];
    $current_status = $_POST['current_status'];

    // Toggle the payment status
    $new_status = $current_status == 'U' ? 'P' : 'U';
    $stmt = $conn->prepare("UPDATE registrations SET Payment_status = ? WHERE id = ?");
    $stmt->bind_param('si', $new_status, $id);
    $stmt->execute();
    header("Location: admin.php"); // Redirect to reload the page
    exit;
}

// Delete user
if (isset($_POST['delete_user'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM registrations WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    header("Location: admin.php"); // Redirect to reload the page
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-900">
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-md rounded-md">
        <h2 class="text-xl font-bold mb-4">Admin - Payment Management</h2>

        <!-- Form to fetch user details by email -->
        <form method="POST" class="mb-6">
            <label for="email" class="block text-sm font-medium mb-2">Enter User Email:</label>
            <input id="email" name="email" type="email" class="border border-gray-300 rounded-md p-2 w-full mb-4" required>
            <button type="submit" name="fetch_email" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Fetch Details</button>
        </form>

        <?php if (isset($email) && !empty($email)): ?>
            <!-- Displaying user details in a table if fetched by email -->
            <div class="p-4 bg-gray-200 rounded-md mb-6">
                <h3 class="text-lg font-semibold">User Details for Email: <?php echo $email; ?></h3>
                <?php if (!empty($registrations)): ?>
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="border border-gray-300 px-4 py-2">Email</th>
                                    <th class="border border-gray-300 px-4 py-2">Event</th>
                                    <th class="border border-gray-300 px-4 py-2">Leader Name</th>
                                    <th class="border border-gray-300 px-4 py-2">Roll No</th>
                                    <th class="border border-gray-300 px-4 py-2">Class</th>
                                    <th class="border border-gray-300 px-4 py-2">Created At</th>
                                    <th class="border border-gray-300 px-4 py-2">Players</th>
                                    <th class="border border-gray-300 px-4 py-2">Payment Status</th>
                                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($registrations as $reg): ?>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2"><?php echo $reg['email']; ?></td>
                                        <td class="border border-gray-300 px-4 py-2"><?php echo $reg['event']; ?></td>
                                        <td class="border border-gray-300 px-4 py-2"><?php echo $reg['leader_name']; ?></td>
                                        <td class="border border-gray-300 px-4 py-2"><?php echo $reg['roll_no']; ?></td>
                                        <td class="border border-gray-300 px-4 py-2"><?php echo $reg['class']; ?></td>
                                        <td class="border border-gray-300 px-4 py-2"><?php echo $reg['created_at']; ?></td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <?php
                                            $players = json_decode($reg['players'], true); // Decode players if stored as JSON
                                            if (empty($players)) {
                                                echo "Single Person";
                                            } else {
                                                echo implode(", ", $players);
                                            }
                                            ?>
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <?php echo $reg['Payment_status'] == 'P' ? 'Paid' : 'Unpaid'; ?>
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <form method="POST" style="display:inline;">
                                                <input type="hidden" name="id" value="<?php echo $reg['id']; ?>">
                                                <input type="hidden" name="current_status" value="<?php echo $reg['Payment_status']; ?>">
                                                <button type="submit" name="toggle_payment_status" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                                    <?php echo $reg['Payment_status'] == 'P' ? 'Unpaid' : 'Paid'; ?>
                                                </button>
                                            </form>
                                            <form method="POST" style="display:inline;">
                                                <input type="hidden" name="id" value="<?php echo $reg['id']; ?>">
                                                <button type="submit" name="delete_user" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-red-500"><?php echo $error; ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Button to generate the full report -->
        <form method="POST" class="mb-6">
            <button type="submit" name="generate_report" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Generate Report</button>
        </form>

        <?php if (isset($registrations) && !empty($registrations)): ?>
            <!-- Displaying full report only after "Generate Report" button is clicked -->
            <div class="p-4 bg-gray-200 rounded-md mb-6">
                <h3 class="text-lg font-semibold">Full Registration Report</h3>
                <div class="overflow-x-auto">
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2">Email</th>
                                <th class="border border-gray-300 px-4 py-2">Event</th>
                                <th class="border border-gray-300 px-4 py-2">Leader Name</th>
                                <th class="border border-gray-300 px-4 py-2">Roll No</th>
                                <th class="border border-gray-300 px-4 py-2">Class</th>
                                <th class="border border-gray-300 px-4 py-2">Created At</th>
                                <th class="border border-gray-300 px-4 py-2">Players</th>
                                <th class="border border-gray-300 px-4 py-2">Payment Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($registrations as $reg): ?>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2"><?php echo $reg['email']; ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?php echo $reg['event']; ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?php echo $reg['leader_name']; ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?php echo $reg['roll_no']; ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?php echo $reg['class']; ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?php echo $reg['created_at']; ?></td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <?php
                                        $players = json_decode($reg['players'], true);
                                        if (empty($players)) {
                                            echo "Single Person";
                                        } else {
                                            echo implode(", ", $players);
                                        }
                                        ?>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2"><?php echo $reg['Payment_status'] == 'P' ? 'Paid' : 'Unpaid'; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>