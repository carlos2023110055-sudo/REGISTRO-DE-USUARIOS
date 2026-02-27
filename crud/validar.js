function validarFormulario() {
    const nombre = document.forms["formUsuario"]["nombre"].value;
    const apellido = document.forms["formUsuario"]["apellido"].value;
    const email = document.forms["formUsuario"]["email"].value;

    if (nombre === "" || apellido === "" || email === "") {
        alert("Nombre, apellido y email son obligatorios");
        return false;
    }

    if (!email.includes("@")) {
        alert("Email no válido");
        return false;
    }

    return true;
}