<?php
/** Incluir la libreria PHPExcel */
include ("application/libraries/PHPexcel/Classes/PHPExcel.php");
include ("application/libraries/PHPexcel/Classes/PHPExcel/IOFactory.php");

$objPHPExcel = new PHPExcel();

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load('application/xls/plantilla_proyectos_reproc.xlsx');

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



$siglas_proyecto = $proyectos[0]['tx_siglas'];

// Agregar Entidad ejecutora
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('C6', $proyectos[0]['tx_razon_social_ejec'])
->setCellValue('C7', $proyectos[0]['tx_ruc_ejec'])
->setCellValue('C8', $proyectos[0]['tx_direccion_ejec'])
->setCellValue('C9', $proyectos[0]['tx_telefono_ejec'])
->setCellValue('C10', $proyectos[0]['tx_pagina_web_ejec'])
->setCellValue('C11', $proyectos[0]['tx_correo_electronico_ejec'])

->setCellValue('E6', 'Perú')
->setCellValue('E7', $proyectos[0]['nb_region_ejec'])
->setCellValue('E8', $proyectos[0]['nb_provincia_ejec'])
->setCellValue('E9', $proyectos[0]['nb_distritos_ejec'])
;




// Agregar Entidad financiera
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('C18', $proyectos[0]['tx_razon_social_finan'])
->setCellValue('C19', $proyectos[0]['tx_ruc_finan'])
->setCellValue('C20', $proyectos[0]['tx_direccion_finan'])
->setCellValue('C21', $proyectos[0]['tx_telefono_finan'])
->setCellValue('C22', $proyectos[0]['tx_pagina_web_finan'])
->setCellValue('C23', $proyectos[0]['tx_correo_electronico_finan'])

->setCellValue('E18', 'Perú')
->setCellValue('E19', $proyectos[0]['nb_region_finan'])
->setCellValue('E20', $proyectos[0]['nb_provincia_finan'])
->setCellValue('E21', $proyectos[0]['nb_distritos_finan'])
;




// Agregar Residente
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('C28', $proyectos[0]['tx_nom_ape_residente'])
->setCellValue('C29', $proyectos[0]['tx_dni_residente'])
->setCellValue('C30', $proyectos[0]['tx_email_residente'])

->setCellValue('E28', $proyectos[0]['tx_profesion_residente'])
->setCellValue('E29', $proyectos[0]['tx_telefono_residente'])
;

$fe_inicio = DateTime::createFromFormat("Y-m-d", $proyectos[0]['fe_inicio'])->format('d/m/Y');
$fe_fin = DateTime::createFromFormat("Y-m-d", $proyectos[0]['fe_fin'])->format('d/m/Y'); 




// Agregar Identificación
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('C35', $proyectos[0]['tx_nombre'])
->setCellValue('C36', $proyectos[0]['tx_intervencion'])
->setCellValue('C37', $proyectos[0]['tx_tipo_intervencion'])
->setCellValue('C38', $fe_inicio)
->setCellValue('C39', $proyectos[0]['tx_co_snip'])
->setCellValue('C40', $proyectos[0]['nu_beneficiarios'])

->setCellValue('E35', $proyectos[0]['tx_siglas'])
->setCellValue('E36', $proyectos[0]['tx_rubro'])
->setCellValue('E37', $proyectos[0]['tx_situacion_intervencion'])
->setCellValue('E38', $fe_fin )
->setCellValue('E39', 'Perú')
->setCellValue('E40', $proyectos[0]['nb_region_proy'])
->setCellValue('E41', $proyectos[0]['nb_provincia_proy'])
->setCellValue('E42', $proyectos[0]['nb_distrito_proy'])
;




$cp = '';
for($i=0;$i<count($centros_poblados_proyecto);$i++){
    
    $cp .= $centros_poblados_proyecto[$i]['nomcp']." - ";
    
}
// Agregar Centro Poblado                             
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C41', $cp );                             
 // Agregar Centro Otro Poblado                             
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C42', $proyectos[0]['tx_otro_centro_poblado'] );                     
                          
                             
                            
// Agregar Resultados
$resultado = 70;
$actividad = 70;

for ($i = 0; $i < count($actividades_proyecto); $i ++){
    
    $id_resultado_actual = $actividades_proyecto[$i]['id_resultado'];
    $id_resultado_anterior = $actividades_proyecto[$i]['id_resultado'];
    
    if($i != 0){
        $id_resultado_anterior = $actividades_proyecto[$i-1]['id_resultado'];
    }   
      
        
        $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue("B$resultado", $actividades_proyecto[$i]['tx_resultado'])
        ->setCellValue("D$actividad", $actividades_proyecto[$i]['tx_actividad']);
        
        $resultado++;
        $actividad++;
        
       

}



// Agregar Costos
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('C51', $proyectos[0]['tx_tipo_moneda'])
->setCellValue('C52', $proyectos[0]['nu_presupuesto_total'])
->setCellValue('E51', $proyectos[0]['nu_monto_financiado'])
->setCellValue('E52', $proyectos[0]['nu_monto_contrapartida'])
;

// Agregar Evaluacion
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('C59', $proyectos[0]['tx_evaluacion'])
->setCellValue('E59', $proyectos[0]['tx_gestiones'])
;




//Logo de MPPPS
$gdImage = imagecreatefrompng(base_url()."assets/img/reproc.png");//Direccion del logo
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

$j = 90;

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





// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle("$siglas_proyecto");

// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);

// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment;filename='$siglas_proyecto.xls'");
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>