<?php
session_name("WEBSCAN");
session_start();


function retorno($dt){
    
	
    header('Content-type: application/json');
    echo json_encode($dt);

    exit();


}

if(isset($_GET['act'])){
$act= $_GET['act'];

if($act == "print"){

$error = FALSE;
        $errormsj="";

    $d = __DIR__.''.$_GET['fprint'];

    if(file_exists($d)){

      $ret=  shell_exec("lpr -PPS \"". $d ."\"");

      // detectar si fuye correcta la impresion 

    }else{

        $error = TRUE;
        $errormsj="Problemas al imprimir (E1)";
    }

    retorno(array(
        'error'=>$error,
        'errormsj'=>$errormsj
        ));
}


if($act =="scan"){

$scanimg = __DIR__."/data/scan_".session_id().".png";
$scanpdf = __DIR__."/data/scan_".session_id().".pdf";
$scantimg = __DIR__."/data/tscan_".session_id().".png";


$error = FALSE;
$errormsj ="";

$ret = shell_exec( "hp-scan  -r 200 -m color   -o " .$scanimg);

if(file_exists($scanimg)){
$ret2 =shell_exec(" convert -rotate 180 ".$scanimg ." ". $scanimg);
$ret2 =shell_exec(" convert ".$scanimg ." ". $scanpdf);
$ret3= shell_exec(" convert -scale 50% ".$scanimg ." ". $scantimg);

}
else { 
    $error = TRUE ; 
    $errormsj = "Error al digitalizar " ; 
    }

retorno(array(
    'error' =>$error,
    'errormsj'=>$errormsj,
    'img'=>str_replace(__DIR__,'',$scanimg),
    'timg'=>str_replace(__DIR__,'',$scantimg),
    'pdf'=>str_replace(__DIR__,'',$scanpdf)
));

}



}else{

echo "";

}
?>
