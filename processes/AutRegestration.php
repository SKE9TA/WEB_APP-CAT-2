<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $Author_ID = $_POST['Author_ID'];
    $AuthorFullname = $_POST['AuthorFullName'];
    $AuthorEmail = $_POST['AuthorEmail'];
    $AuthorAddress = $_POST['AuthorAddress'];
    $AuthorDateOfBirth = $_POST['AuthorDateOfBirth'];
    $AuthorBiography = $_POST['AuthorBiography'];
    $AuthorStatus = $_POST['AuthorStatus'];

    $hostname = "localhost"; 
    $username = "root";      
    $password = "";          
    $dbname = "authordb";    

    try {
        // Establish the database connection
        $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL query using placeholders
        $stmt = $pdo->prepare("INSERT INTO authorstb (Author_ID, AuthorFullname, AuthorEmail, AuthorAddress, AuthorDateOfBirth, AuthorBiography, AuthorStatus) VALUES (?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters to the prepared statement
        $stmt->bindParam(1, $Author_ID);
        $stmt->bindParam(2, $AuthorFullname);
        $stmt->bindParam(3, $AuthorEmail);
        $stmt->bindParam(4, $AuthorAddress);
        $stmt->bindParam(5, $AuthorDateOfBirth);
        $stmt->bindParam(6, $AuthorBiography);
        $stmt->bindParam(7, $Authorstatus);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "Successfully Added!";
        } else {
            echo "Error: Failed to insert data.";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
