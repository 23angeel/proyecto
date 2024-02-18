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
      $this->Image('logo.jpg', 175, 5, 30); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* NOMBRE */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Nombre del curso : $nombre"), 0, 0, '', 0);
      $this->Ln(5);

      /* GRADO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Grado : $grado"), 0, 0, '', 0);
      $this->Ln(5);

      /* MES */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Mes : $mes"), 0, 0, '', 0);
      $this->Ln(5);

      /* AÑO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Año : $año"), 0, 0, '', 0);
      $this->Ln(10);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(8, 95, 189);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("Estudiantes Registrados "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(125, 173, 221); //colorFondo
      $this->SetTextColor(0, 0, 0); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(20, 10, utf8_decode('CEDULA'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('NOMBRES'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('APELLIDOS'), 1, 0, 'C', 1);
      $this->Cell(70, 10, utf8_decode('EVALUACION TEORICA'), 1, 0, 'C', 1);
      $this->Cell(70, 10, utf8_decode('EVALUACION PRACTICA'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$consulta_reporte_alquiler = $conexion->query("  ");*/

/*while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   }*/
$i = $i + 1;
/* TABLA */
$pdf->Cell(20, 10, utf8_decode("numero"), 1, 0, 'C', 0);
$pdf->Cell(30, 10, utf8_decode("nombre"), 1, 0, 'C', 0);
$pdf->Cell(25, 10, utf8_decode("precio"), 1, 0, 'C', 0);
$pdf->Cell(70, 10, utf8_decode("info"), 1, 0, 'C', 0);
$pdf->Cell(70, 10, utf8_decode("total"), 1, 1, 'C', 0);


$pdf->Output('Prueba.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
