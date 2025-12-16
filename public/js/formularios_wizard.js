$(document).ready(function() {
        $('#wizard_constancia_ges').bootstrapWizard({
            withVisible: false,
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
            'firstSelector': '.button-first',
            'lastSelector': '.button-last'
        });

        $('#wizard_constancia_ges_2').bootstrapWizard({
            withVisible: false,
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
            'firstSelector': '.button-first',
            'lastSelector': '.button-last'
        });

        $('#enfermedades_declaracion_obligatoria').bootstrapWizard({
            withVisible: false,
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
            'firstSelector': '.button-first',
            'lastSelector': '.button-last'
        });

        $('#reembolso_gastos_medicos').bootstrapWizard({
            withVisible: false,
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
            'firstSelector': '.button-first',
            'lastSelector': '.button-last'
        }); 
        $('#reembolso_gastos_dentales').bootstrapWizard({
            withVisible: false,
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
            'firstSelector': '.button-first',
            'lastSelector': '.button-last'
        }); 
    });