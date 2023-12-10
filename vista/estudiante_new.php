 <head>
    <link rel="stylesheet" href="./css/crear_estudiante.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<?php
    require_once "./php/main.php";
?>
<form method="post" action="./php/estudiante_guardar.php" autocomplete="off">
    <h1>Crear Estudiante</h1>

    <label for="fecha">Fecha de inscripcion:</label>
    <input type="date" name="inscripcion" id="fecha" required><br>

    <div class="btns">
        <label for="nombre">Nombres:</label>
        <input type="text" name="name" id="nombre" placeholder="Eddo Jose" required><br>

        <label for="ape">Apellidos:</label>
        <input type="text" name="ape" id="ape" placeholder="Chirinos Colina" required><br>
    </div><br>

    <div class="btns">
        <label for="id">Cedula de Identidad:</label>
        <select name="cedula">
            <option value="V-">V-</option>
            <option value="E-">E-</option>
        </select>
        <input type="text" name="cedu" id="id" pattern="[0-9.]{1,10}" maxlength="10" placeholder="30.715.180" required><br>

        <label for="nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="nacimiento" id="nacimiento" required><br>
    </div><br>

    <div class="btns">
        <label>Sexo:</label>
        <span>Femenino<input required type="radio" name="tipo" value="F"> </span>
        <span>Masculino<input required type="radio" name="tipo" value="M"></span><br>
    </div>

    <label>Numeros de Telefono:</label><br>
    <div class="btns">
        Habitacion:<input type="text" name="habit" pattern="[0-9.]{1,11}" maxlength="11" placeholder="0212-2511131"><br>
        Celular:<input type="number" name="celu" pattern="[0-9.]{1,11}" maxlength="11" placeholder="0424-1906240"><br>
    </div><br>

    <div class="btns">
        Oficina:<input type="number" name="ofi" pattern="[0-9.]{1,11}" maxlength="11" placeholder="0212-67842"><br>
        Otro:<input type="number" name="otro" pattern="[0-9.]{1,11}" maxlength="11" placeholder="0416-324567"><br>
    </div><br>

    <div class="btns">
        <label>Correos Electronicos:</label><br>
        <span>Principal:<input type="email" name="correo" required></span><br>
        <span>Otro:<input type="email" name="correo2"></span><br>
    </div><br>

    <label>Direccion de Habitacion</label><br>
    <textarea name="direc" maxlength="100" placeholder="Av.  42, casa Nro. 16-1, sector los samanes, Ciudad Ojeda Municipio Lagunillas"></textarea><br>

    <label>Curso</label>

    <select name="curso">
        <option value="" selected="" >Seleccionar Curso</option>
        <?php
            $cursos=conexion();
            $cursos=$cursos->query("SELECT * FROM cursos");
            if($cursos->rowCount()>0){
                $cursos=$cursos->fetchAll();
                foreach ($cursos as $filas) {
                    echo'<option value="'.$filas['curso_id'].'">'.$filas['curso_nombre']." ".$filas['curso_mes']."/".$filas['curso_año'].'</option>';    
                }
            }
            $cursos=null;
        ?>
    </select><br>

    <div class="btns">
        <button type="submit" name="crear">Crear</button>
        <button type="reset">Limpiar</button>
    </div>
</form>