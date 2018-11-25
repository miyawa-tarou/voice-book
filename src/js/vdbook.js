// JavaScript Document


$(document).ready(
  function(){
	$("div#contents div#section,div#contents div#section2,div#staff a").fadeTo("slow", 0.5);
    $("div#contents div#section,div#contents div#section2,div#staff a").hover(function(){
       $(this).fadeTo("slow", 1.0);
    },function(){
       $(this).fadeTo("slow", 0.5);
    });
  });
