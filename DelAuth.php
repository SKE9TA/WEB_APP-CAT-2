<?php

include 'DbConn.php';


if (isset($_GET['AuthorId'])) 
{
    $authorIdToDelete = $_GET['AuthorId'];

    try {
        
        $sql = "DELETE FROM authors WHERE AuthorId = :authorId";
        $stmt = $DbConn->prepare($sql);
        $stmt->bindParam(':authorId', $authorIdToDelete);
        $stmt->execute();

        echo "Author deleted successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

try {
    
    $sql = "SELECT * FROM authors ORDER BY AuthorFullName ASC";
    $stmt = $DbConn->prepare($sql);
    $stmt->execute();
    $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Authors</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Delete Authors</h2>

<?php if (isset($authors) && count($authors) > 0): ?>
    <table>
        <thead>
            <tr>
                <th>AuthorId</th>
                <th>AuthorFullName</th>
                <th>AuthorEmail</th>
                <th>AuthorAddress</th>
                <th>AuthorBiography</th>
                <th>AuthorDateOfBirth</th>
                <th>AuthorSuspended</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($authors as $author): ?>
                <tr>
                    <td><?php echo $author['AuthorId']; ?></td>
                    <td><?php echo $author['AuthorFullName']; ?></td>
                    <td><?php echo $author['AuthorEmail']; ?></td>
                    <td><?php echo $author['AuthorAddress']; ?></td>
                    <td><?php echo $author['AuthorBiography']; ?></td>
                    <td><?php echo $author['AuthorDateOfBirth']; ?></td>
                    <td><?php echo $author['AuthorStatus'] ? 'Yes' : 'No'; ?></td>
                    <td>
                        <a href="DelAuth.php?AuthorId=<?php echo $author['AuthorId']; ?>" onclick="return confirm('Are you sure you want to delete this author?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No authors found.</p>
<?php endif; ?>

</body>
</html>
