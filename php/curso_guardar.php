<?php
	require_once "main.php";

	//Almacenar datos
	$curso = limpiar_cadena($_POST['name']);
    $grado = limpiar_cadena($_POST['grado']);
    $mes = limpiar_cadena($_POST['mes']);
    $año = limpiar_cadena($_POST['año']);

     #Verificar datos obligatorios
     if($curso=="" || $mes=="" || $año==""){
     	echo '
            <script>
                alert("No has llenado todo los campos que son obligatorios");
                window.location = "../index.php?vista=home"
            </script>
        ';
        exit();
    }

    //Verificar grado
    if ($grado!="") {
	    if ($grado!=2 && 3 && 4 && 5) {
	    	echo '
	            <script>
	                alert("El grado no coincide con el formato solicitado");
	                window.location = "../index.php?vista=home"
	            </script>
	        ';
	        exit();
	    }
	}

    # Directorio de imagenes #
    $img_dir="../Imagenes/curso/";

    //Comprobar si se selecciono una imagen
    if ($_FILES['imagen']['name']!="" && $_FILES['imagen']['size']>0) {
        
        # Creando directorio #
        if (!file_exists($img_dir)) {
            if (!mkdir($img_dir,0777)) {
                echo '
                <script>
                    alert("Error al crear el directorio");
                    window.location = "../index.php?vista=home"
                </script>
            ';
            exit();
            } 
        }

        # Verificando formato de las imagenes #
        if (mime_content_type($_FILES['imagen']['tmp_name'])!="image/jpeg" && mime_content_type($_FILES['imagen']['tmp_name'])!="image/png") {
            echo '
                <script>
                    alert("La imagen que ha saleccionado es de un formato no permitido");
                    window.location = "../index.php?vista=curso_new"
                </script>
            ';
            exit();
        }

        # Verificando peso de imagen #
        if (($_FILES['imagen']['size']/1024>3072)) {
            echo '
                <script>
                    alert("La imagen que ha saleccionado supera el peso permitido");
                    window.location = "../index.php?vista=curso_new"
                </script>
            ';
            exit();  
        }

        # Extension de la imagen #
        switch (mime_content_type($_FILES['imagen']['tmp_name'])) {
            case'image/jpeg':
                $img_ext=".jpg";
            break;
            case'image/png':
                $img_ext=".png";
            break;
        }

        chmod($img_dir, 0777);

        $img_nombre=renombrar_fotos($curso);
        $foto=$img_nombre.$img_ext;

        # Moviendo imagen al directorio #
        if (!move_uploaded_file($_FILES['imagen']['tmp_name'],$img_dir.$foto)) { 
             echo '
                <script>
                    alert("No podemos subir la imagen al sistema en este momento");
                    window.location = "../index.php?vista=curso_new"
                </script>
            ';
            exit();  
        }
    }else{
        $foto="";
    }

	#GUARDAR DATOS
    $guardar_curso=conexion();
    $guardar_curso=$guardar_curso->prepare("INSERT INTO cursos(curso_nombre, curso_grado, curso_mes, curso_año, curso_foto) VALUES( :curso, :grado, :mes, :tiempo, :foto)");

    $marcadores=[
        ":curso"=>$curso,
        ":grado"=>$grado,
        ":mes"=>$mes,
        ":tiempo"=>$año,
        ":foto"=>$foto
    ];
    $guardar_curso->execute($marcadores);

    if($guardar_curso->rowCount()==1){
        echo '
            <script>
                alert("El curso se registro correctamente");
                window.location = "../index.php?vista=cursos_list"
            </script>
        ';
    }else{
        echo '
            <script>
                alert("No se pudo registrar el curso, intentelo nuevamente");
                window.location = "../index.php?vista=curso_new"
            </script>
        ';
    }
    $guardar_curso=null;
