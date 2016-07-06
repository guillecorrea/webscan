$(document).ready(

function(){

$('.btn')
.unbind('click')
.click(function(){

var t= $(this).attr('dat-bot');

if(t == 'escanear'){

$('.btn[dat-bot=descargarimg]').addClass('disabled');
$('.btn[dat-bot=descargarpdf]').addClass('disabled');
$('.btn[dat-bot=escanear]').addClass('disabled');


$('.alert-danger').hide();
$('.alert-info').html('Digitalizando ...').show();
$.get('scan.php?act=scan',function(data){

var img =  $('#idimgscan')[0];

if(data.error){

$('.alert-danger').show();
$('.alert-info').hide();
$('.btn[dat-bot=escanear]').removeClass('disabled');

img.src='./img/scanner_gris.png';

}
else{

$('.alert-info').html('Generando vista previa');
$('.btn[dat-bot=descargarimg]')[0].href='./' + data.img;
$('.btn[dat-bot=descargarpdf]')[0].href='./' + data.pdf;

  
  img.src = './' + data.timg;
 img.onload = function(){ 
     $('.alert-info').hide(); 
    
$('.btn[dat-bot=descargarimg]').removeClass('disabled');
$('.btn[dat-bot=descargarpdf]').removeClass('disabled');
$('.btn[dat-bot=escanear]').removeClass('disabled');

}
   
}

})

}

});


}

);