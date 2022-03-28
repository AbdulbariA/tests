<?php require 'dbconn.php'; 

try {
    echo "<H1>Telefoon merken</H1>";
    $query = $db->prepare("SELECT * FROM merk");
    $query->execute();
    echo  "<h2>Naam</h2>";
    $result = $query->fetchALL (PDO::FETCH_ASSOC);
    foreach($result as &$data) {
        echo $data["naam"] . "<br>";
    }
    
    echo "<br>" . "aantal merken is:" . (count($result)) . "<br>"; 

}catch(PDOException $e){
    die("Error!: " . $e->getMessage());
}
echo "<br>" . '<a href="insert.php">merk toevoegen</a>';
?>