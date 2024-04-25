<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      require_once "../php/main.php";

    $id = (isset($_GET['estudiante_id_up'])) ? $_GET['estudiante_id_up'] : 0;
    $id=limpiar_cadena($id);

    $check_estudiante=conexion();
    $check_estudiante=$check_estudiante->query("SELECT * FROM estudiantes WHERE estudiantes_id='$id'");
    if($check_estudiante->rowCount()>0){
        $datos=$check_estudiante->fetch();
        $cedula=$datos['estudiantes_n']." ".$datos['estudiantes_cedula'];
        $nombre=$datos['estudiantes_nombres'];
        $apellido=$datos['estudiantes_apellidos'];
        $nacimiento=$datos['estudiantes_naciemineto'];
        $sexo=$datos['estudiantes_sexo'];
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
        $direccion=$datos['estudiantes_direccion'];
        $inscripcion=$datos['estudiantes_inscripcion'];
   }

      $this->Image('logouni.jpg', 240, 5, 50); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(95); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(0); //color

      /* FECHA DE INSCRIPCION */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("FECHA DE INSCRIPCION : $inscripcion"), 0, 0, '', 0);
      $this->Ln(6);

      /* CEDULA */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Nº CEUDLA : $cedula"), 0, 0, '', 0);
      $this->Ln(0);

      /* NOMBRES */
      $this->Cell(70);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("NOMBRES : $nombre"), 0, 0, '', 0);
      $this->Ln(0);

      /* APELLIDOS */
      $this->Cell(120);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("APELLIDOS: $apellido"), 0, 0, '', 0);
      $this->Ln(6);

      /* FECHA DE NACIMIENTO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("FECHA DE NACIMIENTO : $nacimiento"), 0, 0, '', 0);
      $this->Ln(0);

      /* SEXO */
      $this->Cell(90);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("SEXO : $sexo"), 0, 0, '', 0);
      $this->Ln(6);

      /* NUMEROS DE TELEFONOS */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("NUMEROS DE TELEFONOS :"), 0, 0, '', 0);
      $this->Ln(5);

      /* HABITACION */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("HABITACION : $habitacion"), 0, 0, '', 0);
      $this->Ln(0);

      /* CELULAR */
      $this->Cell(80);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("CELULAR : $celular"), 0, 0, '', 0);
      $this->Ln(0);

      /* OFICINA */
      $this->Cell(150);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("OFICINA : $oficina"), 0, 0, '', 0);
      $this->Ln(0);

      /* OTRO */
      $this->Cell(210);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("OTRO : $otro"), 0, 0, '', 0);
      $this->Ln(6);

      /* CORREOS ELECTRONICOS */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("CORREOS ELECTRONICOS :"), 0, 0, '', 0);
      $this->Ln(5);

      /* PRINCIPAL */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("PRINCIPAL : $correo"), 0, 0, '', 0);
      $this->Ln(0);

      /* SECUNDARIO */
      $this->Cell(80);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("OTRO : $correo2"), 0, 0, '', 0);
      $this->Ln(6);

      /* DIRECCION */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("DIRECCION : $direccion"), 0, 0, '', 0);
      $this->Ln(10);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(8, 95, 189);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("HISTORIAL ACADEMICO "), 0, 1, 'C', 0);
      $this->Ln(3);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(125, 173, 221); //colorFondo
      $this->SetTextColor(0, 0, 0); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(40, 10, utf8_decode('#'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('CURSO / GRADO'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('TRAYECTO'), 1, 0, 'C', 1);
      $this->Cell(80, 10, utf8_decode('EVALUACION TEORICA'), 1, 0, 'C', 1);
      $this->Cell(80, 10, utf8_decode('EVALUACION PRACTICA'), 1, 1, 'C', 1);
   }

    // Pie de página
   function Footer()
   {

      $this->SetY(-35); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('___________________'), 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-30); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('FIRMA '), 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('8 Carr. Panamericana, Caracas 1000, Distrito Capital '), 0, 0, 'C'); //pie de pagina(numero de pagina)
   }
}

require_once "../php/main.php";
$id = (isset($_GET['estudiante_id_up'])) ? $_GET['estudiante_id_up'] : 0;
$id=limpiar_cadena($id);

$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$campos="estudiantes_cursos.id, estudiantes_cursos.id_curso, estudiantes_cursos.id_estudiante,estudiantes_cursos.evaluacion_teorica,estudiantes_cursos.evaluacion_practica, cursos.curso_id, cursos.curso_nombre, cursos.curso_grado, cursos.curso_mes, cursos.curso_año";
$consultar=conexion();
$consultar=$consultar->query("SELECT $campos FROM estudiantes_cursos INNER JOIN cursos ON estudiantes_cursos.id_curso=cursos.curso_id WHERE id_estudiante= '$id' ORDER BY curso_año");
$datos = $consultar;
$datos=$datos->fetchALL();

foreach($datos as $filas){
   if ($filas['curso_grado']!=0) {
      $grado=$filas['curso_grado'];
   }else{
         $grado="";
   }
   $i = $i + 1;
   $curso=$filas['curso_nombre'].' '.$grado;
   $trayecto=$filas['curso_mes']."/".$filas['curso_año'];
   $teorica=$filas['evaluacion_teorica'];
   $practica=$filas['evaluacion_practica'];
/* TABLA */
$pdf->Cell(40, 10, utf8_decode($i), 1, 0, 'C', 0);
$pdf->Cell(40, 10, utf8_decode($curso), 1, 0, 'C', 0);
$pdf->Cell(40, 10, utf8_decode($trayecto), 1, 0, 'C', 0);
$pdf->Cell(80, 10, utf8_decode($teorica), 1, 0, 'C', 0);
$pdf->Cell(80, 10, utf8_decode($practica), 1, 1, 'C', 0);
}


$pdf->Output('Estudiantes.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
