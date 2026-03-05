 /* Formularios generales */
 	/* Formularios generales */
 		/* Formulario certificado de reposo */
		$('#formularios_atencion').on('click', ".accion_modal_certificado_reposo", function () {
			console.log("abrir modal accion_modal_certificado_reposo");
			$('#m_reposo.php').modal();
		});

		/* Formulario de interconsulta */
		$('#formularios_atencion').on('click', ".accion_modal_interconsulta", function () {
			console.log("abrir modal accion_modal_interconsulta");
			$('#m_interconsulta.php').modal();
		});

		/* Formulario de informe médico */
$('#formularios_atencion').on('click', ".accion_modal_informe", function () {
	console.log("abrir modal accion_modal_informe");
			$('#m_infmedico.php').modal();
		});

		/* Formulario de uso personal */
		$('#formularios_atencion').on('click', ".accion_modal_uso_personal", function () {
			console.log("abrir modal accion_modal_uso_personal");
			$('#modal_up.php').modal();
		});
		$('#formularios_atencion').on('click', ".accion_modal_cid", function () {
			console.log("abrir modal accion_modal_cid");
			$('#modal_cid').modal();
		});
	/* Formularios de notificacion */
 		/* Constancia GES */
 		$('#formularios_atencion').on('click', ".accion_modal_constancia_ges", function () {
		    console.log("abrir modal accion_modal_constancia_ges");
		    $('#m_ges.php').modal();
		});
 		/* Enfermedades enfermedades_declaracion obligatoria */
 		$('#formularios_atencion').on('click', ".accion_modal_enfermedades_declaracion_obligatoria", function () {
		    console.log("abrir modal accion_modal_enfermedades_declaracion_obligatoria");
		    $('#m_eno.php').modal();
		});
 		/* Reembolso Médico */
 		$('#formularios_atencion').on('click', ".accion_modal_reembolso_medico", function () {
		    console.log("abrir modal accion_modal_reembolso_medico");
		    $('#modal_reembolso_medico').modal();
		});
 		/* Reembolso dentales */
 		$('#formularios_atencion').on('click', ".accion_modal_reembolso_dental", function () {
		    console.log("abrir modal accion_modal_reembolso_dental");
		    $('#modal_reembolso_dental').modal();
		});

	/* Consentimientos informados */
 		/* Anestesia */
            $('#formularios_dentales').on('click', ".accion_modal_anestesia", function () {
		    console.log("abrir modal accion_modal_anestesia");
		    $('#modal_anestesia').modal();
			});
		/* consentimiento */
            $('#formularios_dentales').on('click', ".accion_m_aconsentcir", function () {
	        console.log("abrir modal accion_m_aconsentcir");
			$('#m_aconsentcir').modal();
			});
			$('#formularios_dentales').on('click', ".accion_m_aconsentcirm", function () {
				console.log("abrir modal accion_m_aconsentcirm");
				$('#m_aconsentcirm').modal();
			});
		/* Ordenes de Trabajo */
			/* orden trabajo menor */
            $('#formularios_dentales').on('click', ".accion_modal_orden_trabajo", function () {
			console.log("abrir modal accion_modal_orden_trabajo");
			$('#modal_orden_trabajo').modal();
			});
			/* orden trabajo etiquetado y control */
			$('#formularios_dentales').on('click', ".accion_modal_control_trabajo", function () {
				console.log("abrir modal accion_modal_control_trabajo");
				$('#modal_control_trabajo').modal();
			});
           /* orden trabajo mayor */
            $('#formularios_dentales').on('click', ".accion_modal_orden_trabajoM", function () {
			console.log("abrir modal accion_modal_orden_trabajoM");
			$('#modal_orden_trabajoM').modal();
			});
		/* Pedido de insumos y materiales */
			/* Pedido de insumos */
            $('#formularios_dentales').on('click', ".accion_modal_pedido_insumos", function () {
			console.log("abrir modal accion_modal_pedido_insumos");
			$('#modal_pedido_insumos').modal();
			});
			/* Pedido de materiales */
            $('#formularios_dentales').on('click', ".accion_modal_pedido_materiales", function () {
			console.log("abrir modal accion_modal_pedido_materiales");
			$('#modal_pedido_materiales').modal();
			});
		/* Pedido de examenes dentales */
			/* Pedido de biopsia */
            $('#formularios_dentales').on('click', ".accion_modal_examenbiopsia", function () {
			console.log("abrir modal accion_modal_examenbiopsia");
			$('#modal_examenbiopsia').modal();
			});
			/* Pedido de radiografias */
            $('#formularios_dentales').on('click', ".accion_modal_examenradiologico", function () {
			console.log("abrir modal accion_modal_examenradiologico");
			$('#modal_examenradiologico').modal();
			});
			$('#form_derperi').on('click', ".accion_modal_interconsulta_period", function () {
	        console.log("abrir modal accion_modal_interconsulta_period");
		    $('#modal_interconsulta_period').modal();
			});
			/* Gastos materiales en consulta */
			$('#formularios_dentales').on('click', ".accion_modal_gastosmaterial_gen", function () {
			console.log("abrir modal .accion_modal_gastosmaterial_gen");
			$('#modal_gastosmaterial_gen').modal();
			});

		/* Modal pagos responsable*/
			function respon_pago_dent (){
	            $('#m_resp_pagodental').modal('show');
	        }

        /* Modal evaluación adulto*/
        	/* Maxilar superior*/
        	function maxilar_superior (){
	            $('#tratamiento_maxilar_superior').modal('show');
	        }

        	/* Maxilar superior*/
        	function maxilar_inferior (){
	            $('#tratamiento_maxilar_inferior').modal('show');
	        }
        	/* Boca completa*/
        	function boca_completa (){
	            $('#tratamiento_boca_completa').modal('show');
	        }

			/* Modal evaluación pediatrica*/
			/* Maxilar superior*/
			function maxilar_superior_inf() {
				$('#tratamiento_maxilar_superiorinf').modal('show');
			}

			/* Maxilar superior*/
			function maxilar_inferior_inf() {
				$('#tratamiento_maxilar_inferiorinf').modal('show');
			}
			/* Boca completa*/
			function boca_completa_inf() {
				$('#tratamiento_boca_completainf').modal('show');
			}
		/* Indicar medicamento y examen*/
        	function i_examen(){
	            $('#indicar_examen').modal('show');
	        }


	    /* derivacion a tratamiento */

            function d_deriv_tto(){
				$('#derivacion_a_tratamiento').modal('show');
	        }
			/* Periodontograma */

            function d_periodoncista() {
				$('#modal_interconsulta_period').modal('show');
			}
			function d_periodoncista1() {
				$('#modal_inter_periodoncista').modal('show');
			}
	    /* Presupuesto */
	        function presupuesto(){
	            $('#modal_presupuesto').modal('show');
            }

		/* Presupuesto Ortodoncia */
            function presupuesto_orto() {
				$('#modal_presup_ortodoncico').modal('show');

			}
	     /* Odontograma */
	        // function info_odontograma(pieza){
            //     console.log(pieza);
            //     let url ="{{ route('odontograma.show', 'pieza') }}";
            //     url = url.replace('pieza', pieza);
            //     console.log(url);
	        //     $('#modal_odontograma').modal('show');
	        // }
		 /* info antecedentes*/
			function info_info1() {
				$('#modal_info1').modal('show');
			}
			function info_info2() {
				$('#modal_info2').modal('show');
			}
			function info_info3() {
				$('#modal_info3').modal('show');
			}
		/* agregar proveedores*/
			function agregar_proveedor() {
				$('#agregar_proveedor').modal('show');
			}

			function editar_proveedor() {
				$('#editar_proveedor').modal('show');
			}

			function productos_proveedor() {
				$('#productos_proveedor').modal('show');
			}

	/* Antecedentes dentales*/
	function anestesia_local() {
		$('#anestesia_local_modal').modal('show');
	}

	function hemorragias() {
		$('#hemorragias_modal').modal('show');
	}

	function fracturas() {
		$('#fracturas_modal').modal('show');
	}

	/* Modal cargar presupuesto*/
	function añadir_presupuesto() {
			$('#presupuesto_dental_modal').modal('show');
		}

	/* Modal trabajo en laboratorio*/
		function prest_lab() {
				$('#prest_lab_modal').modal('show');
			}

	/* Modal trabajo en laboratorio*/
	function derv_inter() {
		$('#derivacion_a_tratamiento').modal('show');
	}

	/* Carnet de alta*/
	function carnet_alta() {
		$('#carnet_alta_modal').modal('show');
	}

	/* Interconsulta*/
	function m_inter() {
		$('#modal_interconsulta').modal('show');
	}

	/* Biopsia */
	function m_biopsia() {
		$('#biopsia_modal').modal('show');
	}




        $('#table_tto_boca_gral').DataTable();

        $('#tratamiento_presupuesto').DataTable();

		$('#table_piezas_presupuesto_period').DataTable

        $('#table_trabajos_presupuesto').DataTable({
            responsive:'true'
        });
        $('#presup_estado_pago').DataTable();

        $('#presup_estado_pago_gral').DataTable();

        $('#presup_insumos_pago').DataTable({
            responsive: 'true'
        });

        $('#table_pedido_insumos_materiales').DataTable({
            responsive: 'true'
        });

        $('#table_profesionales_tons').DataTable({
            responsive: 'true'
        });

		$('#table_piezas_presupuesto_period').DataTable();

		 $('#table_trabajos_menores_dental').DataTable();
            $('#table_trabajos_mayores_dental').DataTable();
            $('#table_piezas_presupuesto_odonto').DataTable();
			$('#table_insumos_odon_gral').DataTable();

				$('#table_odontograma').DataTable();
			$('#table_insumos_period').DataTable();
			$('#table_antecedentes_unificadas').DataTable();

		const piezasSelect = $('#paciente_piezas_dentales_ex');

        // // Inicializar Select2
        // piezasSelect.select2();

        // Control de selección de piezas en el odontograma
        $('.pieza').on('click', function () {
            const piezaNumero = $(this).data('pieza').toString(); // Convertir a string por seguridad

            if ($(this).hasClass('seleccionada')) {
                // Si ya está seleccionada, deseleccionarla
                $(this).removeClass('seleccionada');
                const options = piezasSelect.val().filter(item => item !== piezaNumero); // Filtra el elemento a eliminar
                piezasSelect.val(options).trigger('change');
            } else {
                // Si no está seleccionada, agregarla
                $(this).addClass('seleccionada');

                let opcionesSeleccionadas = piezasSelect.val() || [];
                if (!opcionesSeleccionadas.includes(piezaNumero)) {
                    opcionesSeleccionadas.push(piezaNumero);
                }

                piezasSelect.val(opcionesSeleccionadas).trigger('change');
            }
        });
		
		const piezasSelect_ = $('#paciente_piezas_dentales_urg');
		// Control de selección de piezas en el odontograma
		$('.pieza_urg').on('click', function() {
			const piezaNumero = $(this).data('pieza_urg')
		.toString(); // Convertir a string por seguridad

			if ($(this).hasClass('seleccionada')) {
				// Si ya está seleccionada, deseleccionarla
				$(this).removeClass('seleccionada');
				const options = piezasSelect_.val().filter(item => item !==
				piezaNumero); // Filtra el elemento a eliminar
				piezasSelect_.val(options).trigger('change');
			} else {
				// Si no está seleccionada, agregarla
				$(this).addClass('seleccionada');

				let opcionesSeleccionadas = piezasSelect_.val() || [];
				if (!opcionesSeleccionadas.includes(piezaNumero)) {
					opcionesSeleccionadas.push(piezaNumero);
				}

				piezasSelect_.val(opcionesSeleccionadas).trigger('change');
			}
		});

        const piezasSelect_odontop = $('#paciente_piezas_dentales_ex_odped_urg');
            // Control de selección de piezas en el odontograma
            $('.pieza_odped_urg').on('click', function() {
                const piezaNumero = $(this).data('pieza_odpediat_urg')
            .toString(); // Convertir a string por seguridad

                if ($(this).hasClass('seleccionada')) {
                    // Si ya está seleccionada, deseleccionarla
                    $(this).removeClass('seleccionada');
                    const options = piezasSelect_odontop.val().filter(item => item !==
                    piezaNumero); // Filtra el elemento a eliminar
                    piezasSelect_odontop.val(options).trigger('change');
                } else {
                    // Si no está seleccionada, agregarla
                    $(this).addClass('seleccionada');

                    let opcionesSeleccionadas = piezasSelect_odontop.val() || [];
                    if (!opcionesSeleccionadas.includes(piezaNumero)) {
                        opcionesSeleccionadas.push(piezaNumero);
                    }

                    piezasSelect_odontop.val(opcionesSeleccionadas).trigger('change');
                }
            });
    
		const piezasSelect_period = $('#paciente_piezas_dentales_ex_period');


        // Control de selección de piezas en el odontograma
        $('.pieza_periodoncia').on('click', function () {
            const piezaNumero = $(this).data('pieza_period').toString(); // Convertir a string por seguridad

            if ($(this).hasClass('seleccionada')) {
                // Si ya está seleccionada, deseleccionarla
                $(this).removeClass('seleccionada');
                const options = piezasSelect_period.val().filter(item => item !== piezaNumero); // Filtra el elemento a eliminar
                piezasSelect_period.val(options).trigger('change');
            } else {
                // Si no está seleccionada, agregarla
                $(this).addClass('seleccionada');

                let opcionesSeleccionadas = piezasSelect_period.val() || [];
                if (!opcionesSeleccionadas.includes(piezaNumero)) {
                    opcionesSeleccionadas.push(piezaNumero);
                }

                piezasSelect_period.val(opcionesSeleccionadas).trigger('change');
            }
        });

		   function seleccionar_maxilar_superior_period() {
				const superiorActivo = document.getElementById("max_sup_period").checked;
				document.getElementById('piezas_presup_period').checked = false;
				const piezas = document.querySelectorAll('.pieza_periodoncia');
				const select = $('#paciente_piezas_dentales_ex_period');

				piezas.forEach(pieza => {
					const codigo = pieza.getAttribute('data-pieza_period');

					if (codigo.startsWith('1.') || codigo.startsWith('2.')) {
						if (superiorActivo) {
							pieza.classList.add('seleccionada');

							// Selecciona en el Select2 si existe la opción
							if (select.find("option[value='" + codigo + "']").length > 0) {
								select.find("option[value='" + codigo + "']").prop("selected", true);
							}
						} else {
							pieza.classList.remove('seleccionada');

							// Deselecciona en el Select2
							if (select.find("option[value='" + codigo + "']").length > 0) {
								select.find("option[value='" + codigo + "']").prop("selected", false);
							}
						}
					}
				});

				// Refresca el select2 para que se vea reflejado el cambio
				select.trigger('change');
			}
    function seleccionar_maxilar_inferior_period(){
        const inferiorActivo = document.getElementById("max_inf_period").checked;
        document.getElementById('piezas_presup_period').checked = false;
        const piezas = document.querySelectorAll('.pieza_periodoncia');
        const select = $('#paciente_piezas_dentales_ex_period');

        piezas.forEach(pieza => {
            const codigo = pieza.getAttribute('data-pieza_period');

            if (codigo.startsWith('3.') || codigo.startsWith('4.')) {
                if (inferiorActivo) {
                    pieza.classList.add('seleccionada');

                    // Selecciona en el Select2 si existe la opción
                    if (select.find("option[value='" + codigo + "']").length > 0) {
                        select.find("option[value='" + codigo + "']").prop("selected", true);
                    }
                } else {
                    pieza.classList.remove('seleccionada');

                    // Deselecciona en el Select2
                    if (select.find("option[value='" + codigo + "']").length > 0) {
                        select.find("option[value='" + codigo + "']").prop("selected", false);
                    }
                }
            }
        });

        // Refresca el select2 para que se vea reflejado el cambio
        select.trigger('change');
    }

		

		


