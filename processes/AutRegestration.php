<?php
require_once "../configs/DbConn.php";

if(isset($_POST["submit"])){
    $AuthorFullName = addslashes(strtolower($_POST["AuthorFullName"]));
    $AuthorEmail = addslashes(strtolower($_POST["AuthorEmail"]));
    $AuthorAddress = addslashes($_POST["AuthorAddress"]);
    $AuthorBiograpthy = addslashes($_POST["AuthorBiography"]);
    $AuthorDateOfBirth = addslashes($_POST["AuthorDateOfBirth"]);
    $AuthorSuspended = addslashes($_POST["AuthorSuspended"]);

    if(!filter_var($sender_email, FILTER_VALIDATE_EMAIL)){
        die("Invalid sender_email");
    }

    if(!filter_var($receiver_email, FILTER_VALIDATE_EMAIL)){
        die("Invalid receiver_email");
    }

    $stmt = $pdo->prepare("INSERT INTO messages (sender_email, receiver_email, subject, message) VALUES (?, ?, ?, ?)");

    $stmt->execute([$sender_email, $receiver_email, $subject, $message]);

    header("Location: ../view_messages.php");
    exit();
}
if(isset($_POST["update_message"])){
    $sender_email = addslashes(strtolower($_POST["sender_email"]));
    $receiver_email = addslashes(strtolower($_POST["receiver_email"]));
    $subject = addslashes($_POST["subject"]);
    $message = addslashes($_POST["message"]);
    $messageId = addslashes($_POST["messageId"]);

    if(!filter_var($sender_email, FILTER_VALIDATE_EMAIL)){
        die("Invalid sender_email");
    }

    if(!filter_var($receiver_email, FILTER_VALIDATE_EMAIL)){
        die("Invalid receiver_email");
    }

    $stmt = $pdo->prepare("UPDATE messages SET sender_email=?, receiver_email=?, subject=?, message=? WHERE messageId=? LIMIT 1");

    $stmt->execute([$sender_email, $receiver_email, $subject, $message, $messageId]);

    header("Location: ../view_messages.php");
    exit();
}

if(isset($_GET["DelId"])){
    $stmt = $pdo->prepare("SELECT * FROM messages WHERE messageId=? LIMIT 1");
    $stmt->execute([$_GET["DelId"]]);
    $message = $stmt->fetch();
    if($message){
        $stmt = $pdo->prepare("DELETE FROM messages WHERE messageId=? LIMIT 1");
        $stmt->execute([$_GET["DelId"]]);
        header("Location: ../view_messages.php");
        exit();
    }else{
        header("Location: ../view_messages.php");
        exit();
    }

}

?>