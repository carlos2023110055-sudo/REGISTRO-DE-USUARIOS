<?php

function obtener_usuarios() {
    try {
        require __DIR__ . '/database.php';

        $sql = "SELECT * FROM usuarios;";
        $consulta = mysqli_query($db, $sql);

        return $consulta;
    } catch (\Throwable $th) {
        var_dump($th);
    }
}

function insertar_usuario($datos) {
    try {
        require __DIR__ . '/database.php';

        $sql = "INSERT INTO usuarios(nombre, apellido, email, telefono, direccion, ciudad, pais, fecha_nacimiento, genero)
                VALUES
                ('$datos[nombre]','$datos[apellido]','$datos[email]','$datos[telefono]','$datos[direccion]','$datos[ciudad]','$datos[pais]','$datos[fecha]','$datos[genero]');";

        mysqli_query($db, $sql);

    } catch (\Throwable $th) {
        var_dump($th);
    }
}


function editar_usuario($datos) {
    try {
        require __DIR__ . '/database.php';

        $stmt = $db->prepare("UPDATE usuarios SET 
            nombre = ?, 
            apellido = ?, 
            email = ?, 
            telefono = ?, 
            direccion = ?, 
            ciudad = ?, 
            pais = ?, 
            fecha_nacimiento = ?, 
            genero = ?
            WHERE id = ?");

        $stmt->bind_param(
            "sssssssssi",
            $datos['nombre'],
            $datos['apellido'],
            $datos['email'],
            $datos['telefono'],
            $datos['direccion'],
            $datos['ciudad'],
            $datos['pais'],
            $datos['fecha'],
            $datos['genero'],
            $datos['id']
        );

        $stmt->execute();
        $stmt->close();

    } catch (\Throwable $th) {
        var_dump($th);
    }
}

function eliminar_usuario($id) {
    try {
        require __DIR__ . '/database.php';

        $stmt = $db->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id); // i = integer
        $stmt->execute();

        $stmt->close();

    } catch (\Throwable $th) {
        var_dump($th);
    }
}