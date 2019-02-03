<?php
/** Incluir la libreria PHPExcel */
include ("application/libraries/PHPexcel/Classes/PHPExcel.php");
include ("application/libraries/PHPexcel/Classes/PHPExcel/IOFactory.php");




$objPHPExcel = new PHPExcel();

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load('application/xls/plantilla_asociaciones_roagro.xlsx');

// Crea un nuevo objeto PHPExcel


// Establecer propiedades
/*$objPHPExcel->getProperties()
->setCreator("Cattivo")
->setLastModifiedBy("Cattivo")
->setTitle("Documento Excel de Prueba")
->setSubject("Documento Excel de Prueba")
->setDescription("Demostracion sobre como crear archivos de Excel desde PHP.")
->setKeywords("Excel Office 2007 openxml php")
->setCategory("Pruebas de Excel");*/



$siglas_proyecto = "ROAGRO - ".$proyectos[0]['tx_nombre'];

$nb_centro_poblado="";


  /*for ($i = 0; $i < count($centros_poblados_ejec); $i++) {                         
    
    if($centros_poblados_ejec[$i]['codcp'] == $proyectos[0]['id_centro_poblado_ejec'] ){
        $nb_centro_poblado=$centros_poblados_ejec[$i]['nomcp'];
    }     
              
  }*/

//var_dump($centros_poblados_ambito);
//die();


// Agregar Información General
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('C6', $proyectos[0]['tx_razon'])
->setCellValue('C7', $proyectos[0]['tx_ruc'])
->setCellValue('C8', $proyectos[0]['tx_nombre'])
->setCellValue('C9', $proyectos[0]['tx_telefono'])
->setCellValue('C10', $proyectos[0]['fe_inicio_actividades'])

->setCellValue('E6', $proyectos[0]['tx_pagina'])
->setCellValue('E7', $proyectos[0]['tx_correo'])
->setCellValue('E8', $proyectos[0]['nu_socios_colonos'])
->setCellValue('E9', $proyectos[0]['nu_socios_indigenas'])
->setCellValue('E10', $proyectos[0]['nu_socios_total'])
;


$fe_registro = DateTime::createFromFormat("Y-m-d", $proyectos[0]['fe_registro'])->format('d/m/Y');
$fe_actualizacion = DateTime::createFromFormat("Y-m-d", $proyectos[0]['fe_actualizacion'])->format('d/m/Y'); 

// Presentación de la Asociación / Cooperativa
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('C17', $proyectos[0]['tx_mision'])
->setCellValue('C18', $fe_registro)

->setCellValue('E17', $proyectos[0]['tx_vision'])	
->setCellValue('E18', $fe_actualizacion)
;


//Logo de MPPPS
$gdImage = imagecreatefrompng(base_url()."assets/img/roagro.png");//Direccion del logo
$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('Logotipo');
$objDrawing->setDescription('Logotipo');
$objDrawing->setImageResource($gdImage);
$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setHeight(300);
$objDrawing->setwidth(250);
$objDrawing->setCoordinates('A1');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());



//$objPHPExcel->createSheet(1);	
		
// Dirección Oficina Central
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('C26', 'Perú')
->setCellValue('C27', $centros_poblados_ejec[0]['dep'])
->setCellValue('C28', $centros_poblados_ejec[0]['prov'])
->setCellValue('C29', $centros_poblados_ejec[0]['dist'])

->setCellValue('E26',  $centros_poblados_ejec[0]['nomcp'])
->setCellValue('E27', $proyectos[0]['tx_centro_poblado_direccion'])
->setCellValue('E28', $proyectos[0]['tx_direccion'])
;

// Dirección Oficina Central
$j = 39;
for($i=0;$i<count($centros_poblados_ambito);$i++){
    
   // Agregar Centro Poblado                             
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$j, $centros_poblados_ambito[$i]['dep'] )                     
->setCellValue('C'.$j, $centros_poblados_ambito[$i]['prov'] )
->setCellValue('D'.$j, $centros_poblados_ambito[$i]['dist'] )
->setCellValue('E'.$j, $centros_poblados_ambito[$i]['nomcp'] ); 

	$j++;


}


// Agregar pestaña Estructura organica
$objPHPExcel->setActiveSheetIndex(1)
->setCellValue('C5', $proyectos[0]['tx_tipo'])
/*ASOCIACION*/
->setCellValue('C11', $proyectos[0]['tx_presidente_asociacion'])
->setCellValue('C12', $proyectos[0]['tx_vicepresidente_asociacion'])
->setCellValue('C13', $proyectos[0]['tx_secretario_asociacion'])
->setCellValue('E11', $proyectos[0]['tx_tesorero_asociacion'])
->setCellValue('E12', $proyectos[0]['tx_vocal_1_asociacion'])
->setCellValue('E13', $proyectos[0]['tx_vocal_2_asociacion'])

/*COOPERATIVA*/
->setCellValue('C20', $proyectos[0]['tx_presidente_ca'])
->setCellValue('C21', $proyectos[0]['tx_vicepresidente_ca'])
->setCellValue('C22', $proyectos[0]['tx_secretario_ca'])
->setCellValue('E20', $proyectos[0]['tx_vocal_1_ca'])
->setCellValue('E21', $proyectos[0]['tx_vocal_2_ca'])


->setCellValue('C25', $proyectos[0]['tx_presidente_ceduc'])
->setCellValue('C26', $proyectos[0]['tx_vicepresidente_ceduc'])
->setCellValue('C27', $proyectos[0]['tx_secretario_ceduc'])

->setCellValue('C30', $proyectos[0]['tx_presidente_celect'])
->setCellValue('C31', $proyectos[0]['tx_vicepresidente_celect'])
->setCellValue('C32', $proyectos[0]['tx_secretario_celect'])

->setCellValue('C35', $proyectos[0]['tx_nombre_gerente'])
->setCellValue('C36', $proyectos[0]['tx_telefono_gerente'])
->setCellValue('C37', $proyectos[0]['tx_correo_gerente'])
;


//Logo
$gdImage = imagecreatefrompng(base_url()."assets/img/roagro.png");//Direccion del logo
$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('Logotipo');
$objDrawing->setDescription('Logotipo');
$objDrawing->setImageResource($gdImage);
$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setHeight(300);
$objDrawing->setwidth(250);
$objDrawing->setCoordinates('A1');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());





$tx_certificacion_cafe = trim(str_replace("NO,", " ", $proyectos[0]['tx_certificacion_cafe']));
$tx_certificacion_cacao = trim(str_replace("NO,", " ", $proyectos[0]['tx_certificacion_cacao']));
$tx_certificacion_otro = trim(str_replace("NO,", " ", $proyectos[0]['tx_certificacion_otro']));


// Agregar pestaña Producción actual
$objPHPExcel->setActiveSheetIndex(2)
/*CAFE*/
->setCellValue('C5', $proyectos[0]['tx_oferta_cafe'])
->setCellValue('C6', $proyectos[0]['tx_cosecha_cafe'])
->setCellValue('C7', $proyectos[0]['tx_calidad_cafe'])
->setCellValue('E5', $proyectos[0]['tx_produccion_cafe'])
->setCellValue('E6', $proyectos[0]['tx_variedades_cafe'])
->setCellValue('E7', $tx_certificacion_cafe)

/*CACAO*/
->setCellValue('C14', $proyectos[0]['tx_oferta_cacao'])
->setCellValue('C15', $proyectos[0]['tx_cosecha_cacao'])
->setCellValue('E14', $proyectos[0]['tx_produccion_cacao'])
->setCellValue('E15', $proyectos[0]['tx_variedades_cacao'])
->setCellValue('E16', $tx_certificacion_cacao)


/*OTRO*/
->setCellValue('C22', $proyectos[0]['tx_otro'])
->setCellValue('C23', $proyectos[0]['tx_oferta_otro'])
->setCellValue('C24', $proyectos[0]['tx_cosecha_otro'])
->setCellValue('E22', $proyectos[0]['tx_produccion_otro'])
->setCellValue('E23', $proyectos[0]['tx_variedades_otro'])
->setCellValue('E24', $tx_certificacion_otro)


;


//Logo
$gdImage = imagecreatefrompng(base_url()."assets/img/roagro.png");//Direccion del logo
$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('Logotipo');
$objDrawing->setDescription('Logotipo');
$objDrawing->setImageResource($gdImage);
$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setHeight(300);
$objDrawing->setwidth(250);
$objDrawing->setCoordinates('A1');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());



// Agregar pestaña Servicios
$objPHPExcel->setActiveSheetIndex(3)

->setCellValue('C5', $proyectos[0]['tx_capacitacion'])
->setCellValue('C6', $proyectos[0]['tx_acopio'])
->setCellValue('E5', $proyectos[0]['tx_comercializacion'])

->setCellValue('C13', $proyectos[0]['tx_productos'])
->setCellValue('E13', $proyectos[0]['tx_servicios'])

->setCellValue('C20', $proyectos[0]['tx_descripcion_logros'])

->setCellValue('C26', $proyectos[0]['tx_descripcion_clientes'])

->setCellValue('C32', $proyectos[0]['tx_descripcion_alianzas'])

->setCellValue('C38', $proyectos[0]['tx_descripcion_siguenos'])

;


//Logo
$gdImage = imagecreatefrompng(base_url()."assets/img/roagro.png");//Direccion del logo
$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('Logotipo');
$objDrawing->setDescription('Logotipo');
$objDrawing->setImageResource($gdImage);
$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setHeight(300);
$objDrawing->setwidth(250);
$objDrawing->setCoordinates('A1');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());


// Agregar pestaña Proyectos

// Dirección Oficina Central
$j = 8;
for($i=0;$i<count($proyecto_asociacion);$i++){

$fe_inicio = DateTime::createFromFormat("Y-m-d", $proyecto_asociacion[$i]['fe_inicio'])->format('d/m/Y');
$fe_fin = DateTime::createFromFormat("Y-m-d", $proyecto_asociacion[$i]['fe_fin'])->format('d/m/Y'); 
    
   // Agregar Centro Poblado                             
$objPHPExcel->setActiveSheetIndex(4)
->setCellValue('B'.$j, $proyecto_asociacion[$i]['tx_nombre_proyecto'] )                     
->setCellValue('C'.$j, $proyecto_asociacion[$i]['tx_entidad_ejecutora'] )
->setCellValue('D'.$j, $proyecto_asociacion[$i]['nu_presupuesto'] )
->setCellValue('E'.$j, $fe_inicio )
->setCellValue('F'.$j, $fe_fin )
->setCellValue('G'.$j, $proyecto_asociacion[$i]['tx_actividades'] ); 

	$j++;


}

;


//Logo
$gdImage = imagecreatefrompng(base_url()."assets/img/roagro.png");//Direccion del logo
$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('Logotipo');
$objDrawing->setDescription('Logotipo');
$objDrawing->setImageResource($gdImage);
$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setHeight(300);
$objDrawing->setwidth(250);
$objDrawing->setCoordinates('A1');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());






//IMAGEN GALERIA



$objPHPExcel->setActiveSheetIndex(5);


$j = 7;

for ($i=0;$i<count($galerias);$i++){


$ruta_imagen = base_url()."upload/".$galerias[$i]['imagen'];

if (exif_imagetype($ruta_imagen) == IMAGETYPE_JPEG) {
    
     $gdImage = imagecreatefromjpeg($ruta_imagen);
}

if (exif_imagetype($ruta_imagen) == IMAGETYPE_PNG) {
    
     $gdImage = imagecreatefrompng($ruta_imagen);
}

$t = ($j + $i*30);

$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('Logotipo');
$objDrawing->setDescription('Logotipo');
$objDrawing->setImageResource($gdImage);
$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setHeight(500);
$objDrawing->setwidth(500);
$objDrawing->setCoordinates("B$t");
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

}//fin for



//Logo
$gdImage = imagecreatefrompng(base_url()."assets/img/roagro.png");//Direccion del logo
$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('Logotipo');
$objDrawing->setDescription('Logotipo');
$objDrawing->setImageResource($gdImage);
$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setHeight(300);
$objDrawing->setwidth(250);
$objDrawing->setCoordinates('A1');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());





// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);

// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.ms-excel');

header("Content-Disposition: attachment;filename='$siglas_proyecto.xls'");
//header("Content-Disposition: attachment;filename='HojaPruebaExcel.xls'");

header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>