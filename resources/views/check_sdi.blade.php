<!-- BASE -->
@extends('layouts.base')

<!-- STYLES -->
@section('page-styles')
<style>
    .color-azul{
        color: #4680ff;
    }
    .color-azul:hover{
        color: #4680ff;
    }
</style>    
@endsection

<!-- SCRIPT -->
@section('page-script')
    <!-- Tablas ficha médica única-->
    <script>
        $(document).ready(function(){
    checkToken();
});

function checkToken(){
    @php
    if(Auth::check()) 
    echo 'let url = "Check_sdi_token";';
    else
    echo 'let url = "Check_sdi_token_external";';
    @endphp
    var _token = $('input[name=_token]').val();    
    var token_ = $('#token_').val();   // TOKEN EXTERNO - URL EXTERNA  
    var token = '{{$token}}'; // TOKEN APP

    $.ajax({
        url: url,
        type: "GET",
        data: {
            _token: _token,
            token: token // TOKEN INTERNO - URL CON LOGIN AUTH
        },
        success: (resp)=>{
            if(resp.estado==1)
            {
                if(resp.registro.estado==1)
                {
                    if(token_ != '')
                    top.location.href=$('#url_nueva').val()+'/'+token_; // TOKEN PROFESIONAL PROVISORIO
                    else
                    {
                        if($('#url_nueva').val().indexOf("?") > -1)
							top.location.href=$('#url_nueva').val()+'&token='+token;  // TOKEN APP
                        else
							top.location.href=$('#url_nueva').val()+'?token='+token;  // TOKEN APP
                    }
                }else{
                    setTimeout(checkToken,3000);
                }
            }else{
                setTimeout(checkToken,3000);
            }
        },
        error: (resp)=>{
            console.warn(resp);
        }
    });
    

}
    </script>
    
@endsection

<!-- CONTENT -->
@section('content')
@csrf    
    <input type="hidden" id="token_" value="{{$token_}}">
    <input type="hidden" id="token" value="{{$token}}">
    <input type="hidden" id="url_nueva" value="{{$url_nueva}}">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header">
                       <h4>SOLICITUD SDI</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Se ha generado una solicitud de permiso a su aplicación</h5>
                        <p class="card-text">Debe ingresar a su aplicacion y validar el permiso.</p>
                        <p class="card-text">Fecha y hora para validar permiso: <span class="badge badge-primary">{{$fecha_termino}}</span></p>
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border text-primary mt-1 mb-3" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>                        
                        
                        @if(trim($token_)!='')
                        <a href="Check_sdi_external?id_recept={{$id_recept}}&urla={{$url_anterior}}&urln=/Acceso_Profesional_NI&tipo=8&token_={{$token_}}&evento=Profesional Provisorio&id_recept={{$id_recept}}" class="btn btn-info"><b>Volver a Solicitar</b></a>
                        @else
                        <a href="{{$url_nueva}}?token={{$token}}" class="btn btn-info"><b>Volver a Solicitar</b></a>
                        @endif
                        <a href="{{$url_anterior}}" class="btn btn-danger"><b>Cancelar Solicitud</b></a>
                        
                    </div>
                    <div class="card-footer text-muted badge badge-primary">
                        @php
                            echo 'Fecha y hora de la solicitud: '.date('Y-m-d H:i:s');                        
                        @endphp
                    </div>
                </div>
            </div>      
        </div>        
    </div>    


@endsection


