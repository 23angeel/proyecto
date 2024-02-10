<head>
    <link rel="stylesheet" type="text/css" href="./css/cursos_admin.css">
    <link rel="stylesheet" type="text/css" href="./css/estudiantes_profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
</head>
<?php
	require_once "./php/main.php";

	$id = (isset($_GET['estudiante_id_up'])) ? $_GET['estudiante_id_up'] : 0;
	$id=limpiar_cadena($id);

	$check_estudiante=conexion();
	$check_estudiante=$check_estudiante->query("SELECT * FROM estudiantes WHERE estudiantes_id='$id'");
	if($check_estudiante->rowCount()>0){
		$datos=$check_estudiante->fetch();
		if ($datos['estudiantes_habitacion']!="") {
            $habitacion=$datos['estudiantes_habitacion'];
        }else{
            $habitacion="N/A";
        }
        if ($datos['estudiantes_celular']!="") {
            $celular=$datos['estudiantes_celular'];
        }else{
            $celular="N/A";
        }
        if ($datos['estudiantes_oficia']!="") {
            $oficina=$datos['estudiantes_oficia'];
        }else{
            $oficina="N/A";
        }
        if ($datos['estudiantes_otro']!="") {
            $otro=$datos['estudiantes_otro'];
        }else{
            $otro="N/A";
        }
        if ($datos['estudiantes_correo']!="") {
            $correo=$datos['estudiantes_correo'];
        }else{
            $correo="N/A";
        }
        if ($datos['estudiantes_correo2']!="") {
            $correo=$datos['estudiantes_correo2'];
        }else{
            $correo2="N/A";
        }
?>
<div class="header d-none">
    <img src="./Imagenes/zyro-image (2).png" alt="">
</div>

<div class="container">
    <div class="button-content">
	    <h5>Informacion del Estudiante</h5>
	    <button class="button">descargar PDF</button>
    </div>
<div class="pdf d-none">
    <div>
        <label><b>Fecha de Registro</b></label>
        <span><?php echo $datos['estudiantes_inscripcion'];?></span>
    </div>

    <div>
        <label><b>Cedula de Identidad</b></label>
        <span><?php echo $datos['estudiantes_cedula'];?></span>
    </div>
    
        <div>
    <label><b>Nombres</b></label>
    <span><?php echo $datos['estudiantes_nombres'];?></span>
    </div>
<div>
    <label><b>Apellidos</b></label>
    <span><?php echo $datos['estudiantes_apellidos'];?></span>
</div>
<div>
    <label><b>Fecha de Naciemiento</b></label>
    <span><?php echo $datos['estudiantes_naciemineto'];?></span>
</div>
<div>
    <label><b>Sexo</b></label>
    <span><?php echo $datos['estudiantes_sexo'];?></span>
</div>
<div>
    <legend><b>Numeros de Telefonos</b></legend>
    <label><b>Habitacion</b></label>
    <span><?php echo $habitacion;?></span>
</div>
<div>
    <label><b>Celular</b></label>
    <span><?php echo $celular;?></span>
</div>
<div>
    <label><b>Oficina</b></label>
    <span><?php echo $oficina;?></span>
</div>
<div>
    <label><b>Otro</b></label>
    <span><?php echo $otro;?></span>
</div>
<div>
    <legend><b>Correos Electronicos</b></legend>
    <label><b>Principal</b></label>
    <span><?php echo $correo;?></span>
</div>
<div>
    <label><b>Otro</b></label>
    <span><?php echo $correo2;?></span>
</div>
<div>
    <label><b>Direccion</b></label>
    <span><?php echo $datos['estudiantes_direccion'];?></span>
    </div>
</div>
<div class="table-content">
  <legend class="titulo">Historial academico</legend>
	<?php
    require_once "./php/main.php";

    //Eliminar matricula
    if(isset($_GET['matricula_id_del'])){
        require_once "./php/matricula_eliminar.php";
    }

    if (!isset($_GET['page'])) {
        $pagina=1;
    }else{
        $pagina=(int) $_GET['page'];
        if($pagina<=1){
            $pagina=1;
        }

    }

    $pagina=limpiar_cadena($pagina);
    $url="index.php?vista=estudiante_profile&estudiante_id_up=".$id."&page=";
    $registros=15;
    $busqueda="";

    require_once './php/curso_estudiantes_lista.php';
?>
</div>
</div>

<?php
	}else{
		echo '
            <script>
                alert("No podemos obtener la informacion solicitada");
                window.location = "index.php?vista=estudiantes_list"
            </script>
            ';
	}
	$check_estudiante=null;
?>

<script>
const PDF = document.querySelector(".pdf");
const TABLE = document.querySelector(".table-content");
const BUTTON_PDF = document.querySelector(".button");
const BUTTON_CONTENT = document.querySelector(".button-content");
const NAV = document.querySelector(".nav");
const CONTAINER = document.querySelector(".container");
const HEADER = document.querySelector(".header");

BUTTON_PDF.addEventListener("click", ()=> {
        remove();
     window.print();
});

function remove() {
    PDF.classList.remove("d-none");
    TABLE.classList.add("d-none");
    BUTTON_PDF.classList.add("d-none");
    BUTTON_CONTENT.classList.add("d-none"); 
    NAV.classList.add("d-none");
    CONTAINER.classList.replace("container","container-fluid");
    HEADER.classList.remove("d-none");

     setTimeout(()=> {
     PDF.classList.add("d-none");
     TABLE.classList.remove("d-none");
     BUTTON_PDF.classList.remove("d-none");
     BUTTON_CONTENT.classList.remove("d-none"); 
      NAV.classList.remove("d-none");
      CONTAINER.classList.replace("container-fluid", "container");
      HEADER.classList.add("d-none");

     },500);
}
</script>