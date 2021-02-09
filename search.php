<html>
<head><title>CS143 MySQL-Apache Container</title>
<style>
body {
    background-repeat: no-repeat;
}
</style>
</head>
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
<h1 style="font-size:40px; color:blue">Movie Directory</h1> 

<?php


$search_str = $_GET["search_str"];//" tom a ";


print " Query  is :  <h3> $search_str </h3> <br>";
echo " <br>";


$db = new mysqli('localhost', 'cs143', '', 'cs143');
if ($db->connect_errno > 0) { 
    die('Unable to connect to database [' . $db->connect_error . ']'); 
}



echo " <br>";
print '<h1>Matching Actors are:   </h1>' ;//. $rs->num_rows;
$query = "select id, first, last, dob from Actor where true ";
$search = explode(' ',$search_str);
print " <br><br>";
foreach ($search as $word) {
    $sanitized_name = $db->real_escape_string($word);
    $query .= " AND (first like '%$sanitized_name%' or last like '%$sanitized_name%') ";
}
$query .= " order by first, last";
$rs = $db->query($query);

print " <br><br>";
echo "<h2>first last  "."    &emsp;&emsp;       " ."dob"."</h2><br>";
print " <br><br>";
if (mysqli_num_rows($rs) > 0){
    while ($row = $rs->fetch_assoc()){
        $out = $row["first"]." ".$row["last"]."    &emsp;&emsp;       " .$row["dob"]." . "."<br>";
        echo '<a href=actor.php?id='.$row["id"].' >'. $out . "</a>";
    }
}

echo " <br>";
print '<h3>Total results: </h3>' . $rs->num_rows;



echo "<br>   <br>";

print '<h1>Matching Movies are: </h1>' ;
$query = "select id, title, year from Movie where true ";
print " <br><br>";
foreach ($search as $word) {
    $sanitized_name = $db->real_escape_string($word);
    $query .= " AND (title like '%$sanitized_name%') ";
}
$query .= " order by title";
$rs = $db->query($query);

print " <br><br>";
echo "<h2>title  "."    &emsp;&emsp;       " ."year"."</h2><br>";
print " <br><br>";
if (mysqli_num_rows($rs) > 0){
    while ($row = $rs->fetch_assoc()){
        $out = $row["title"]."  "."    &emsp;&emsp;       " .$row["year"]." . "."<br>";
        echo '<a href=movie.php?id='.$row["id"].' >'. $out . "</a>";
    }
}

echo " <br>";
print '<h3>Total results: </h3>' . $rs->num_rows;

echo "<br> <br> <br> hi  this website is made by Atharv Sakhala <br>";
print " <p> &emsp;&emsp;  <br> &emsp;&emsp; <br> &emsp;&emsp; </p> ";

$db->close();
$rs->free();
?>
</div>
</body>
</html>
