$(document).ready(function () {
    $('.carousel').carousel({
        interval: 3000
    });
    AOS.init();	
    carga_especialidad();
});

function carga_especialidad()
{
    var api = new Api('profesional', 'especialidad');
    var datos = {};
    datos.id_institucion = $('#id_institucion').val();
    datos.debug = 'true';

    api.request(datos,
        function (resp) {
            if(resp.estado == 1)
            {
                let select = $('#id_especialidad');
                select.find('option').remove();
                select.append('<option value="">Seleccionar</option>');
                $(resp.registros).each(function(i, v) { 
                    select.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                });
            }
            else
            {
                let select = $('#id_especialidad');
                select.find('option').remove();
                select.append('<option value="">Seleccionar</option>');
            }
        },
        function (resp) {

        },
        'GET'
    );

}

function carga_tipo_especialidad()
{
    var api = new Api('profesional', 'tipo_especialidad');
    var datos = {};

    datos.id_institucion = $('#id_institucion').val();
    datos.id_especialidad = $('#id_especialidad').val();

    api.request(datos,
        function (resp) {
            if(resp.estado == 1)
            {
                let select = $('#id_tipo_especialidad');
                select.find('option').remove();
                select.append('<option value="">Seleccionar</option>');
                $(resp.registros).each(function(i, v) { 
                    select.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                });
            }
            else
            {
                let select = $('#id_tipo_especialidad');
                select.find('option').remove();
                select.append('<option value="">Seleccionar</option>');
            }
        },
        function (resp) {

        },
        'GET'
    );
}

function carga_sub_tipo_especialidad()
{
    var api = new Api('profesional', 'sub_tipo_especialidad');
    var datos = {};
    datos.id_institucion = $('#id_institucion').val();
    datos.id_tipo_especialidad = $('#id_tipo_especialidad').val();

    api.request(datos,
        function (resp) {
            if(resp.estado == 1)
            {
                let select = $('#id_sub_tipo_especialidad');
                select.find('option').remove();
                select.append('<option value="">Seleccionar</option>');
                $(resp.registros).each(function(i, v) { 
                    select.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                });
            }
            else
            {
                let select = $('#id_sub_tipo_especialidad');
                select.find('option').remove();
                select.append('<option value="">Seleccionar</option>');
            }
        },
        function (resp) {

        },
        'GET'
    );
}

function buscarProfesional()
{
    var api = new Api('profesional', 'buscador');
    var datos = {};

    datos.id_institucion = $('#id_institucion').val();
    datos.id_especialidad = $('#id_especialidad').val();
    if($('#id_tipo_especialidad').val()!='')
        datos.id_tipo_especialidad = $('#id_tipo_especialidad').val();
    if($('#id_sub_tipo_especialidad').val()!='')
        datos.id_sub_tipo_especialidad = $('#id_sub_tipo_especialidad').val();

    api.request(datos,
        function (resp) {
            
            let div_lista_prof = $('#lista_profesionales');
            div_lista_prof.find('div').remove();
            if(resp.estado == 1)
            {
                $(resp.registros).each(function(i, v) { 
                    var html = '';
                    html += '<div class="col-sm-12 col-md-6 col-lg-4">';
                    html += '    <div class="card border-0 my-2 shadow">';
                    html += '        <div class="card-body p-2">';
                    html += '            <div class="row">';
                    html += '                <div class="col-md-4 text-center d-inline align-self-center">';
                    if(v.img_profesional)
                        html += '                    <img src="'+v.img_profesional+'" class="img-fluid rounded-circle" width="90" alt="Dr. '+v.profesionales_nombre+' '+v.profesionales_apellido_uno+' '+v.profesionales_apellido_dos+'">';
                    else
                        html += '                    <img src="img/usuario.svg" class="img-fluid rounded-circle" width="90" alt="Dr. '+v.profesionales_nombre+' '+v.profesionales_apellido_uno+' '+v.profesionales_apellido_dos+'">';
                    html += '                </div>';
                    html += '                <div class="col-md-8 texto d-inline float-right">';
                    html += '                    <strong><span class="p-12">Dr. '+v.profesionales_nombre+' '+v.profesionales_apellido_uno+' '+v.profesionales_apellido_dos+'</span></strong><br>';
                    html += '                    <span class="text-secondary p-12"><strong>Rut:</strong><br>'+v.profesionales_rut+'</span><br>';
                    if(v.sub_tipo_especialidad_nombre != '')
                        html += '                    <span class="text-secondary p-12"><strong>Especialidad:</strong><br> '+v.sub_tipo_especialidad_nombre+'</span>';
                    else
                        html += '                    <span class="text-secondary p-12"><strong>Especialidad:</strong><br> '+v.tipos_especialidad_nombre+'</span>';
                    html += '                    <!--<button type="button" class="btn btn-primary btn-sm" onclick="ficha();">texto</button>-->';
                    html += '                </div>';
                    html += '            </div>';
                    html += '        </div>';
                    html += '    </div>';
                    html += '</div>';
                    div_lista_prof.append(html);
                });
            }
            else
            {
                div_lista_prof.append('<div><h4>No se encontraron profesionales de la Especialidad seleccionada.<br>Realize la busqueda de los Profesionales.</h4></div>');
            }
        },
        function (resp) {

        },
        'GET'
    );
}