<?php

include 'DbConn.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['authorId'])) {
    
    $authorId = $_GET['authorId'];

    try {
        $sql = "SELECT * FROM authors WHERE AuthorId = :authorId";
        $stmt = $DbConn->prepare($sql);
        $stmt->bindParam(':authorId', $authorId);
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
        
        <input type="hidden" name="authorId" value="<?php echo $author['AuthorId']; ?>">

        <label for="authorFullName">Full Name:</label>
        <input type="text" id="authorFullName" name="authorFullName" value="<?php echo $author['AuthorFullName']; ?>" required><br>

        <label for="authorEmail">Email:</label>
        <input type="email" id="authorEmail" name="authorEmail" value="<?php echo $author['AuthorEmail']; ?>" required><br>

        <label for="authorAddress">Address:</label>
        <input type="text" id="authorAddress" name="authorAddress" value="<?php echo $author['AuthorAddress']; ?>" required><br>

        <label for="authorBiography">Biography:</label>
        <textarea id="authorBiography" name="authorBiography" rows="4" cols="50" required><?php echo $author['AuthorBiography']; ?></textarea><br>

        <label for="authorDateOfBirth">Date of Birth:</label>
        <input type="date" id="authorDateOfBirth" name="authorDateOfBirth" value="<?php echo $author['AuthorDateOfBirth']; ?>" required><br>

        <label for="authorSuspended">Suspended:</label>
        <input type="checkbox" id="authorSuspended" name="authorSuspended" <?php echo $author['AuthorSuspended'] ? 'checked' : ''; ?>><br>

        <input type="submit" value="Update">
    </form>
<?php else: ?>
    <p>No author found.</p>
<?php endif; ?>

</body>
</html>
