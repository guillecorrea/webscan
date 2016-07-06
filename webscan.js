
var datascan = {};

$(document).ready(

function(){

$('.btn')
.unbind('click')
.click(function(){

var t= $(this).attr('dat-bot');

if(t=='print'){

$('.alert-danger').hide();
  $('.alert-info').html('Generando Impresion ...').show();
  $.get('scan.php?act=print&fprint=' + encodeURI(datascan.pdf) ,function(data){

        if(data.error){
            $('.alert-danger').html('Error al imprimir').show();
            $('.alert-info').hide();
            $('.btn[dat-bot=print]').removeClass('disabled');

        }
        $('.alert-info').html('impresion enviada ').show();
         $('.btn[dat-bot=print]').removeClass('disabled');


  });


}

if(t == 'escanear'){

$('.btn[dat-bot=descargarimg]').addClass('disabled');
$('.btn[dat-bot=descargarpdf]').addClass('disabled');
$('.btn[dat-bot=escanear]').addClass('disabled');
$('.btn[dat-bot=print]').addClass('disabled');


$('.alert-danger').hide();
$('.alert-info').html('Digitalizando ...<br> <small>Puede demorar </small>').show();
$.get('scan.php?act=scan',function(data){

datascan = data;
var img =  $('#idimgscan')[0];

if(data.error){

$('.alert-danger').html('Error al digitalizar la imagen ').show();
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
$('.btn[dat-bot=print]').removeClass('disabled');
}
   
}

})

}

});


}

);