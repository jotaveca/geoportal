/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function envioseguro(param){
    
    var pass_hash = CryptoJS.SHA256(param);    
    return pass_hash;  
    
};

function validarigualcontrasena (c1,c2){
      if(  c1 !="" && c2 !="" &&  c1 == c2){
            //alert("Iguales");
            return true;
        }
        else{
            //alert("No Iguales");
            return false;
        }
};

function validarintegridad (c1,c2){
    if ( c1 == "" && c2!=""){
        //alert("No hay integridad");
        return false;
    }else{
        if (c1 != "" && c2==""){
            //alert("No hay integridad");
            return false;
        }
        else{
            //alert("Hay integridad");
            return true;        
        }
    }
}

/*
 * La siguente expresión regular nos permite verificar que una contraseña contiene letras tanto en mayusculas y minusculas como caracteres numericos. También verifica que el tamaño de la contraseña sea de 8 a 12 caracteres.
^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}$
en este caso, (?=.*\d) verifica la existencia de un caracter numerico, (?=.*[a-z]) la de una letra minuscula y (?=.*[A-Z]) la de una letra en mayusculas. 
Por ultimo la longitud la verificamos con los valores entre llaves {8,12}.
 */

function politicacontrasena(c){
    var expreg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}$/;
        
    if(!expreg.test(c)){
        //alert("No cumple con la política");
        return false;
    }
    //alert("Cumple con la política");
    return true;
}

function haycontrasena(c1,c2){
    if(c1==c2 && c1==""){
        return false;
    }
    else{
        return true;
    }
    
    
}