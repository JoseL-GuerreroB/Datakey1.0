const ico=document.querySelector('#ico');
const navegacion=document.querySelector('.nav');
// navegacion responcive
if(window.innerWidth<=1140){
    ico.addEventListener('click',()=>{
    navegacion.classList.toggle('nave');
});
}else{
    navegacion.classList.toggle('nave');
}
