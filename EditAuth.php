<?php

include 'DbConn.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['Author_ID'])) {
    
    $Author_ID = $_GET['Author_ID'];

    try {
        $sql = "SELECT * FROM authors WHERE Author_ID = :Author_ID";
        $stmt = $DbConn->prepare($sql);
        $stmt->bindParam(':Author_ID', $Author_ID);
        $stmt->execute();
        $author = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Author</title>
</head>
<body>

<h2>Edit Author</h2>

<?php if (isset($author) && !empty($author)): ?>
    <form action="ViewAuthors.php" method="post">
        
        <input type="hidden" name="Author_ID" value="<?php echo $author['Author_ID']; ?>">

        <label for="AuthorFullName">Full Name:</label>
        <input type="text" id="AuthorFullName" name="AuthorFullName" value="<?php echo $author['AuthorFullName']; ?>" required><br>

        <label for="AuthorEmail">Email:</label>
        <input type="email" id="AuthorEmail" name="AuthorEmail" value="<?php echo $author['AuthorEmail']; ?>" required><br>

        <label for="AuthorAddress">Address:</label>
        <input type="text" id="AuthorAddress" name="AuthorAddress" value="<?php echo $author['AuthorAddress']; ?>" required><br>

        <label for="AuthorBiography">Biography:</label>
        <textarea id="AuthorBiography" name="AuthorBiography" rows="4" cols="50" required><?php echo $author['AuthorBiography']; ?></textarea><br>

        <label for="AuthorDateOfBirth">Date of Birth:</label>
        <input type="date" id="AuthorDateOfBirth" name="AuthorDateOfBirth" value="<?php echo $author['AuthorDateOfBirth']; ?>" required><br>

        <label for="AuthorStatus">Suspended:</label>
        <input type="checkbox" id="AuthorStatus" name="AuthorStatus" <?php echo $author['AuthorStatus'] ? 'checked' : ''; ?>><br>

        <input type="submit" value="Update">
    </form>
<?php else: ?>
    <p>No author found.</p>
<?php endif; ?>

</body>
</html>
