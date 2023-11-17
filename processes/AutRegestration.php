<?php
include 'DbConn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $authorFullName = $_POST['authorFullName'];
    $authorEmail = $_POST['authorEmail'];
    $authorAddress = $_POST['authorAddress'];
    $authorBiography = $_POST['authorBiography'];
    $authorDateOfBirth = $_POST['authorDateOfBirth'];
    $authorSuspended = isset($_POST['authorSuspended']) ? 1 : 0; 

    try {
       
        $sql = "INSERT INTO authors (AuthorFullName, AuthorEmail, AuthorAddress, AuthorBiography, AuthorDateOfBirth, AuthorSuspended)
                VALUES (:authorFullName, :authorEmail, :authorAddress, :authorBiography, :authorDateOfBirth, :authorSuspended)";

        $stmt = $DbConn->prepare($sql);
        $stmt->bindParam(':authorFullName', $authorFullName);
        $stmt->bindParam(':authorEmail', $authorEmail);
        $stmt->bindParam(':authorAddress', $authorAddress);
        $stmt->bindParam(':authorBiography', $authorBiography);
        $stmt->bindParam(':authorDateOfBirth', $authorDateOfBirth);
        $stmt->bindParam(':authorSuspended', $authorSuspended);

        $stmt->execute();

        echo "Author registration successful";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
