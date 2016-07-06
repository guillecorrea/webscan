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
if($act =="scan"){

$scanimg = __DIR__."/data/scan_".session_id().".png";
$scanpdf = __DIR__."/data/scan_".session_id().".pdf";
$scantimg = __DIR__."/data/tscan_".session_id().".png";


$ret = shell_exec( "hp-scan  -r 200 -m color   -o " .$scanimg);
$ret2 =shell_exec(" convert ".$scanimg ." ". $scanpdf);
$ret3= shell_exec(" convert -scale 50% ".$scanimg ." ". $scantimg);

$error = FALSE;
$errormsj ="";
if(!(strpos($ret,"error") === FALSE ) ){ $error = TRUE ; $errormsj = "Error al digitalizar " ; }

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