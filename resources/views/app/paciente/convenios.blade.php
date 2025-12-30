@extends('template.usuario.template')

@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                    <a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                            <li class="breadcrumb-item">
                                <a href="#">Mis convenios de atención</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-b-30">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="text-white f-20 mt-2">Formulario temporal de convenio</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('paciente.convenios.guardar') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Número convenio</label>
                                    <input type="number" class="form-control form-control-sm" name="numero_convenio" value="{{ old('numero_convenio') }}" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Tipo convenio (ID)</label>
                                    <input type="number" class="form-control form-control-sm" name="id_tipo_convenio" value="{{ old('id_tipo_convenio') }}" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Tipo producto (ID)</label>
                                    <input type="number" class="form-control form-control-sm" name="id_tipo_producto_" value="{{ old('id_tipo_producto_') }}" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="number" step="0.01" class="form-control form-control-sm" name="descuento" value="{{ old('descuento') }}" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Tipo cobro (ID)</label>
                                    <input type="number" class="form-control form-control-sm" name="id_tipo_cobro" value="{{ old('id_tipo_cobro') }}" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Tipo pago (ID)</label>
                                    <input type="number" class="form-control form-control-sm" name="id_tipo_pago" value="{{ old('id_tipo_pago') }}" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="floating-label-activo-sm">Condiciones</label>
                                    <input type="text" class="form-control form-control-sm" name="condiciones" value="{{ old('condiciones') }}" required>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-info"><i class="feather icon-save"></i> Guardar convenio</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
