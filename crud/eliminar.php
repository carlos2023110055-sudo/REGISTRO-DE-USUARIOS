<?php
require __DIR__ . '/includes/funciones.php';

if ($_POST) {
    eliminar_usuario($_POST);
}

$usuarios = obtener_usuarios();
?>

<!DOCTYPE html>
<html>
<head>
<title>Eliminar Usuario</title>
<link rel="stylesheet" href="build/css/styles.css">
</head>
<body>

<nav>
<a href="index.php">Inicio</a>
</nav>

<div class="container">
<form method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?');">
    <select name="id" required>
        <?php while($u = mysqli_fetch_assoc($usuarios)): ?>
            <option value="<?php echo $u['id']; ?>">
                <?php echo $u['nombre']." ".$u['apellido']; ?>
            </option>
        <?php endwhile; ?>
    </select>

    <button>Eliminar</button>
</form>
</div>

</body>
</html>