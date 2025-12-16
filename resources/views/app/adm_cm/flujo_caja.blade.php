@extends('template.adm_cm.template')

@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Recepción Cierre Caja</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('adm_cm.area_comercial') }}" data-toggle="tooltip" data-placement="top" title="Volver a escritorio Comercial">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Flujo de Caja</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                {{-- botones --}}
                                <div class="col-md-12 mt-md-2">
                                    <ul class="nav nav-tabs justify-content-left" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="btn btn-outline-info btn-sm mb-2 mx-2 active" id="rendicion_rendicion-tab" data-toggle="tab" href="#rendicion_rendicion" role="tab" aria-controls="rendicion_rendicion" aria-selected="true">Cierre de Caja Diaria</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="btn btn-outline-info btn-sm mb-2 mx-2" id="rendicion_cierre_caja-tab" data-toggle="tab" href="#rendicion_cierre_caja" role="tab" aria-controls="rendicion_cierre_caja" aria-selected="false" onclick="cargar_registros_cierre();">Cierres Recibidos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="btn btn-outline-info btn-sm mb-2 mx-2" id="rendicion_cierre_caja-tab" data-toggle="tab" href="#rendicion_cierre_caja" role="tab" aria-controls="rendicion_cierre_caja" aria-selected="false" onclick="cargar_historico_registros_cierre();">Historico de Cierres</a>
                                        </li>
                                    </ul>
                                </div>
                                {{-- secciones --}}
                                <div class="col-sm-12 col-md-12">
                                    <div class="tab-content" id="rendicion_caja">
                                        {{-- PESTAÑA REALIZAR CIERRE DE CAJA - VER RENDICIONES RECIBIDAS --}}
                                        <div class="tab-pane fade show active " role="tabpanel" aria-labelledby="pills-profile-tab" id="rendicion_rendicion">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18 pt-1">Cierres de Cajas {{ date('d-m-Y') }}</h5>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <input type="hidden" name="lista_rendiciones" id="lista_rendiciones" value="{{ $lista_rendiciones }}">
                                                <input type="hidden" name="total_rendiciones" id="total_rendiciones" value="{{ $total_rendiciones }}">
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Número de Bonos</label>
                                                        <input type="number" class="form-control form-control-sm" id="numero_bonos_rendiciones" name="numero_bonos_rendiciones" value="{{ $total_bonos_rendiciones  }}" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Efectivo</label>
                                                        <input type="number" class="form-control form-control-sm" id="efectivo_rendiciones" name="efectivo_rendiciones" value="{{ $total_efectivo_rendicion  }}" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Otros</label>
                                                        <input type="number" class="form-control form-control-sm" id="otros_rendiciones" name="otros_rendiciones" value="{{ $total_otros_rendicion  }}" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Total Documentos</label>
                                                        <input type="number" class="form-control form-control-sm" id="total_documentos_rendiciones" name="total_documentos_rendiciones" value="{{ $total_documentos_rendiciones  }}" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Recibe Caja :</label>
                                                        <select name="id_asistente_receptor_rendiciones" id="id_asistente_receptor_rendiciones" class="form-control form-control-sm">
                                                            @if($listado_recibe)
                                                                @foreach ( $listado_recibe as $recibe )
                                                                    <option value="{{ $recibe->id }}">{{ strtoupper($recibe->nombres.' '.$recibe->apellido_uno.' '.$recibe->apellido_dos) }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 text-center">
                                                    <button class="btn btn-block btn-sm btn-info" onclick="rendir_cierre();" id="btn_rendicion_cierre_dia">Cierres de Cajas</button>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <table id="tabla_rendir_rendiciones" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center align-middle">ID REND</th>
                                                                <th class="text-center align-middle">Asistente</th>
                                                                <th class="text-center align-middle">Receptor</th>
                                                                <th class="text-center align-middle">F/Recepción</th>
                                                                <th class="text-center align-middle">Bonos</th>
                                                                <th class="text-center align-middle">Efectivo</th>
                                                                <th class="text-center align-middle">Otros</th>
                                                                <th class="text-center align-middle">T. Doc.</th>
                                                                <th class="text-center align-middle">T. Doc Adj.</th>
                                                                <th class="text-center align-middle">Detalle</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if( isset($rendiciones) )
                                                                @foreach($rendiciones as $key_r => $value_r)
                                                                    <tr>
                                                                        <td class="align-middle text-center">{{ $value_r->id }}</td>
                                                                        <td class="align-middle text-center">
                                                                            <span>{{ $value_r->Asistente()->first()->nombres }} {{ $value_r->Asistente()->first()->apellido_uno }} {{ $value_r->Asistente()->first()->apellido_dos }}</span><br>
                                                                            <span>{{ $value_r->Asistente()->first()->rut }}</span>
                                                                        </td>
                                                                        <td class="align-middle text-center">
                                                                            <span>{{ $value_r->AsistenteReceptor()->first()->nombres }} {{ $value_r->AsistenteReceptor()->first()->apellido_uno }} {{ $value_r->AsistenteReceptor()->first()->apellido_dos }}</span><br>
                                                                            <span>{{ $value_r->AsistenteReceptor()->first()->rut }}</span>
                                                                        </td>
                                                                        <td class="align-middle text-center">{{ $value_r->fecha_rendicion }}</td>
                                                                        <td class="align-middle text-center">{{ $value_r->total_bono }}</td>
                                                                        <td class="align-middle text-center">${{ number_format($value_r->total_efectivo, 0, ",", ".") }}</td>
                                                                        <td class="align-middle text-center">{{ $value_r->total_otros }}</td>
                                                                        <td class="align-middle text-center">{{ $value_r->total_documentos }}</td>
                                                                        <td class="align-middle text-center">
                                                                            <div>
                                                                                <button  class="btn btn-block btn-sm btn-info" onclick="ver_archivos('{{ $value_r->id }}');">Ver</button>
                                                                                <div style=" background-color: red; border-radius: 90px; width: 25px; height: 25px; padding: 5px; color: white; font-weight: bold; position: relative; top: -40px;">{{ $value_r->cantidad_archivos }}</div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="align-middle text-center"><button  class="btn btn-block btn-sm btn-info" onclick="ver_datalle_rendicion('{{ $value_r->id }}');">Ver</button></td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- PESTAÑA CIERRE DE CAJAS DIARIAS --}}
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        </div>

                                        {{-- PESTAÑA DE HISTORICO CIERR DE CAJAS --}}
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Cierre: Container Completo-->
@endsection

@section('page-script')
    <script>


    </script>

@endsection

