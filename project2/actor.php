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

$id = intval($_GET["id"]);
// echo "ans is $id"; 


$db = new mysqli('localhost', 'cs143', '', 'cs143');
if ($db->connect_errno > 0) { 
    die('Unable to connect to database [' . $db->connect_error . ']'); 
}


echo "<br><h1> Actor information </h1><br>";
echo " <br>";
print '<h2> Actor is:   </h2>';
$query = "select * from Actor where id= ".$id."; ";
// print "$query <br><br>";
// foreach ($search as $word) {
//     $sanitized_name = $db->real_escape_string($word);
//     $query .= " AND (first like '%$sanitized_name%' or last like '%$sanitized_name%') ";
// }
// $query .= " order by first, last";
// var_dump($query);
$rs = $db->query($query);
// var_dump($rs);
// $rs = $db->query("select * from Actor where id= 17950;");
// echo "hi";
// echo "answer for  <br>". $query ."<br>";
print " <br><br>";
// echo "<h2>first last  "."    &emsp;&emsp;       " ."sex    &emsp;&emsp;      "."dob    &emsp;&emsp;      "."dod </h2><br>";
print " <br><br>";
$row = $rs->fetch_assoc();

$name = "Name: ".$row['first']." ".$row['last'];
$out .= $name."    &emsp;&emsp;   <br>   Gender: ";
$out.=  $row['sex']."<br>          ";
if ($row['dod'])
$dod = $row['dod'];
else
$dod = "Still Alive";

// $out.=  "->".$row['dob'] ."   &emsp;&emsp;      ".  "->".$dod ."    &emsp;&emsp;     . <br>";
$out.=  " dob: ".$row['dob'] ."   &emsp;&emsp;     <br> ".  "dod: ".$dod ."    &emsp;&emsp;      <br>";
echo  "<h2>".$out .'</h2><br> ';
// echo '<a href=actor.php?id='.$row["id"].' >'. $out . "</a>";

// last | first | sex  | dob        | dod  ;



echo " <br>";
print '<h3>Total results: </h3>' . $rs->num_rows;

echo " <br><br><br><br><br>";
print "<h2> Movies $name is in:   </h2>";
$query = "select mid, role, title
    from MovieActor, Movie
    where aid=$id and mid=Movie.id
    order by role, title;";
$rs = $db->query($query);

print " <br><br>";
echo "<h2>Role  "."    &emsp;&emsp;       " ."Title   &emsp;&emsp;       </h2><br>";
print " <br><br>";

if (mysqli_num_rows($rs) > 0){
    while ($row = $rs->fetch_assoc()){
        $out = $row["role"]."     &emsp;&emsp;       " .$row["title"]." . "."<br>";
        echo '<a href=movie.php?id='.$row["mid"].' >'. $out . "</a>";
    }
}
echo " <br>";
print '<h3>Total results: </h3>' . $rs->num_rows;

$db->close();
$rs->free();
?><br>
<p>

</body>
</html>