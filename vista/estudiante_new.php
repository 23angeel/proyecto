<head>
    <link rel="stylesheet" href="./css/crear_estudiante.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<script type="text/javascript">
    /* Esperamos a la carga del DOM */
    window.addEventListener('DOMContentLoaded', (evento) => {
    /* Obtenemos la fecha de hoy en formato ISO */
    const hoy_fecha = new Date().toISOString().substring(0, 10);
    /* Buscamos la etiqueta, ya sea por ID (que no tiene) o por su selector */
    document.querySelector("input[name='inscripcion']").max = hoy_fecha;
    document.querySelector("input[name='nacimiento']").max = hoy_fecha;
    })
</script>

<?php
    require_once "./php/main.php";
?>

<form method="post" action="./php/estudiante_guardar.php" autocomplete="off">
    <h1>Crear Estudiante</h1>
    
    <label for="inscripcion">Fecha de inscripcion:</label>    
    <input type="date" name="inscripcion" id="inscripcion" required><br><br>


    <div class="btns">
        <label for="nombre">Nombres:</label>
        <input type="text" name="name" id="nombre" required><br>

        <label for="ape">Apellidos:</label>
        <input type="text" name="ape" id="ape" required><br>
    </div><br>


    <div class="btns">
        <label for="id">Cedula de Identidad:</label>
        <select name="cedula">
            <option value="V-">V-</option>
            <option value="E-">E-</option>
        </select>
        <input type="text" placeholder="30.715.180"  name="cedu" id="id" pattern="[0-9.]{1,10}" maxlength="10" required >

        <label class="required" for="nacimiento">Fecha de nacimiento: <p>*</p></label>
        <input type="date" name="nacimiento" id="nacimiento" required><br><br>
    </div>
    
        <label placeholder="Campo ">Genero: </label><br>
        <span>Femenino<input required type="radio" name="tipo" value="F"> </span>
        <span>Masculino<input required type="radio" name="tipo" value="M"></span>
        <span>Otro<input required type="radio" name="tipo" value="O"></span><br>
    <br>


    <label2>Numeros de Telefono:</label2><br>
    <div class="btns">
        Habitacion:
        <select name="codihabit">
            <option>-Seleccione-</option>
            <option value="0412-">0412-</option>
            <option value="0414-">0414-</option>
            <option value="0424-">0424-</option>
            <option value="0416-">0416-</option>
            <option value="0426-">0426-</option>
        </select> <input type="text" name="habit" pattern="[0-9.]{1,7}" maxlength="7"><br>
        Celular:
        <select name="codicelu">
            <option value="">-Seleccione-</option>
            <option value="0412-">0412-</option>
            <option value="0414-">0414-</option>
            <option value="0424-">0424-</option>
            <option value="0416-">0416-</option>
            <option value="0426-">0426-</option>
        </select><input type="text" name="celu" pattern="[0-9.]{1,7}" maxlength="7"><br>
    </div><br>

    <div class="btns">
        Oficina:
        <select name="codiofi">
            <option value="">-Seleccione-</option>
            <option value="0412-">0412-</option>
            <option value="0414-">0414-</option>
            <option value="0424-">0424-</option>
            <option value="0416-">0416-</option>
            <option value="0426-">0426-</option>
        </select><input type="text" name="ofi" pattern="[0-9.]{1,7}" maxlength="7">
        Otro:
        <select name="codiotro">
            <option value="">-Seleccione-</option>
            <option value="0412-">0412-</option>
            <option value="0414-">0414-</option>
            <option value="0424-">0424-</option>
            <option value="0416-">0416-</option>
            <option value="0426-">0426-</option>
        </select><input type="text" name="otro" pattern="[0-9.]{1,7}" maxlength="7"><br>
    </div><br>

    
        <label2>Correos Electronicos:</label2><br>
        <div class="btns">
        <span><label>Principal:</label><input type="email" name="correo" required></span>
        <span>Otro:<input type="email" name="correo2"></span><br>
    </div><br>

    <label2>Direccion de Habitacion</label2><br>
    <textarea name="direc" maxlength="100"></textarea><br>

   <p>Los campos obligatorios están marcados con un asterisco rojo *</p><br>

    <div class="btns">
        <button type="submit" name="crear">Crear</button>
        <button type="reset">Limpiar</button>
    </div>
</form>