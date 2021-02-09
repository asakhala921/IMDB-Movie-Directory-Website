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


echo "<br><h1> Movie information </h1><br>";
echo " <br>";
print '<h2> Movie is:   </h2>';

// $query = "
//     select Movie.title, Movie.year, Movie.rating, Movie.company,
//         MovieGenre.genre, 
//         Director.last, Director.first, Director.dob, 
//         AVG(Review.rating)
//     from Movie, MovieGenre, MovieDirector, Director, Review
//     where Movie.id=$id and MovieGenre.mid=$id and MovieDirector.mid=$id and Review.mid =$id and
//     MovieDirector.did=Director.id 
//  ; ";

$query = "
select title, year, rating, company
from Movie
where id=$id 
; ";

$rs = $db->query($query);
if (!$rs) {
    $errmsg = $db->error; 
    print "Query failed: $errmsg <br>"; 
    exit(1); 
}

print " <br><br>";
print " <br><br>";
$row = $rs->fetch_assoc();

$name = $row['title'];
$out = "<h2><br> Title: ". $name." ( ".$row['year']." )<br>Producing company: ".$row['company']."<br>MPAA Rating: ".$row['rating'];


$query = "
select last, first, dob
from MovieDirector, Director
where MovieDirector.mid=$id   and MovieDirector.did=Director.id 
;  ";
$rs = $db->query($query);
$row = $rs->fetch_assoc();

$out .= "<br>Director: ".$row['first'] ." ".$row['last']." ( ".$row['dob']." )<br>Genre: ";

$query = "
select genre
from MovieGenre 
where mid=$id  
; ";
$rs = $db->query($query);
$row = $rs->fetch_assoc();
$out .= $row['genre']." <br> Average User rating: ";

$query = "
select  AVG(rating), count(rating)
from Review
where mid =$id   ;";
$rs = $db->query($query);
$row = $rs->fetch_assoc();
$count = $row['count(rating)'];

if ($row['AVG(rating)'])
    $rating = $row['AVG(rating)']." based on ".$count ." reviews";
else
    $rating = "No reviews yet";
$out .= " ".$rating." </h2><br>";
print  $out .'<br> ';

echo " <br>";
print '<h3>Total results: </h3>' . $rs->num_rows;

echo " <br><br><br><br><br>";
print "<h2> Actors in Movie $name are:   </h2>";
$query = "select aid, role, last, first
    from MovieActor, Actor
    where mid=$id and aid=id
    order by first, last;";
$rs = $db->query($query);

print " <br><br>";
echo "<h2>Name  "."    &emsp;&emsp;       " ."Role   &emsp;&emsp;       </h2><br>";
print " <br><br>";

if (mysqli_num_rows($rs) > 0){
    while ($row = $rs->fetch_assoc()){
        $out = $row["first"]." ".$row["last"]."     &emsp;&emsp;       " .$row["role"]." . "."<br>";
        echo '<a href=actor.php?id='.$row["aid"].' >'. $out . "</a>";
    }
}
echo " <br>";
print '<h3>Total results: </h3>' . $rs->num_rows;


echo "<h2><br>User Reviews : </h2><br>";
if ($count > 0){
    $query = "select *
        from Review
        where mid=$id
        order by time;";

    $rs = $db->query($query);
    print " <br><br>";

    if (mysqli_num_rows($rs) > 0){
        while ($row = $rs->fetch_assoc()){

            $out = "Name: ".$row["name"]."<br> "."Time: ".$row["time"]."<br> "."Rating: ".$row["rating"]."<br> "."Comment: ".$row["comment"]."<br> " ;
            echo  $out;
            print " <br><br>";
        }
    }

    echo " <br>";
    print '<h3>Total results: </h3>' . $rs->num_rows. "<br><br>";

}
else
    print '<h3> <br> No reviews yet <br></h3>';


echo '<a href=review.php?id='.$id.' >'. " Add a review. </a>";

$db->close();
$rs->free();
?><br>
<p>

</body>
</html>