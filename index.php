<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Details Form</title>
</head>
<body>
    
<form action="DBConn.php" method="post" >

    <label for="AuthorFullName"> FullName:</label>
    <input type="text" id="AuthorFullName" name= AuthorFullName required><br>

    <label for="AuthorEmail"> Email:</label>
    <input type="email" id="AuthorEmail" name= AuthorEmail required><br>

    <label for="AuthorAddress">Address:</label>
    <input type="text" id="AuthorAddress" name= AuthorAddress required><br>

    <label for="AuthorBiography"> Biography:</label>
    <input type="text" id="AuthorBiography" name= AuthorBiography required><br>

    <label for="AuthorDateOfBirth"> Date of Birth:</label>
    <input type="date" id="AuthorDateOfBirth" name= AuthorDateofBirth required><br>

    <label for="AuthorSuspended"> Suspended Author:</label>
    <input type="checkbox" id="AuthorSuspended" name= AuthorSuspended required><br>

    <input type="submit" value="Submit">

</form>    
</body>
</html>
