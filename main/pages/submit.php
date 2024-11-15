<?php
// Import PHPMailer classes at the top
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include the required PHPMailer files
require('PHPMailer.php');
require('Exception.php');
require('SMTP.php');

// Database connection
include('../../config/connect.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data
    $event = htmlspecialchars($_POST['event']);
    $email = htmlspecialchars($_POST['email']);
    $leader_name = isset($_POST['leader_name']) ? htmlspecialchars($_POST['leader_name']) : htmlspecialchars($_POST['name']);
    $roll_no = isset($_POST['roll_no']) ? htmlspecialchars($_POST['roll_no']) : null;
    $class = isset($_POST['class']) ? htmlspecialchars($_POST['class']) : null;
    $whatsapp = "https://www.google.com";

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
                showAlert('Invalid email format', 'error');
                window.location.href = 'event.php'; // Redirect to event page
              </script>";
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
        // Send confirmation email
        $mail = new PHPMailer(true);

        try {
            // Mail server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;

            $mail->Username = 'itinventrix@gmail.com'; // Replace with your email
            $mail->Password = 'negg prej ycfl qipz';   // Replace with your app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Recipient and sender details
            $mail->setFrom('itinventrix@gmail.com', 'INVENTRIX');
            $mail->addAddress($email);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = "Registration Activated! Welcome to $event!";
            $mail->Body = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; background-color: #0a0f1c; color: #c0c0c0; }
                    .container { max-width: 600px; margin: 20px auto; padding: 20px; background: #151d33; border-radius: 8px; color: #a9b4c2; }
                    .highlight { color: #ff4081; font-weight: bold; }
                    .link-button { padding: 10px 20px; background: #ff4081; color: white; text-decoration: none; border-radius: 5px; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h2>Welcome to the Digital Frontier at $event!</h2>
                    <p>Hi $leader_name,</p>
                    <p>Get ready to experience the synergy of technology and creativity at $event! We're excited to confirm your interest in this groundbreaking gathering of digital minds.</p>
                    <p><span class='highlight'>Action Required:</span> Please complete your payment offline at one of our hubs:</p>
                    <ul>
                        <li>Main Foyer - The Innovation Gateway</li>
                        <li>Canteen Foyer - The Social Network Station</li>
                    </ul>
                    <p><strong>Payment Hours:</strong> Daily from <span class='highlight'>8 AM to 3 PM</span>.</p>
                    <p>Join our official WhatsApp group for updates:</p>
                    <a href='$whatsapp' class='link-button'>Join WhatsApp Group</a>
                    <p>We look forward to seeing you at the event!</p>
                    <p>Best regards,<br>Team Inventrix</p>
                </div>
            </body>
            </html>";

            if ($mail->send()) {
                echo "<script>
                        showAlert('Registration successful. A confirmation email has been sent to $email.', 'success');
                        window.location.href = 'event.php'; // Redirect to event page
                      </script>";
            } else {
                echo "<script>
                        showAlert('Registration successful, but failed to send the confirmation email.', 'warning');
                        window.location.href = 'event.php'; // Redirect to event page
                      </script>";
            }
        } catch (Exception $e) {
            echo "<script>
                    showAlert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}', 'error');
                    window.location.href = 'event.php'; // Redirect to event page
                  </script>";
        }
    } else {
        echo "<script>
                showAlert('Error: " . $stmt->error . "', 'error');
                window.location.href = 'event.php'; // Redirect to event page
              </script>";
    }

    // Close connection
    $stmt->close();
    $conn->close();
    echo '<META HTTP-EQUIV="Refresh" Content="0.5; URL=event.php">';
}
?>

<script>
    // Function to show alert box
    function showAlert(message, type) {
        const alertBox = document.createElement('div');
        alertBox.classList.add('alert-box', type);
        alertBox.innerText = message;
        document.body.appendChild(alertBox);

        setTimeout(() => {
            alertBox.remove();
        }, 3000); // Auto-remove after 3 seconds
    }
</script>

<style>
    /* Alert box styles */
    .alert-box {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #0a0f1c;
        color: #c0c0c0;
        padding: 15px;
        border-radius: 8px;
        font-family: Arial, sans-serif;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        z-index: 9999;
        max-width: 80%;
        text-align: center;
        font-weight: bold;
        opacity: 0;
        animation: fadeIn 0.5s forwards;
    }

    .alert-box.success {
        background-color: #28a745;
        color: white;
    }

    .alert-box.warning {
        background-color: #ffc107;
        color: black;
    }

    .alert-box.error {
        background-color: #dc3545;
        color: white;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }
</style>