$(document).ready(function() {
	$( "#dialog1" ).dialog({
		autoOpen: false,
		show: "blind",
		hide: "explode",
		modal: true,
		resizable: false,
		position: { my: "center", at: "center", of: "#cuerpo" }
	});
	$(".divform").addClass("ancho");
	$(".divform label").addClass("ancho1");
	$(".divres").addClass("anchores");
	$(".divres label").addClass("anchores1");
	$("#mandos").draggable({
		snap: ".pegar",
		cursor: "move",
		snapTolerance: 10,
		handle: "#egd",
		stack: ".pestana"
	});
	if ($("#contenedor1").length > 0) {
		$("#contenedor1").hide();
		$("#contenedor").addClass("bordebajo");
		$("#aviso").addClass("active");
		$("div.aviso").css("display", "block");
		$("div.formula").css("display", "none");
		$("div.enlaces").css("display", "none");
		$("div.acerca").css("display", "none");
		$("div.creditos").css("display", "none");
		$(".menu > li").click(function(e){  
			switch(e.target.id){  
				case "aviso":  
					//change status &amp;amp;amp; style menu  
					$("#aviso").addClass("active");
					$("#formula").removeClass("active");
					$("#enlaces").removeClass("active");
					$("#acerca").removeClass("active"); 
					$("#creditos").removeClass("active");  
					//display selected division, hide others  
					//$("div.news").fadeIn();
					$("div.aviso").css("display", "block");
					$("div.formula").css("display", "none");
					$("div.enlaces").css("display", "none");
					$("div.acerca").css("display", "none");
					$("div.creditos").css("display", "none");  
				break;
				case "formula":  
					//change status &amp;amp;amp; style menu  
					$("#formula").addClass("active");
					$("#aviso").removeClass("active");
					$("#enlaces").removeClass("active");
					$("#acerca").removeClass("active");
					$("#creditos").removeClass("active");  
					//display selected division, hide others  
					//$("div.news").fadeIn();
					$("div.formula").css("display", "block");
					$("div.aviso").css("display", "none");
					$("div.enlaces").css("display", "none");
					$("div.acerca").css("display", "none");
					$("div.creditos").css("display", "none");  
				break;
				case "enlaces":  
					//change status &amp;amp;amp; style menu
					$("#aviso").removeClass("active");
					$("#formula").removeClass("active");
					$("#enlaces").addClass("active");
					$("#acerca").removeClass("active");
					$("#creditos").removeClass("active");  
					//display selected division, hide others  
					//$("div.tutorials").fadeIn();
					$("div.enlaces").css("display", "block");
					$("div.aviso").css("display", "none");
					$("div.formula").css("display", "none");
					$("div.acerca").css("display", "none");
					$("div.creditos").css("display", "none");  
				break;
				case "acerca":  
					//change status &amp;amp;amp; style menu
					$("#aviso").removeClass("active");
					$("#formula").removeClass("active");
					$("#enlaces").removeClass("active");
					$("#acerca").addClass("active");
					$("#creditos").removeClass("active");  
					//display selected division, hide others  
					//$("div.tutorials").fadeIn();
					$("div.acerca").css("display", "block");
					$("div.aviso").css("display", "none");
					$("div.formula").css("display", "none");
					$("div.enlaces").css("display", "none");
					$("div.creditos").css("display", "none");  
				break;
			
			}  
			//alert(e.target.id);  
			return false;  
		});
	}
	else {
		$("#contenedor").addClass("bordebajo");
	}
});

function masInfo() {
	if ($("#contenedor1").length > 0) {
		$("#contenedor1").toggle(100, function() {
			if ($("#contenedor1").is(":hidden")) {
				$("#contenedor").addClass("bordebajo");
			}
			else {
				$("#contenedor").removeClass("bordebajo");
			}
		});
	}
}

function calcular() {
	varfreccar = document.forms[0].FrecCar.value;
	varesfures = document.forms[0].EsfuRes.value;
	vartonomus = document.forms[0].TonoMus.value;
	varrespson = document.forms[0].RespSon.value;
	varcolopie = document.forms[0].ColoPie.value;
	if (varfreccar == "nada" || varesfures == "nada" || vartonomus == "nada" || varrespson == "nada" || varcolopie == "nada") {
		$( "#dialog1" ).dialog( "open" );
		document.forms[0].FrecCar.focus();
	}
	else {
		switch (varfreccar) {
			case "ausente":
				varfc = 0;
				break;
			case "menos":
				varfc = 1;
				break;
			case "mas":
				varfc = 2;
				break;
		}
		switch (varesfures) {
			case "ausente":
				varer = 0;
				break;
			case "menos":
				varer = 1;
				break;
			case "mas":
				varer = 2;
				break;
		}
		switch (vartonomus) {
			case "ausente":
				vartm = 0;
				break;
			case "menos":
				vartm = 1;
				break;
			case "mas":
				vartm = 2;
				break;
		}
		switch (varrespson) {
			case "ausente":
				varrs = 0;
				break;
			case "menos":
				varrs = 1;
				break;
			case "mas":
				varrs = 2;
				break;
		}
		switch (varcolopie) {
			case "ausente":
				varcp = 0;
				break;
			case "menos":
				varcp = 1;
				break;
			case "mas":
				varcp = 2;
				break;
		}
		vartotal = varfc+varer+vartm+varrs+varcp;
		document.forms[0].resultado.value = vartotal;
		if (vartotal <= 3) {
			document.forms[0].resultado1.value = "Recien nacido gravemente deprimido";
		}
		else {
			if (vartotal <= 5) {
				document.forms[0].resultado1.value = "Recien nacido deprimido";
			}
			else {
				if (vartotal <= 7) {
					document.forms[0].resultado1.value = "Recien nacido levemente deprimido";
				}
				else {
					document.forms[0].resultado1.value = "Recien nacido normal";
				}
			}
		}
	}
}

function borrar() {
	document.forms[0].FrecCar.value = "nada";
	document.forms[0].EsfuRes.value = "nada";
	document.forms[0].TonoMus.value = "nada";
	document.forms[0].RespSon.value = "nada";
	document.forms[0].ColoPie.value = "nada";
	document.forms[0].resultado.value = "";
	document.forms[0].resultado1.value = "";
}