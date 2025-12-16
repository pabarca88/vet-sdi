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
        //
    </script>
@endsection

<!-- CONTENT -->
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header">
                       <h4>Autorización Licencia</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Solicitud de Inicio de Licencia</h5>
                        <p class="card-text">{{ $mensaje }}</p>
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


