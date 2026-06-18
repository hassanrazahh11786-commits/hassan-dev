<?php

include 'db.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $stmt = $conn->prepare("INSERT INTO contacts (name,email,subject,message) VALUES (?,?,?,?)");

    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if($stmt->execute()){
        echo "
        <script>
        alert('Message Sent Successfully!');
        window.location.href='site.html';
        </script>
        ";
    }else{
        echo "
        <script>
        alert('Error Sending Message!');
        window.history.back();
        </script>
        ";
    }

    $stmt->close();
}

$conn->close();

?>