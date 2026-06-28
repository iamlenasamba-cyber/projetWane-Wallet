<?php


function telephoneValide($tel){


    if(!is_numeric($tel)){
        return false;
    }
    if(strlen($tel)!=9){
        return false;
    }

    $prefix = substr($tel,0,2);
    if(
        $prefix=="77" ||
        $prefix=="78" ||
        $prefix=="76" ||
        $prefix=="70" ||
        $prefix=="75"
    ){

        return true;
    }
    return false;
}



function codeValide($code){
    if(strlen($code)!=4){
        return false;
    }


    if(!is_numeric($code)){
        return false;
    }

    return true;
}



function montantValide($m){

    return is_numeric($m) && $m>0;

}



function soldeValide($s){

    return is_numeric($s) && $s>=0;

}

?>