<html>
<head><title>CS143 MySQL-Apache Container</title></head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href=mycss.css>
<body>
<div class="w3-container w3-teal">
<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header navbar-defalt">
                <a class="navbar-brand" href="index.php">Goto Homepage</a>
            </div>
        </div>
    </nav>

<p>
<p>
<form  method="get" action="post_review.php?id=<?php echo $_GET["id"]; ?>"> 
   <input type="hidden" name="id" value="<?php echo $_GET["id"]?>" />

Name: <input type="text" name="name" required><br>
Rating:  <input type="text" name="rating" required><br>
Comment: <input type="text" name="comment" required><br>

<br> <br>
<input type="submit">
</form>

<?php 

$id = intval($_GET["id"]);

?><br>
<p>

</body>
</html>