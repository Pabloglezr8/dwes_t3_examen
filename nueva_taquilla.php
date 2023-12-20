<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Añadir Nueva Taquilla</title>
</head>
<body>
    <h2>Añadir Nueva Taquilla</h2>
    <form action="nueva_taquilla.php" method="post">
        <label for="localidad">Localidad:</label><br>
        <select id="localidad" name="localidad" required>
            <option value="">Seleccione una localidad</option>
            <option value="Gijón">Gijón</option>
            <option value="Oviedo">Oviedo</option>
            <option value="Avilés">Avilés</option>
        </select><br>
        
        <label for="direccion">Dirección:</label><br>
        <input type="text" id="direccion" name="direccion" required><br>
        
        <label for="capacidad">Capacidad:</label><br>
        <input type="number" id="capacidad" name="capacidad" min="1" required><br>
        
        <label for="ocupadas">Taquillas Ocupadas:</label><br>
        <input type="number" id="ocupadas" name="ocupadas" min="0" required><br>
        
        <input type="submit" value="Añadir Taquilla">
    </form>
</body>
</html>


<?php
    require_once 'connection.php';
    $conexion = conectarBD();

    /////////////////////////////////////////////////
    // TODO 1:Guardar la info en la base de datos. //
    /////////////////////////////////////////////////
    if(!empty($_POST['localidad']) && !empty($_POST['direccion']) && !empty($_POST['capacidad']) && !empty($_POST['ocupadas'])){
        $localidad = $_POST['localidad']; // Guardamos la localidad
        $direccion = $_POST['direccion']; // Guardamos la direccion
        $capacidad = $_POST['capacidad']; // Guardamos la capacidad
        $ocupadas = $_POST['ocupadas']; // Guardamos la ocupacion
        $sql = 'INSERT INTO PuntosDeRecogida (localidad, direccion, capacidad, ocupadas) VALUES (?, ?, ?, ?)'; 
        $consulta = $conexion->prepare($sql);  

        if ($consulta->execute([$localidad, $direccion, $capacidad, $ocupadas])) {
            echo "Nueva taquilla añadida con éxito.";
        } else {
            echo "Error al añadir la taquilla.";
        }
    }
?>
