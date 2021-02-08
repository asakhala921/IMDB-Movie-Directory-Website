<html>
<head><title>CS143 MySQL-Apache Container</title>
<style>
body {
    /* background-image: url('http://i.stack.imgur.com/kx8MT.gif'); */
    /* background-image: url('https://media.giphy.com/media/dvm7OLMc4BYsq9rIXE/giphy.gif'); */
    /* height: 100vh;
    padding:0;
    margin:0; */
    /* http://tenor.com/4FRO.gif */
    /* background-size: cover; */
    /* background-image:url(download.jpeg); */
    /* background-image:url(racoon.gif); */
    background-repeat: no-repeat;
    /* background-size: 75%; */
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

<form  method="get" action="search.php"> 
<!-- // action="actor.php" -->
  =>                    Search for actors or movies by name:    
    <input type="text" name="search_str" required><br>
   <!-- <input type="text" id="username" name="username" required> -->
<input type="submit">
</form>


</div>
</body>
</html>
