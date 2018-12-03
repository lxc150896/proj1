$("#back-to-top").click(function(){return $("body, html").animate({scrollTop:0},400),!1});
$(function(){$('[data-toggle="tooltip"]').tooltip()});
var myElement = document.querySelector(".headroom");
// construct an instance of Headroom, passing the element
var headroom  = new Headroom(myElement);
// initialise
headroom.init(); 
