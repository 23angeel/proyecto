<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      require_once "../php/main.php";

      $id = (isset($_GET['curso_id_up'])) ? $_GET['curso_id_up'] : 0;
      $id=limpiar_cadena($id);

      $check_curso=conexion();
      $check_curso=$check_curso->query("SELECT * FROM cursos WHERE curso_id='$id'");
      if($check_curso->rowCount()>0){
         $datos=$check_curso->fetch();
         $nombre=$datos['curso_nombre'];
         if ($datos['curso_grado']!=0) {
            $grado=$datos['curso_grado'];
         }else{
            $grado="N/A";
         }
         $mes=$datos['curso_mes'];
         $año=$datos['curso_año'];
      }

      $this->Image('logo.jpeg', 210, 12, 60); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(95); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(0); //color

      /* NOMBRE */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("NOMBRE : $nombre"), 0, 0, '', 0);
      $this->Ln(0);

      /* GRADO */
      $this->Cell(80);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("GRADO : $grado"), 0, 0, '', 0);
      $this->Ln(10);

      /* MES */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("MES: $mes"), 0, 0, '', 0);
      $this->Ln(0);

      /* AÑO */
      $this->Cell(80);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("AÑO : $año"), 0, 0, '', 0);
      $this->Ln(20);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(8, 95, 189);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("ESTUDIANTES REGISTRADOS "), 0, 1, 'C', 0);
      $this->Ln(5);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(125, 173, 221); //colorFondo
      $this->SetTextColor(0, 0, 0); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(40, 10, utf8_decode('Nº CEDULA'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('NOMBRES'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('APELLIDOS'), 1, 0, 'C', 1);
      $this->Cell(80, 10, utf8_decode('EVALUACION TEORICA'), 1, 0, 'C', 1);
      $this->Cell(80, 10, utf8_decode('EVALUACION PRACTICA'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('8 Carr. Panamericana, Caracas 1000, Distrito Capital '), 0, 0, 'C'); //pie de pagina(numero de pagina)
   }
}

require_once "../php/main.php";
$id = (isset($_GET['curso_id_up'])) ? $_GET['curso_id_up'] : 0;
$id=limpiar_cadena($id);

$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$campos="estudiantes_cursos.id, estudiantes_cursos.id_curso, estudiantes_cursos.id_estudiante,estudiantes_cursos.evaluacion_teorica,estudiantes_cursos.evaluacion_practica, estudiantes.estudiantes_id, estudiantes.estudiantes_cedula, estudiantes.estudiantes_nombres, estudiantes.estudiantes_apellidos";
$consultar=conexion();
$consultar=$consultar->query("SELECT $campos FROM estudiantes_cursos INNER JOIN estudiantes ON estudiantes_cursos.id_estudiante= estudiantes.estudiantes_id WHERE id_curso ='$id' ORDER BY estudiantes_cedula");
$datos = $consultar;
$datos=$datos->fetchALL();

foreach($datos as $filas){
   $cedula=$filas['estudiantes_cedula'];
   $nombre=$filas['estudiantes_nombres'];
   $apellido=$filas['estudiantes_apellidos'];
   $teorica=$filas['evaluacion_teorica'];
   $practica=$filas['evaluacion_practica'];
/* TABLA */
$pdf->Cell(40, 10, utf8_decode($cedula), 1, 0, 'C', 0);
$pdf->Cell(40, 10, utf8_decode($nombre), 1, 0, 'C', 0);
$pdf->Cell(40, 10, utf8_decode($apellido), 1, 0, 'C', 0);
$pdf->Cell(80, 10, utf8_decode($teorica), 1, 0, 'C', 0);
$pdf->Cell(80, 10, utf8_decode($practica), 1, 1, 'C', 0);
}


$pdf->Output('Prueba2.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
