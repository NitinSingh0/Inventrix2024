<?php
// Database connection
include('../../config/connect.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch common form data
    $event = htmlspecialchars($_POST['event']);
    $email = htmlspecialchars($_POST['email']);
    $leader_name = isset($_POST['leader_name']) ? htmlspecialchars($_POST['leader_name']) : null;
    $roll_no = isset($_POST['roll_no']) ? htmlspecialchars($_POST['roll_no']) : null;
    $class = isset($_POST['class']) ? htmlspecialchars($_POST['class']) : null;

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Handle group players if present
    $players = [];
    if (isset($_POST['num_players'])) {
        $num_players = intval($_POST['num_players']);
        for ($i = 2; $i <= $num_players; $i++) {
            if (isset($_POST["player{$i}_name"])) {
                $players[] = htmlspecialchars($_POST["player{$i}_name"]);
            }
        }
    }

    // Insert data into database
    $stmt = $conn->prepare("INSERT INTO registrations (event, email, leader_name, roll_no, class, players) VALUES (?, ?, ?, ?, ?, ?)");
    $players_json = json_encode($players);
    $stmt->bind_param('ssssss', $event, $email, $leader_name, $roll_no, $class, $players_json);

    if ($stmt->execute()) {
        // Send personalized confirmation email
        $subject = "Registration Confirmation for $event";
        $message = "Dear ";

        if ($leader_name) {
            $message .= "$leader_name";
        } else {
            $message .= "Participant";
        }

        $message .= ",\n\nThank you for registering for the event: $event.\n";

        if ($leader_name && !empty($players)) {
            $message .= "Team Details:\n";
            $message .= "Team Leader: $leader_name\n";
            foreach ($players as $index => $player) {
                $message .= "Player " . ($index + 2) . ": $player\n";
            }
        } elseif ($roll_no && $class) {
            $message .= "Your Details:\nRoll No: $roll_no\nClass: $class\n";
        }

        $message .= "\nPlease ensure your payment is completed to confirm your participation. Event and payment details will be shared soon.\n\nBest regards,\nEvent Team";

        $headers = "From: noreply@event.com";

        if (mail($email, $subject, $message, $headers)) {
            echo "Registration successful. A confirmation email has been sent to $email.";
        } else {
            echo "Registration successful, but there was an issue sending the confirmation email.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();
}
?>