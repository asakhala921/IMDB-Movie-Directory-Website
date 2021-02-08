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


<?php 
// echo "hi";

$id = intval($_GET["id"]);
if (!$id) { 
    print "No movie id. bye"; 
    exit(1); 
}
echo "ID is ".$id; 

$name = ($_GET["name"]);
$rating = intval($_GET["rating"]);
$comment = ($_GET["comment"]);

$time = date("Y/m/d h:m:s");//TIMESTAMP();//UNIX_TIMESTAMP() ;
// echo "see is ".$time; 



$db = new mysqli('localhost', 'cs143', '', 'cs143');
if ($db->connect_errno > 0) { 
    die('Unable to connect to database [' . $db->connect_error . ']'); 
}
echo "<br> Review page <br>";
// $query = "Insert into Review values (".$name.",".$time.",".$id.",".$rating.",".$comment.");";
$query = "Insert into Review values ('".$name."','".$time."',".$id.",".$rating.",'".$comment."');";
echo $query. "<br>";
$rs = $db->query($query);
if (!$rs) {
    $errmsg = $db->error; 
    print "Insertion failed: $errmsg <br>"; 
    exit(1); 
}
else
print "<br> Success. Go back now.";

?><br>
<p>

</body>
</html>