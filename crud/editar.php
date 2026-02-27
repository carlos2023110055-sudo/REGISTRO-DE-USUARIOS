<?php
require __DIR__ . '/includes/funciones.php';

if ($_POST) {
    editar_usuario($_POST);
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

    <button>Actualizar</button>
</form>
</div>

<script src="validar.js"></script>
</body>
</html>