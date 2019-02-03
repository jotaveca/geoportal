<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Plantillagraficos
 *
 * @author eliasc
 */   


class Libplantillagraficos {
   protected $CI;
   
   protected $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
   
    public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
                //$this->CI->load->database('casos_sociales_des');
        }
    /*
     * Retorna el JavaScript de un solo dataset
     */    
    private function dataset_graficobarras($etiqueta, $datos,$colorfondo){
        
        $etiqueta = "'$etiqueta'";
        $cadena_datos = '';
        $tam = sizeof($datos);
        
        for($i=0;$i<$tam;$i++){
            if($i==$tam-1){
                $cadena_datos = $cadena_datos.$datos[$i];
            }else{
                $cadena_datos = $cadena_datos.$datos[$i].',';
            }            
        }
        
        
        $datos = "'$cadena_datos'";        
        $colorfondo = "'$colorfondo'";
        $dataset = "{
                        label: $etiqueta,
                        backgroundColor: $colorfondo,
                        data: [
                            $datos
                        ]
                    }";        
        return $dataset;
    }
    /*
     * Retorna la cadena JavaScript del contenido de los datasets
     */
    private function datasets_graficobarras($variablesX){        
        $colores = array('window.chartColors.red',
                    'window.chartColors.blue',
                    'window.chartColors.orange',
                    'window.chartColors.green',
                    'window.chartColors.yellow',                                    
                    "'#AF3136'",
                    "'#BF2166'",
                    "'#CF1186'",
                    "'#DF6116'",
                    "'#EF9116'",
                    "'#FF0106'");
        
        $i=0;
        $nombres        = $variablesX['nombres'];
        $set_datos      = $variablesX['set_datos'];
        $tam            = sizeof($set_datos);
        echo 'Tam:'.$tam;
        $cadena_datasets= '';
        //Recorrer los datos de las categorías
        for($j=0;$j<$tam;$j++){
            $datos = $set_datos[$j];
            echo 'Arreglo'.$j;
            var_dump($datos);
            //$tam_datos = sizeof($datos);
            //for($k=0;$k<$tam_datos;$k++){
                $dataset = $this->dataset_graficobarras($nombres[$j],$datos, $colores[$i]);
            //}
            $i++;
            if($j!=$tam-1){
                $cadena_datasets = $cadena_datasets.$dataset.",";
            }else{
                $cadena_datasets = $cadena_datasets.$dataset;
            }
        }
        return $cadena_datasets;
        
    }
    
    public function graficobarras($etiquetasX=null,$variablesX=null){
        
        $nombres_categorias = array('categoría 1','categoria 2','categoría 3');
        //$valorescat[0] = array('2','3','4','5');
        //$valorescat[1] = array('8','9','10','11');
        //$valorescat[2] = array('12','13','14','15');
        $valorescat = array();
        array_push($valorescat, array('2','3','4','5'));
        array_push($valorescat, array('8','9','10','11'));
        array_push($valorescat, array('12','13','14','15'));
        $variablesX['nombres']  = $nombres_categorias;
        $variablesX['set_datos']    = $valorescat;
        //var_dump($valorescat);
        
        $datasets = $this->datasets_graficobarras($variablesX);
        
        //$etiquetasX = '"Enero", "Febrero", "Marzo", "Abril"';
        $etiquetasX  = json_encode($this->meses);
        $grafico = "var barChartData = {
                    labels: $etiquetasX,
                    datasets: [$datasets]
                    };";
        return $grafico;
    }
    
        
}
