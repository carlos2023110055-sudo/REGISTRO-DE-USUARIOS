<?php
require __DIR__ . '/includes/funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    editar_usuario($_POST);
    header("Location: index.php");
    exit;
}

$usuarios = obtener_usuarios();
?>

<!DOCTYPE html>
<html>
<head>
<title>Editar Usuario</title>
<link rel="stylesheet" href="build/css/styles.css">
</head>
<body>

<nav>
<a href="index.php">Inicio</a>
</nav>

<div class="container">
<form method="POST" name="formUsuario" onsubmit="return validarFormulario();">

    <select name="id" required>
        <?php while($u = mysqli_fetch_assoc($usuarios)): ?>
            <option value="<?php echo $u['id']; ?>">
                <?php echo $u['nombre']." ".$u['apellido']; ?>
            </option>
        <?php endwhile; ?>
    </select>

    <input name="nombre" placeholder="Nuevo nombre" required>
    <input name="apellido" placeholder="Nuevo apellido" required>
    <input name="email" placeholder="Nuevo email" required>
    <input name="telefono" placeholder="Nuevo teléfono">
    <input name="direccion" placeholder="Nueva dirección">
    <input name="ciudad" placeholder="Nueva ciudad">
    <input name="pais" placeholder="Nuevo país">
    <input type="date" name="fecha">

    <select name="genero">
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
    </select>

    <button type="submit">Actualizar</button>
</form>
</div>

<script src="validar.js"></script>
</body>
</html>
