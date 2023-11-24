<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <a href="index.php">Home</a>
    <a href="ViewAuthors.php">View Authors</a>
</head>

<body>
    <?php
    include 'configs/DbConn.php';
$stmt = $pdo->query("SELECT * FROM authorstb");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the data in an editable table
    echo '<form method="post">';
    echo '<table>';
    echo '<tr><th>Author ID</th><th>Full Name</th><th>Email</th></tr>';
    foreach ($data as $row) {
        echo '<tr>';
        echo '<td>' . $row['author_id'] . '</td>';
        echo '<td><input type="text" name="data['.$row['author_id'].'][fullname]" value="' . $row['fullname'] . '"></td>';
        echo '<td><input type="text" name="data['.$row['author_id'].'][email]" value="' . $row['email'] . '"></td>';
        echo '</tr>';
        echo '</tr>';
        
        echo '</tr>';
    }
        ?>
</body>
</html>
