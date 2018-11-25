// JavaScript Document


$(document).ready(
  function(){
	$("div#contents div#section,div#contents div#section2,div#staff a,p#story").fadeTo("slow", 0.5);
    $("div#contents div#section,div#contents div#section2,div#staff a,p#story").hover(function(){
       $(this).fadeTo("slow", 1.0);
    },function(){
       $(this).fadeTo("slow", 0.5);
    });
  });
