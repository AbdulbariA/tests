<?php 
require 'dbconn.php';

try {
    if(isset($_POST['verzenden'])) {
        $naam = filter_input(INPUT_POST, "naam", FILTER_SANITIZE_STRING);
        if(empty($naam)){
            echo "veld is leeg?";
        } else {
            $query = $db->prepare("INSERT INTO merk(naam) VALUE (:naam)");
            $query-> bindParam("naam", $naam);
            if($query->execute()) {
                echo "De nieuwe merk is toegevoegd.";
            } else {
                echo "Er is een fout opgetreden!";
            } 
        }

      echo "<br>";
    }
} catch(PDOException $e) {
    die("Error!: " . $e->getMessage());
}
?>
<form method="post" action="">
    <label>Merk</label>
    <input type="text" name="naam"> <br>
    <input type="submit" name="verzenden" value="Opslaan">
</form>