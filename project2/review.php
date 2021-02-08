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
<!-- // action="actor.php" -->
  <!-- =>                    Name:     -->
    <!-- <input type="text" name="search_str" required><br> -->
   <!-- <input type="text" id="username" name="username" required> -->
   <input type="hidden" name="id" value="<?php echo $_GET["id"]?>" />
    <!-- the rest of your form -->
Name: <input type="text" name="name" required><br>
Rating:  <input type="text" name="rating" required><br>
<!-- <input type="text" name="rating" required> -->
<!-- <SELECT NAME="Rating">
    <OPTION> 1</OPTION>
    <OPTION> 2</OPTION>
    <OPTION SELECTED> 3</OPTION>
    <OPTION> 4</OPTION>
    <OPTION> 5</OPTION>
</SELECT><br> -->

Comment: <input type="text" name="comment" required><br>
<!-- <textarea name="comment" rows="5" cols="40"></textarea> -->
<br> <br>
<input type="submit">
</form>



<!-- // name     VARCHAR(20),
    // time     DATETIME,
    // mid     INT,
    // rating     INT,
    // comment    TEXT -->

<?php 

// $name = ($_POST["name"]);
// $rating = intval($_POST["rating"]);
// $comment = ($_POST["comment"]);
// // $time = ;

// echo "id is ".$_GET["id"]; 
$id = intval($_GET["id"]);
// if ($id) { 
//     print "No movie id. bye"; 
//     exit(1); 
// }
// // echo "ans is ".$id; 

// $db = new mysqli('localhost', 'cs143', '', 'cs143');
// if ($db->connect_errno > 0) { 
//     die('Unable to connect to database [' . $db->connect_error . ']'); 
// }

// $query = "
// Insert into Review values ("$name",$time,$id,$rating,$comment)
// ;";
// $rs = $db->query($query);
// if (!$rs) {
//     $errmsg = $db->error; 
//     print "Insertion failed: $errmsg <br>"; 
//     exit(1); 
// }

?><br>
<p>

</body>
</html>