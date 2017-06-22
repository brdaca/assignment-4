<html>

<head>
    <style>
        body {
            font-family: sans-serif;
        }
        
        table {
            border: 4px solid black;
            width: 700px;
            margin: auto;
            border-collapse: collapse;
        }
        
        td {
            text-align: center;
            padding: 10px;
        }
        
        tr:nth-child(even) {
            background-color: #999;
        }

    </style>
</head>


<?php

include 'dbConnect.php';
// database functions ************************************************
function fInsertToDatabase($asin, $title, $price) {
    //echo "<br><h3>Inserting movie with ASIN = $asin:</h3>";
    $sql = "INSERT INTO dvdtitles (asin, title, price) VALUES ('$asin', '$title', $price)";
  // TODO: Fill in the rest of the fuction
    $conn = fConnectToDatabase();
    $stmt = $conn->prepare($sql);
    $stmt->execute(); 
    $conn = null;
}
function fDeleteFromDatabase($asin) {
    //echo "<br><h3>Deleting movie with ASIN = $asin:</h3>";
    $sql = "DELETE FROM dvdtitles WHERE asin='$asin'";
    $conn = fConnectToDatabase();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;
}
function fListFromDatabase() {
    //echo "<br><h3>Displaying Database Contents:</h3>";
    $sql = 'SELECT * FROM dvdtitles ORDER BY title';
    $conn = fConnectToDatabase();
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();
    
    echo "<table>";
    echo "<tr><th></th><th>ASIN</th><th>Title</th><th>Price</th></tr>";
    while ($row = $stmt->fetch()) {
        echo("
        <tr><td><img src = http://images.amazon.com/images/P/$row[0].01.MZZZZZZZ.jpg></td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>
        ");
    }
    echo "<table>";
    
    $conn = null;
}

function fInsertActor($fname, $lname){
    $sql = "INSERT INTO dvdactors (fname,lname) VALUES ('$fname', '$lname')";
  // TODO: Fill in the rest of the fuction
    $conn = fConnectToDatabase();
    $stmt = $conn->prepare($sql);
    $stmt->execute(); 
    $conn = null;
}

function fDeleteActor($fname, $lname) {
    //echo "<br><h3>Deleting movie with ASIN = $asin:</h3>";
    $sql = "DELETE FROM dvdactors WHERE fname='$fname' AND lname = '$lname'";
    $conn = fConnectToDatabase();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;
}

function fListActors() {
    //echo "<br><h3>Displaying Database Contents:</h3>";
    $sql = 'SELECT * FROM dvdactors ORDER BY actorID';
    $conn = fConnectToDatabase();
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();
    
    echo "<table>";
    echo "<tr><th>Actor ID</th><th>First Name</th><th>Last Name</th></tr>";
    while ($row = $stmt->fetch()) {
        echo("
        <tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>
        ");
    }
    echo "<table>";
    $conn = null;
}

    //Join for assignment 4.3:
function fListAll() {
    //echo "<br><h3>Displaying Database Contents:</h3>";
    $sql = 'SELECT t.asin, t.title, t.price, r.actorID, a.fname, a.lname
        FROM dvdtitles t, actorroles r, dvdactors a
        WHERE t.asin = r.asin AND r.actorID = a.actorID' ;
    $conn = fConnectToDatabase();
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();
    
    echo "<table>";
    echo "<tr><th></th><th>ASIN</th><th>Title</th><th>Price</th><th>Actor ID</th><th>First</th><th>Last</th></tr>";
    while ($row = $stmt->fetch()) {
        echo("
        <tr><td><img src = http://images.amazon.com/images/P/$row[0].01.MZZZZZZZ.jpg></td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>
        ");
    }
    echo "<table>";
    
    $conn = null;
}
    

    //this is my update function for EXTRA CREDIT!!!
function fUpdatePrice($asin, $new_price){
    $sql = "UPDATE dvdtitles SET price = $new_price where asin = '$asin' " ;
    $conn = fConnectToDatabase();
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();
    
}
    
    

    //Show all the DVDs in the database:
    fListFromDatabase();

    
    //show complete info for all dvds that we have complete info for:
    fListAll();


//TESTING TESTING TESTING
/*

fInsertToDatabase('B000P0J0AQ', 'The Matrix', 7.18);
fInsertToDatabase('B00003CXA2', 'Forest Gump',17.40);
fInsertToDatabase('B01MAZGH7Z', 'Moana', 14.99);
fInsertToDatabase('B0007DFJ0G', 'Fight Club', 14.20);
fInsertToDatabase('B004SIP95G', 'Pulp Fiction', 5.19);
fInsertToDatabase('B00AEFXESQ', 'American Beauty', 6.56);
fListFromDatabase();
fDeleteFromDatabase('B000P0J0AQ');
fListFromDatabase();

fInsertActor("Keanu", "Reeves"); //matrix 1
fInsertActor("Laurence", "Fishburne"); //matrix  2
fInsertActor("Tom", "Hanks"); //forest gump  4
fInsertActor("Sally", "Field"); // forst gump  4
fInsertActor("Dwayne", "Johnson"); //moana  5
fInsertActor("Jemaine", "Clement"); //moana  6
fInsertActor("Brad", "Pitt");   //fight club  11
fInsertActor("Edward", "Norton"); //fight club  8
fInsertActor("Kevin", "Spacey"); //american beauty  9
fInsertActor("Wes", "Bently"); //american beauty  10
fListActors();
fDeleteActor('Brad','Pitt');
fListActors();

*/

?>

</html>
