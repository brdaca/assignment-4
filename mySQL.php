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
    echo "<tr><th>ASIN</th><th>Title</th><th>Price</th></tr>";
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


fInsertToDatabase('B000P0J0AQ', 'The Matrix', 7.18);
fInsertToDatabase('B00003CXA2', 'Forest Gump',17.40);
fInsertToDatabase('B01MAZGH7Z', 'Moana', 14.99);
fInsertToDatabase('B0007DFJ0G', 'Fight Club', 14.20);
fInsertToDatabase('B004SIP95G', 'Pulp Fiction', 5.19);
fInsertToDatabase('B00AEFXESQ', 'American Beauty', 6.56);
fListFromDatabase();
fDeleteFromDatabase('B000P0J0AQ');
fListFromDatabase();

fInsertActor("Keanu", "Reeves"); //matrix
fInsertActor("Laurence", "Fishburne"); //matrix
fInsertActor("Tom", "Hanks"); //forest gump
fInsertActor("Sally", "Field"); // forst gump
fInsertActor("Dwayne", "Johnson"); //moana
fInsertActor("Jemaine", "Clement"); //moana
fInsertActor("Brad", "Pitt");   //fight club
fInsertActor("Edward", "Norton"); //fight club
fInsertActor("Kevin", "Spacey");
fInsertActor("Wes", "Bently");
fListActors();
fDeleteActor('Brad','Pitt');
fListActors();



?>
