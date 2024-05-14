import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

function imagePointer(smallImg){
    let fullImg = document.getElementById("product-img");
    fullImg.src=smallImg.src;
 }

// js for prouduct gallery 

var ProductImg = document.getElementById(product-img);
var smallImg = document.getElementById("small-img");

smallImg[0].onclick = function(){
   ProductImg.src=smallImg[0].src;
}