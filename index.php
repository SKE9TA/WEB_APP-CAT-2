<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
   
</head>
<div class="body">
<body>
    <div class="authordetails">
    <form action="processes/AutRegestration.php", method="POST">
        <h2>Author Regestration Form</h2><br>
        Author Identification Number<br>
        <input type="number" name="Author_ID" id="AuthorID"><br>
        Author Full Name<br/>
        <input type="text" name="AuthorFullName"id="AuthorFullName"><br/><br/>
        Author Email<br/>
        <input type="email" name="AuthorEmail" id="AuthorEmail"><br/><br/>
        Author Address<br/>
        <input type="text" name="AuthorAddress" id="AuthorAddress"><br/><br/>
        Author Date of Birth<br/>
        <input type="date" name="AuthorDateOfBirth" id="AuthorDateOfBirth"><br/><br/>
        Author Biography<br/>
        <textarea placeholder="Write Biography here" name="AuthorBiography" id="AuthorBiography" rows="8"gti cols="80"></textarea><br/>
        Author Suspended<br/>
        YES/NO<br/>
        <input type="radio" name= "AuthorStatus" id="yes" value="AuthorStatus">
        <input type="radio" name="AuthorStatus" id="no" value="AuthorStatus"><br/>
        <input type="submit" value="submit"><br>
    </form>
    </div>
</div>
</body>
</html>
