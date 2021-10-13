const warning    =document.querySelector('.alerta1');
const error      =document.querySelector('.alerta2');
const capa2      =document.querySelector('.capa2');
const formulario =document.querySelector('#form');
const inputs     =document.querySelectorAll('#form input');
const pcont      =document.querySelector('.contenido');
const pcont2     =document.querySelector('.contenido2');
const ptext      =['El nombre no existe, asegurate de no colocar simbolos raros','El apellido no existe, asegurate de no colocar simbolos raros','Aun no tienes la edad suficiente,debes tenr apartir de 10 años', 'El nombre de usuario debe tener minimo de 4 a 20 caracteres'];
const ptext2     =['La fecha no es valida', 'El correo no es valido','la contraseña debe tener de 8 a 16 caracteres y debe coincidir con ña confirmacion de la contraseña'];
const exprecion  ={
    nombre     : /^[a-zA-ZÁ-ÿ\s]{2,20}$/,
    apellido   : /^[a-zA-ZÁ-ÿ\s]{2,30}$/,
    edad       : /^[0-9]{2,3}$/,
    fecha      : /^[0-9-]{10}$/,
    usuario    : /^[a-zA-ZÁ-ÿ0-9\s._-]{4,20}/,
    correo     : /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/,
    contraseña : /^\w{8,16}$/
}
function adv(x,y) {
    x.style.display='block';
    y.style.display='block';
}

formulario.addEventListener('submit', (e)=>{
    let noEnviar = false; // Para validar si el formulario sera enviado o no dependiendo de que se cumplan todas las valifaciones de los campos

    if (exprecion.nombre.test(inputs[0].value)==false) {
        noEnviar = true;
        if(registro.style.display='block'){
            adv(capa2,warning);
            pcont.innerHTML=ptext[0];
        }
    } else if (exprecion.apellido.test(inputs[1].value)==false) {
        noEnviar = true;
        if(registro.style.display='block'){
            adv(capa2,warning);
            pcont.innerHTML=ptext[1];
        }
    } else if (exprecion.edad.test(inputs[2].value)==false) {
        noEnviar = true;
        if(registro.style.display='block'){
            adv(capa2,warning);
            pcont.innerHTML=ptext[2];
        }
    } else if (exprecion.fecha.test(inputs[3].value)==false) {
        noEnviar = true;
        if(registro.style.display='block'){
            adv(capa2,error);
            pcont2.innerHTML=ptext2[0];
        }
    } else if (exprecion.usuario.test(inputs[4].value)==false) {
        noEnviar = true;
        if(registro.style.display='block'){
            adv(capa2,warning);
            pcont.innerHTML=ptext[3];
        }
    } else if (exprecion.correo.test(inputs[5].value)==false) {
        noEnviar = true;
        if(registro.style.display='block'){
            adv(capa2,error);
            pcont2.innerHTML=ptext2[1];
        }
    } else if (exprecion.contraseña.test(inputs[6].value)==false) {
        noEnviar = true;
        if(registro.style.display='block' && inputs[6].value!==inputs[7].value){
            adv(capa2,error);
            pcont2.innerHTML=ptext2[2];
        }
    }  else if (exprecion.contraseña.test(inputs[6].value)==false) {
        if (registro.style.display='block' && inputs[7].value!==inputs[6].value) {
            noEnviar = true;
            adv(capa2,error);
            pcont2.innerHTML=ptext2[2];
        }
    }
    // si una de las validaciones del formulario no se cumple el formulario no se envia, de lo contrario los datos son enviados al back.
    if (noEnviar) {
        e.preventDefault();
    }
});
