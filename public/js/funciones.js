// {{--  FORMATEO DE RUT busqueda paciente  --}}
function formatoRut(rut)
{
    var valor = rut.value.replace('.','');
    valor = valor.replace(/\-/g,'');
    valor = valor.replace(/\ /g,'');
    valor = valor.replace(/[qwertyuiopasdfghjlñzxcvbnmQWERTYUIOPASDFGHJLÑZXCVBNM]/g,'');
    valor = valor.replace(/[/,´.*'+¿?^$!¡=&%"#¨_:;`~°{}()|[\]\\]/g,'');

    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    rut.value = cuerpo + '-'+ dv

    if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

    suma = 0;
    multiplo = 2;

    for(i=1;i<=cuerpo.length;i++)
    {
        index = multiplo * valor.charAt(cuerpo.length - i);
        suma = suma + index;
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
    }

    dvEsperado = 11 - (suma % 11);
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;

    if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

    rut.setCustomValidity('');
}

$(document).ready(function () {
    $('.mask_telefono').mask('+56 Z0 0000 0000', {
        translation: {
            'Z': {
                pattern: /[29]/, // Acepta 2 o 9 como primer dígito del prefijo
                optional: false // Este dígito es obligatorio
            },
            '0': {
                pattern: /[0-9]/, // Acepta cualquier dígito
                optional: true // Hace que el segundo dígito sea opcional
            }
        },
        placeholder: '+56 _ ____ ____', // Placeholder para guiar al usuario
        clearIfNotMatch: true // Limpiar el campo si no coincide con la máscara
    });
});
