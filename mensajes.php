<?php

include ("conect.php");


$sql = "SELECT * FROM perfil_muro_profesor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id_posteo"]. " - Name: " . $row["posteo"]. " " . $row["id_actividad"]. $row["fhcreacion"]. "<br>";
    }
} else {
    echo "0 results";
}




$conn->close();
?>