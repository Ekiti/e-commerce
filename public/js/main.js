function ele(selector){ return document.querySelectorAll(selector);};
var x = ele('menu nav a');
[].forEach.call(x, function(el) {
   el.addEventListener("click",function(e){
     var elems = document.querySelectorAll(".active");
     [].forEach.call(elems, function(e)
     { if(el !== e){ e.classList.remove("active");}});
     el.classList.add("active");
    });
   });

   var mobile = ele('#mobile-nav');
   var y = ele('.menu');
   [].forEach.call(mobile, function(nav){
    nav.addEventListener('click', function(x){
         x.preventDefault();
         nav.classList.toggle('open');
         [].forEach.call(y,function(u){
         u.classList.toggle('down');
        });
     });
});