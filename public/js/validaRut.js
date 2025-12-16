var Fn = {
	// Valida el rut con su cadena completa "XXXXXXXX-X"
	validaRut : function (rutCompleto) {
		rutCompleto = rutCompleto.replace("‐","-");
		if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
			return false;
		var tmp 	= rutCompleto.split('-');
		var digv	= tmp[1];
		var rut 	= tmp[0];
		if ( digv == 'K' ) digv = 'k' ;
		return (Fn.dv(rut) == digv );

	},
	dv : function(T){
		var M=0,S=1;
		for(;T;T=Math.floor(T/10))
			S=(S+T%10*(9-M++%6))%11;
		return S?S-1:'k';
	}
}


$("#rut_paciente_reserva").blur(function(){
	if (Fn.validaRut( $("#rut_paciente_reserva").val() )){
		$("#msgerror").html("El rut ingresado es válido :D");
	} else {
		 swal({
			title: "Ingrese un rut valido",
			icon: "error",
			buttons: "Aceptar",
			DangerMode: true,
		});
		$("#msgerror").html("El Rut no es válido :'( ");
	}
});
$("#rut_asistente").blur(function(){
	if (Fn.validaRut( $("#rut_asistente").val() )){
		$("#msgerror").html("El rut ingresado es válido :D");
        $('#button-addon2').prop('disabled',false);
	} else {
		 swal({
			title: "Ingrese un rut valido",
			icon: "error",
			buttons: "Aceptar",
			DangerMode: true,
		});
		$("#msgerror").html("El Rut no es válido :'( ");
        $('#button-addon2').prop('disabled',true);
	}
});
$("#rut_nuevo_profesional").blur(function(){
	if (Fn.validaRut( $("#rut_nuevo_profesional").val() )){
		$("#msgerror").html("El rut ingresado es válido :D");
	} else {
		 swal({
			title: "Ingrese un rut valido",
			icon: "error",
			buttons: "Aceptar",
			DangerMode: true,
		});
		$("#msgerror").html("El Rut no es válido :'( ");
	}
});
$("#agregar_profesional_int_rut").blur(function(){
	if (Fn.validaRut( $("#agregar_profesional_int_rut").val() )){
		$("#msgerror").html("El rut ingresado es válido :D");
	} else {
		 swal({
			title: "Ingrese un rut valido",
			icon: "error",
			buttons: "Aceptar",
			DangerMode: true,
		});
		$("#msgerror").html("El Rut no es válido :'( ");
	}
});

