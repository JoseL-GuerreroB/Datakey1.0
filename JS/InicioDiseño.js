const imagen =['/IMG/im1.jpg', '/IMG/im2.jpg', '/IMG/im3.jpg', '/IMG/im4.png', '/IMG/im5.png'];
const img=document.querySelector('.imagen');
const atras=document.querySelector('.fa-chevron-left');
const adelante=document.querySelector('.fa-chevron-right');
var posicion=0;
img.src=imagen[0];
atras.addEventListener('click',()=>{
    if (posicion>0) {
        img.src=imagen[posicion-1];
        posicion--;
    } else {
        img.src=imagen[imagen.length -1];
        posicion=imagen.length - 1;
    }
});
adelante.addEventListener('click',()=>{
    if (posicion<imagen.length-1) {
        img.src=imagen[posicion+1];
        posicion++;
    } else {
        img.src=imagen[0];
        posicion=0;
    }
});
//inicio y registro
const btnre=document.querySelector('.btnre');
const btnin=document.querySelector('.btnin');
const registro=document.querySelector('.registro');
const iniciar=document.querySelector('.iniciar');
const cerrar1= document.querySelector('#tache1');
const cerrar2= document.querySelector('#tache2');
const cerrar3= document.querySelector('#tache3');
const cerrar4= document.querySelector('#tache4');
const barrera= document.querySelector('.capa');
btnre.addEventListener("click",()=>{
    registro.style.display='block';
    barrera.style.display='block';
});
btnin.addEventListener("click",()=>{
    iniciar.style.display='block';
    barrera.style.display='block';
});
cerrar1.addEventListener("click",()=>{
    registro.style.display='none';
    barrera.style.display='none';
});
cerrar2.addEventListener("click",()=>{
    iniciar.style.display='none';
    barrera.style.display='none';
});
cerrar3.addEventListener("click",()=>{
    capa2.style.display='none';
    warning.style.display='none';
});
cerrar4.addEventListener("click",()=>{
    capa2.style.display='none';
    error.style.display='none';
});