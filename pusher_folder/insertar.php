<?php

include ("conect.php");
//$id_actividad = $_POST['idactividad'];
$id_actividad = 4;
$mensaje = $_POST['input_mensaje'];
$pepe = "pep";
$sql = "INSERT INTO Perfil_Muro_Profesor(posteo,id_actividad,cusuario) VALUES('$mensaje','$id_actividad','$pepe')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
//header('Location: form.php');
?>