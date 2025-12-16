<div id="modal_enfermedades_declaracion_obligatoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_enfermedades_declaracion_obligatoria" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Enfermedades de declaración obligatoria E.N.O</h5>
                <button type="button" class="close text-white"  data-bs-dismiss="modal"aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="eno_id_ficha_atencion" id="eno_id_ficha_atencion" value=" @if (isset($fichaAtencion->id)) {{ $fichaAtencion->id }} @endif">
                <input type="hidden" name="eno_id_pacienter" id="eno_id_pacienter" value="{{ $paciente->id }}">
                <input type="hidden" name="eno_id_lugar_atencion" id="eno_id_lugar_atencion" value="{{ $lugar_atencion->id }}">

                <div class="bt-wizard" id="enfermedades_declaracion_obligatoria">
                    <ul class="nav nav-pills">
                        <li class="tab-wizard-formularios"><a href="#ident_establecimiento_eno" class="nav-link-wizard rounded-0" data-toggle="tab">Identificación del establecimiento</a></li>
                        <li class="tab-wizard-formularios"><a href="#ident_paciente_eno" class="nav-link-wizard rounded-0" data-toggle="tab">Identificación del paciente</a></li>
                        <li class="tab-wizard-formularios"><a href="#ident_clinica_paciente_eno" class="nav-link-wizard rounded-0" data-toggle="tab">Información clínica del paciente</a></li>
                        <li class="tab-wizard-formularios"><a href="#notificacion_eno" class="nav-link-wizard rounded-0" data-toggle="tab">Notificación</a></li>
                    </ul>
                    <div class="tab-content">
                        {{-- Identificación del establecimient --}}
                        <div class="tab-pane pt-4 active show" id="ident_establecimiento_eno">
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <h6 class="text-c-blue">Identificación del establecimiento</h6>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Nombre del establecimiento</label>
                                    <input type="text" class="form-control form-control-sm" name="eno_nombre_establecimiento" id="eno_nombre_establecimiento" value="{{ (!empty($institucion))?$institucion->nombre:$lugar_atencion->nombre }}" readonly>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Código del establecimiento</label>
                                    <input type="text" class="form-control form-control-sm" name="eno_codigo_establecimiento" id="eno_codigo_establecimiento" value="{{ (!empty($institucion))?$institucion->rut:$lugar_atencion->rut }}" readonly>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Nombre de oficina provincial</label>
                                    <input type="text" class="form-control form-control-sm" name="eno_nombre_oficina" id="eno_nombre_oficina" value="">
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Código de oficina provincial</label>
                                    <input type="text" class="form-control form-control-sm" name="eno_codigo_oficina" id="eno_codigo_oficina" value="">
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Nº de ficha clínica o código de control</label>
                                    <input type="text" class="form-control form-control-sm" name="numero_ficha_control" id="numero_ficha_control" value="{{ isset($fichaAtencion->id) ? $fichaAtencion->id : '' }}" readonly>
                                </div>
                            </div>
                        </div>

                        {{-- Identificación del Paciente --}}
                        <div class="tab-pane pt-4" id="ident_paciente_eno">
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <h6 class="text-c-blue">Identificación del Paciente</h6>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Rut</label>
                                    <input type="person" class="form-control form-control-sm" name="eno_rut_paciente" id="eno_rut_paciente" value="{{ $paciente->rut }}">
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Nombre completo</label>
                                    <input type="text" class="form-control form-control-sm" name="eno_nombre_paciente" id="eno_nombre_paciente" value="{{ $paciente->nombre . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Sexo</label>
                                    <input type="text" class="form-control form-control-sm" name="eno_sexo_paciente" id="eno_sexo_paciente" value="@if ($paciente->sexo == 'M') Masculino @else Femenino @endif">
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Nacimiento</label>
                                    <input type="date" class="form-control form-control-sm" name="eno_fecha_nacimiento" id="eno_fecha_nacimiento" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Dirección</label>

                                    <input type="address" class="form-control form-control-sm" name="eno_direccion_paciente" id="eno_direccion_paciente" value="{{(isset($direccion_paciente)?$direccion_paciente->direccion.' '.$direccion_paciente->numero_dir:'Sin registros Cargados').', ' .$direccion_txt_ciudad_paciente .', Región de ' .$direccion_id_region_paciente }}">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Correo electrónico</label>
                                    <input type="email" class="form-control form-control-sm" name="eno_email_paciente" id="eno_email_paciente" value="{{ $paciente->email }}">
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Teléfono</label>
                                    <input type="tel" class="form-control form-control-sm" name="eno_telefono_paciente" id="eno_telefono_paciente" value="{{ $paciente->telefono_uno }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Nacionalidad</label>
                                    <select class="form-control form-control-sm" name="eno_nacionalidad_paciente" id="eno_nacionalidad_paciente" onchange="cargar_codigo('eno_nacionalidad_paciente', 'eno_codigo_nacionalidad_paciente');">
                                        <option value='Afganistán' data-cod='AF'>Afganistán</option>
                                        <option value='Albania' data-cod='AL'>Albania</option>
                                        <option value='Alemania' data-cod='DE'>Alemania</option>
                                        <option value='Andorra' data-cod='AD'>Andorra</option>
                                        <option value='Angola' data-cod='AO'>Angola</option>
                                        <option value='Anguila' data-cod='AI'>Anguila</option>
                                        <option value='Antártida' data-cod='AQ'>Antártida</option>
                                        <option value='Antigua y Barbuda' data-cod='AG'>Antigua y Barbuda</option>
                                        <option value='Arabia Saudita' data-cod='SA'>Arabia Saudita</option>
                                        <option value='Argelia' data-cod='DZ'>Argelia</option>
                                        <option value='Argentina' data-cod='AR'>Argentina</option>
                                        <option value='Armenia' data-cod='AM'>Armenia</option>
                                        <option value='Aruba' data-cod='AW'>Aruba</option>
                                        <option value='Australia' data-cod='AU'>Australia</option>
                                        <option value='Austria' data-cod='AT'>Austria</option>
                                        <option value='Azerbaiyán' data-cod='AZ'>Azerbaiyán</option>
                                        <option value='Bahamas' data-cod='BS'>Bahamas</option>
                                        <option value='Bahrein' data-cod='BH'>Bahrein</option>
                                        <option value='Bailía de Guernsey' data-cod='GG'>Bailía de Guernsey</option>
                                        <option value='Bangladesh' data-cod='BD'>Bangladesh</option>
                                        <option value='Barbados' data-cod='BB'>Barbados</option>
                                        <option value='Belarús' data-cod='BY'>Belarús</option>
                                        <option value='Bélgica' data-cod='BE'>Bélgica</option>
                                        <option value='Belice' data-cod='BZ'>Belice</option>
                                        <option value='Benín' data-cod='BJ'>Benín</option>
                                        <option value='Bermudas' data-cod='BM'>Bermudas</option>
                                        <option value='Bolivia' data-cod='BO'>Bolivia</option>
                                        <option value='Bosnia y Hercegovina' data-cod='BA'>Bosnia y Hercegovina</option>
                                        <option value='Botsuana' data-cod='BW'>Botsuana</option>
                                        <option value='Brasil' data-cod='BR'>Brasil</option>
                                        <option value='Brunéi' data-cod='BN'>Brunéi</option>
                                        <option value='Bulgaria' data-cod='BG'>Bulgaria</option>
                                        <option value='Burkina Faso' data-cod='BF'>Burkina Faso</option>
                                        <option value='Burundi' data-cod='BI'>Burundi</option>
                                        <option value='Bután' data-cod='BT'>Bután</option>
                                        <option value='Cabo Verde' data-cod='CV'>Cabo Verde</option>
                                        <option value='Camboya' data-cod='KH'>Camboya</option>
                                        <option value='Camerún' data-cod='CM'>Camerún</option>
                                        <option value='Canadá' data-cod='CA'>Canadá</option>
                                        <option value='Caribe Neerlandés' data-cod='BQ'>Caribe Neerlandés</option>
                                        <option value='Catar' data-cod='QA'>Catar</option>
                                        <option value='Chad' data-cod='TD'>Chad</option>
                                        <option value='Chequia' data-cod='CZ'>Chequia</option>
                                        <option value='Chile' data-cod='CL' selected>Chile</option>
                                        <option value='China' data-cod='CN'>China</option>
                                        <option value='Chipre' data-cod='CY'>Chipre</option>
                                        <option value='Ciudad del Vaticano' data-cod='VA'>Ciudad del Vaticano</option>
                                        <option value='Colombia' data-cod='CO'>Colombia</option>
                                        <option value='Comores' data-cod='KM'>Comores</option>
                                        <option value='Corea del Norte' data-cod='KP'>Corea del Norte</option>
                                        <option value='Corea del Sur' data-cod='KR'>Corea del Sur</option>
                                        <option value='Costa de Marfil' data-cod='CI'>Costa de Marfil</option>
                                        <option value='Costa Rica' data-cod='CR'>Costa Rica</option>
                                        <option value='Croacia' data-cod='HR'>Croacia</option>
                                        <option value='Cuba' data-cod='CU'>Cuba</option>
                                        <option value='Curaçao' data-cod='CW'>Curaçao</option>
                                        <option value='Dinamarca' data-cod='DK'>Dinamarca</option>
                                        <option value='Dominica' data-cod='DM'>Dominica</option>
                                        <option value='Ecuador' data-cod='EC'>Ecuador</option>
                                        <option value='Egipto' data-cod='EG'>Egipto</option>
                                        <option value='El Salvador' data-cod='SV'>El Salvador</option>
                                        <option value='Emiratos Árabes Unidos' data-cod='AE'>Emiratos Árabes Unidos</option>
                                        <option value='Eritrea' data-cod='ER'>Eritrea</option>
                                        <option value='Eslovaquia' data-cod='SK'>Eslovaquia</option>
                                        <option value='Eslovenia' data-cod='SI'>Eslovenia</option>
                                        <option value='España' data-cod='ES'>España</option>
                                        <option value='Estados Federados de Micronesia' data-cod='FM'>Estados Federados de Micronesia</option>
                                        <option value='Estados Unidos de América' data-cod='US'>Estados Unidos de América</option>
                                        <option value='Estonia' data-cod='EE'>Estonia</option>
                                        <option value='Esuatini' data-cod='SZ'>Esuatini</option>
                                        <option value='Etiopía' data-cod='ET'>Etiopía</option>
                                        <option value='Filipinas' data-cod='PH'>Filipinas</option>
                                        <option value='Finlandia' data-cod='FI'>Finlandia</option>
                                        <option value='Fiyi' data-cod='FJ'>Fiyi</option>
                                        <option value='Francia' data-cod='FR'>Francia</option>
                                        <option value='Gabón' data-cod='GA'>Gabón</option>
                                        <option value='Gambia' data-cod='GM'>Gambia</option>
                                        <option value='Georgia' data-cod='GE'>Georgia</option>
                                        <option value='Georgia del Sur y las Islas Sandwich del Sur' data-cod='GS'>Georgia del Sur y las Islas Sandwich del Sur</option>
                                        <option value='Ghana' data-cod='GH'>Ghana</option>
                                        <option value='Gibraltar' data-cod='GI'>Gibraltar</option>
                                        <option value='Granada' data-cod='GD'>Granada</option>
                                        <option value='Grecia' data-cod='GR'>Grecia</option>
                                        <option value='Groenlandia' data-cod='GL'>Groenlandia</option>
                                        <option value='Guadalupe' data-cod='GP'>Guadalupe</option>
                                        <option value='Guam' data-cod='GU'>Guam</option>
                                        <option value='Guatemala' data-cod='GT'>Guatemala</option>
                                        <option value='Guayana' data-cod='GY'>Guayana</option>
                                        <option value='Guayana Francesa' data-cod='GF'>Guayana Francesa</option>
                                        <option value='Guinea' data-cod='GN'>Guinea</option>
                                        <option value='Guinea Ecuatorial' data-cod='GQ'>Guinea Ecuatorial</option>
                                        <option value='Guinea-Bissau' data-cod='GW'>Guinea-Bissau</option>
                                        <option value='Haití' data-cod='HT'>Haití</option>
                                        <option value='Honduras' data-cod='HN'>Honduras</option>
                                        <option value='Hong Kong' data-cod='HK'>Hong Kong</option>
                                        <option value='Hungría' data-cod='HU'>Hungría</option>
                                        <option value='India' data-cod='IN'>India</option>
                                        <option value='Indonesia' data-cod='ID'>Indonesia</option>
                                        <option value='Irán' data-cod='IR'>Irán</option>
                                        <option value='Iraq' data-cod='IQ'>Iraq</option>
                                        <option value='Irlanda' data-cod='IE'>Irlanda</option>
                                        <option value='Isla Bouvet' data-cod='BV'>Isla Bouvet</option>
                                        <option value='Isla de Man' data-cod='IM'>Isla de Man</option>
                                        <option value='Isla de Navidad' data-cod='CX'>Isla de Navidad</option>
                                        <option value='Isla de San Martín' data-cod='MF'>Isla de San Martín</option>
                                        <option value='Isla Mauricio' data-cod='MU'>Isla Mauricio</option>
                                        <option value='Isla Norfolk' data-cod='NF'>Isla Norfolk</option>
                                        <option value='Islandia' data-cod='IS'>Islandia</option>
                                        <option value='Islas Åland' data-cod='AX'>Islas Åland</option>
                                        <option value='Islas Caimán' data-cod='KY'>Islas Caimán</option>
                                        <option value='Islas Cocos' data-cod='CC'>Islas Cocos</option>
                                        <option value='Islas Cook' data-cod='CK'>Islas Cook</option>
                                        <option value='Islas Feroe' data-cod='FO'>Islas Feroe</option>
                                        <option value='Islas Heard y McDonald' data-cod='HM'>Islas Heard y McDonald</option>
                                        <option value='Islas Malvinas' data-cod='FK'>Islas Malvinas</option>
                                        <option value='Islas Marianas del Norte' data-cod='MP'>Islas Marianas del Norte</option>
                                        <option value='Islas Marshall' data-cod='MH'>Islas Marshall</option>
                                        <option value='Islas Pitcairn' data-cod='PN'>Islas Pitcairn</option>
                                        <option value='Islas Salomón' data-cod='SB'>Islas Salomón</option>
                                        <option value='Islas Turcas y Caicos' data-cod='TC'>Islas Turcas y Caicos</option>
                                        <option value='Islas ultramarinas menores de los Estados Unidos' data-cod='UM'>Islas ultramarinas menores de los Estados Unidos</option>
                                        <option value='Islas Vírgenes (UK)' data-cod='VG'>Islas Vírgenes (UK)</option>
                                        <option value='Islas Vírgenes Americanas' data-cod='VI'>Islas Vírgenes Americanas</option>
                                        <option value='Israel' data-cod='IL'>Israel</option>
                                        <option value='Italia' data-cod='IT'>Italia</option>
                                        <option value='Jamaica' data-cod='JM'>Jamaica</option>
                                        <option value='Japón' data-cod='JP'>Japón</option>
                                        <option value='Jersey' data-cod='JE'>Jersey</option>
                                        <option value='Jordania' data-cod='JO'>Jordania</option>
                                        <option value='Kazajistán​​​' data-cod='KZ'>Kazajistán​​​</option>
                                        <option value='Kenia' data-cod='KE'>Kenia</option>
                                        <option value='Kirguistán' data-cod='KG'>Kirguistán</option>
                                        <option value='Kiribati' data-cod='KI'>Kiribati</option>
                                        <option value='Kosovo' data-cod='XK'>Kosovo</option>
                                        <option value='Kuwait' data-cod='KW'>Kuwait</option>
                                        <option value='Laos' data-cod='LA'>Laos</option>
                                        <option value='Lesotho' data-cod='LS'>Lesotho</option>
                                        <option value='Letonia' data-cod='LV'>Letonia</option>
                                        <option value='Líbano' data-cod='LB'>Líbano</option>
                                        <option value='Liberia' data-cod='LR'>Liberia</option>
                                        <option value='Libia' data-cod='LY'>Libia</option>
                                        <option value='Liechtenstein' data-cod='LI'>Liechtenstein</option>
                                        <option value='Lituania' data-cod='LT'>Lituania</option>
                                        <option value='Luxemburgo' data-cod='LU'>Luxemburgo</option>
                                        <option value='Macao' data-cod='MO'>Macao</option>
                                        <option value='Macedonia del Norte' data-cod='MK'>Macedonia del Norte</option>
                                        <option value='Madagascar' data-cod='MG'>Madagascar</option>
                                        <option value='Malasia' data-cod='MY'>Malasia</option>
                                        <option value='Malaui' data-cod='MW'>Malaui</option>
                                        <option value='Maldivas' data-cod='MV'>Maldivas</option>
                                        <option value='Malí' data-cod='ML'>Malí</option>
                                        <option value='Malta' data-cod='MT'>Malta</option>
                                        <option value='Marruecos' data-cod='MA'>Marruecos</option>
                                        <option value='Martinica' data-cod='MQ'>Martinica</option>
                                        <option value='Mauritania' data-cod='MR'>Mauritania</option>
                                        <option value='Mayotte' data-cod='YT'>Mayotte</option>
                                        <option value='México' data-cod='MX'>México</option>
                                        <option value='Moldavia' data-cod='MD'>Moldavia</option>
                                        <option value='Mongolia' data-cod='MN'>Mongolia</option>
                                        <option value='Montenegro' data-cod='ME'>Montenegro</option>
                                        <option value='Montserrat' data-cod='MS'>Montserrat</option>
                                        <option value='Mozambique' data-cod='MZ'>Mozambique</option>
                                        <option value='Myanmar' data-cod='MM'>Myanmar</option>
                                        <option value='Namibia' data-cod='NA'>Namibia</option>
                                        <option value='Nauru' data-cod='NR'>Nauru</option>
                                        <option value='Nepal' data-cod='NP'>Nepal</option>
                                        <option value='Nicaragua' data-cod='NI'>Nicaragua</option>
                                        <option value='Níger' data-cod='NE'>Níger</option>
                                        <option value='Nigeria' data-cod='NG'>Nigeria</option>
                                        <option value='Niue' data-cod='NU'>Niue</option>
                                        <option value='Noruega' data-cod='NO'>Noruega</option>
                                        <option value='Nueva Caledonia' data-cod='NC'>Nueva Caledonia</option>
                                        <option value='Nueva Zelandia' data-cod='NZ'>Nueva Zelandia</option>
                                        <option value='Omán' data-cod='OM'>Omán</option>
                                        <option value='Países Bajos' data-cod='NL'>Países Bajos</option>
                                        <option value='Pakistán' data-cod='PK'>Pakistán</option>
                                        <option value='Palaos' data-cod='PW'>Palaos</option>
                                        <option value='Palestina' data-cod='PS'>Palestina</option>
                                        <option value='Panamá' data-cod='PA'>Panamá</option>
                                        <option value='Papúa Nueva Guinea' data-cod='PG'>Papúa Nueva Guinea</option>
                                        <option value='Paraguay' data-cod='PY'>Paraguay</option>
                                        <option value='Perú' data-cod='PE'>Perú</option>
                                        <option value='Polinesia Francesa' data-cod='PF'>Polinesia Francesa</option>
                                        <option value='Polonia' data-cod='PL'>Polonia</option>
                                        <option value='Portugal' data-cod='PT'>Portugal</option>
                                        <option value='Principado de Mónaco' data-cod='MC'>Principado de Mónaco</option>
                                        <option value='Puerto Rico' data-cod='PR'>Puerto Rico</option>
                                        <option value='Reino Unido' data-cod='GB'>Reino Unido</option>
                                        <option value='República Centroafricana' data-cod='CF'>República Centroafricana</option>
                                        <option value='República del Congo' data-cod='CG'>República del Congo</option>
                                        <option value='República Democrática del Congo' data-cod='CD'>República Democrática del Congo</option>
                                        <option value='República Dominicana' data-cod='DO'>República Dominicana</option>
                                        <option value='Reunión' data-cod='RE'>Reunión</option>
                                        <option value='Ruanda' data-cod='RW'>Ruanda</option>
                                        <option value='Rumania' data-cod='RO'>Rumania</option>
                                        <option value='Rusia' data-cod='RU'>Rusia</option>
                                        <option value='Sáhara Occidental' data-cod='EH'>Sáhara Occidental</option>
                                        <option value='Samoa' data-cod='WS'>Samoa</option>
                                        <option value='Samoa Americana' data-cod='AS'>Samoa Americana</option>
                                        <option value='San Bartolomé' data-cod='BL'>San Bartolomé</option>
                                        <option value='San Cristóbal y Nieves' data-cod='KN'>San Cristóbal y Nieves</option>
                                        <option value='San Marino' data-cod='SM'>San Marino</option>
                                        <option value='San Pedro y Miquelón' data-cod='PM'>San Pedro y Miquelón</option>
                                        <option value='San Vicente y las Granadinas' data-cod='VC'>San Vicente y las Granadinas</option>
                                        <option value='Santa Elena, Ascensión y Tristán de Acuña' data-cod='SH'>Santa Elena, Ascensión y Tristán de Acuña</option>
                                        <option value='Santa Lucía' data-cod='LC'>Santa Lucía</option>
                                        <option value='Santo Tomé y Príncipe' data-cod='ST'>Santo Tomé y Príncipe</option>
                                        <option value='Senegal' data-cod='SN'>Senegal</option>
                                        <option value='Serbia' data-cod='RS'>Serbia</option>
                                        <option value='Seychelles' data-cod='SC'>Seychelles</option>
                                        <option value='Sierra Leona' data-cod='SL'>Sierra Leona</option>
                                        <option value='Singapur' data-cod='SG'>Singapur</option>
                                        <option value='Sint Maarten' data-cod='SX'>Sint Maarten</option>
                                        <option value='Siria' data-cod='SY'>Siria</option>
                                        <option value='Somalia' data-cod='SO'>Somalia</option>
                                        <option value='Sri Lanka' data-cod='LK'>Sri Lanka</option>
                                        <option value='Sudáfrica' data-cod='ZA'>Sudáfrica</option>
                                        <option value='Sudán' data-cod='SD'>Sudán</option>
                                        <option value='Sudán del Sur' data-cod='SS'>Sudán del Sur</option>
                                        <option value='Suecia' data-cod='SE'>Suecia</option>
                                        <option value='Suiza' data-cod='CH'>Suiza</option>
                                        <option value='Surinam' data-cod='SR'>Surinam</option>
                                        <option value='Svalbard y Jan Mayen' data-cod='SJ'>Svalbard y Jan Mayen</option>
                                        <option value='Tailandia' data-cod='TH'>Tailandia</option>
                                        <option value='Taiwán' data-cod='TW'>Taiwán</option>
                                        <option value='Tanzania' data-cod='TZ'>Tanzania</option>
                                        <option value='Tayikistán' data-cod='TJ'>Tayikistán</option>
                                        <option value='Territorio Británico del Océano Índico' data-cod='IO'>Territorio Británico del Océano Índico</option>
                                        <option value='Territorios Australes y Antárticos Franceses' data-cod='TF'>Territorios Australes y Antárticos Franceses</option>
                                        <option value='Timor Oriental' data-cod='TL'>Timor Oriental</option>
                                        <option value='Togo' data-cod='TG'>Togo</option>
                                        <option value='Tokelau' data-cod='TK'>Tokelau</option>
                                        <option value='Tonga' data-cod='TO'>Tonga</option>
                                        <option value='Trinidad y Tobago' data-cod='TT'>Trinidad y Tobago</option>
                                        <option value='Túnez' data-cod='TN'>Túnez</option>
                                        <option value='Turkmenistán' data-cod='TM'>Turkmenistán</option>
                                        <option value='Turquía' data-cod='TR'>Turquía</option>
                                        <option value='Tuvalu' data-cod='TV'>Tuvalu</option>
                                        <option value='Ucrania' data-cod='UA'>Ucrania</option>
                                        <option value='Uganda' data-cod='UG'>Uganda</option>
                                        <option value='Uruguay' data-cod='UY'>Uruguay</option>
                                        <option value='Uzbekistán' data-cod='UZ'>Uzbekistán</option>
                                        <option value='Vanuatu' data-cod='VU'>Vanuatu</option>
                                        <option value='Venezuela' data-cod='VE'>Venezuela</option>
                                        <option value='Vietnam' data-cod='VN'>Vietnam</option>
                                        <option value='Wallis y Futuna' data-cod='WF'>Wallis y Futuna</option>
                                        <option value='Yemen' data-cod='YE'>Yemen</option>
                                        <option value='Yibuti' data-cod='DJ'>Yibuti</option>
                                        <option value='Zambia' data-cod='ZM'>Zambia</option>
                                        <option value='Zimbabue' data-cod='ZW'>Zimbabue</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Código de nacionalidad</label>
                                    <input type="text" class="form-control form-control-sm" name="eno_codigo_nacionalidad_paciente" id="eno_codigo_nacionalidad_paciente" value="CL" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Seleccione pueblo originario</label>
                                    <select class="form-control form-control-sm" id="eno_pueblo_originario_paciente" name="eno_pueblo_originario_paciente">
                                        <option value="">Selecione una opción</option>
                                        <option value="1">Ninguna</option>
                                        <option value="2">Atacameño</option>
                                        <option value="3">Aimara</option>
                                        <option value="5">Colla</option>
                                        <option value="6">Otro..</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Ocupación</label>
                                    <input type="text" class="form-control form-control-sm" name="eno_ocupacion_paciente" id="eno_ocupacion_paciente">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Condición</label>
                                    <select class="form-control form-control-sm" id="eno_condicion_paciente" name="eno_condicion_paciente">
                                        <option value="">Seleccione condición</option>
                                        <option value="0">Inactivo/a</option>
                                        <option value="1">Activo/a</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Categoría</label>
                                    <select class="form-control form-control-sm" id="eno_categoria_paciente" name="eno_categoria_paciente">
                                        <option value="">Seleccione categoría</option>
                                        <option value="1">Patrón / Empresario</option>
                                        <option value="2">Empleado</option>
                                        <option value="3">Obrero</option>
                                        <option value="4">Trabajador Independiente</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Información clínica del paciente --}}
                        <div class="tab-pane pt-4" id="ident_clinica_paciente_eno">
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <h6 class="text-c-blue">Información clínica del paciente</h6>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Diagnósico Confirmado</label>
                                    <input type="text" class="form-control form-control-sm" data-input_igual="lic_descripcion_hipotesis,hipotesis_certificado,descripcion_hipotesis" name="eno_diagnositico_confirmado" id="eno_diagnositico_confirmado" onchange="cargarIgual('eno_diagnositico_confirmado')">
                                </div>

                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">CIE-10</label>
                                    <input type="text" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie,descripcion_cie_esp,descripcion_cie" name="eno_diagnostico_cie" id="eno_diagnostico_cie" value="" onchange="cargarIgual('eno_diagnostico_cie')">
                                    <input type="hidden" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie,id_descripcion_cie,id_descripcion_cie_esp" name="eno_id_diagnostico_cie" id="eno_id_diagnostico_cie" value="" onchange="cargarIgual('eno_id_diagnostico_cie')">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-sm-4 col-md-4">
                                    <label class="floating-label-activo-sm">Primeros síntomas</label>
                                    <input type="date" class="form-control form-control-sm" name="eno_primeros_sintomas" id="eno_primeros_sintomas">
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                    <label class="floating-label-activo-sm">País de contagio</label>
                                    <select class="form-control form-control-sm" id="eno_pais_contagio" name="eno_pais_contagio" onchange="activar_pais('eno_pais_contagio', 'eno_pais');" >
                                        <option value="">Seleccione una opción</option>
                                        <option value="1">Chile</option>
                                        <option value="2">Extranjero</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                    <label class="floating-label-activo-sm">País</label>
                                    {{-- <input type="text" class="form-control form-control-sm" name="eno_pais" id="eno_pais"> --}}
                                    <select class="form-control form-control-sm" name="eno_pais" id="eno_pais" disabled="disabled">
                                        <option value=''>Selecciones Pais</option>
                                        <option value='Afganistán'>Afganistán</option>
                                        <option value='Albania'>Albania</option>
                                        <option value='Alemania'>Alemania</option>
                                        <option value='Andorra'>Andorra</option>
                                        <option value='Angola'>Angola</option>
                                        <option value='Anguila'>Anguila</option>
                                        <option value='Antártida'>Antártida</option>
                                        <option value='Antigua y Barbuda'>Antigua y Barbuda</option>
                                        <option value='Arabia Saudita'>Arabia Saudita</option>
                                        <option value='Argelia'>Argelia</option>
                                        <option value='Argentina'>Argentina</option>
                                        <option value='Armenia'>Armenia</option>
                                        <option value='Aruba'>Aruba</option>
                                        <option value='Australia'>Australia</option>
                                        <option value='Austria'>Austria</option>
                                        <option value='Azerbaiyán'>Azerbaiyán</option>
                                        <option value='Bahamas'>Bahamas</option>
                                        <option value='Bahrein'>Bahrein</option>
                                        <option value='Bailía de Guernsey'>Bailía de Guernsey</option>
                                        <option value='Bangladesh'>Bangladesh</option>
                                        <option value='Barbados'>Barbados</option>
                                        <option value='Belarús'>Belarús</option>
                                        <option value='Bélgica'>Bélgica</option>
                                        <option value='Belice'>Belice</option>
                                        <option value='Benín'>Benín</option>
                                        <option value='Bermudas'>Bermudas</option>
                                        <option value='Bolivia'>Bolivia</option>
                                        <option value='Bosnia y Hercegovina'>Bosnia y Hercegovina</option>
                                        <option value='Botsuana'>Botsuana</option>
                                        <option value='Brasil'>Brasil</option>
                                        <option value='Brunéi'>Brunéi</option>
                                        <option value='Bulgaria'>Bulgaria</option>
                                        <option value='Burkina Faso'>Burkina Faso</option>
                                        <option value='Burundi'>Burundi</option>
                                        <option value='Bután'>Bután</option>
                                        <option value='Cabo Verde'>Cabo Verde</option>
                                        <option value='Camboya'>Camboya</option>
                                        <option value='Camerún'>Camerún</option>
                                        <option value='Canadá'>Canadá</option>
                                        <option value='Caribe Neerlandés'>Caribe Neerlandés</option>
                                        <option value='Catar'>Catar</option>
                                        <option value='Chad'>Chad</option>
                                        <option value='Chequia'>Chequia</option>
                                        <option value='Chile'>Chile</option>
                                        <option value='China'>China</option>
                                        <option value='Chipre'>Chipre</option>
                                        <option value='Ciudad del Vaticano'>Ciudad del Vaticano</option>
                                        <option value='Colombia'>Colombia</option>
                                        <option value='Comores'>Comores</option>
                                        <option value='Corea del Norte'>Corea del Norte</option>
                                        <option value='Corea del Sur'>Corea del Sur</option>
                                        <option value='Costa de Marfil'>Costa de Marfil</option>
                                        <option value='Costa Rica'>Costa Rica</option>
                                        <option value='Croacia'>Croacia</option>
                                        <option value='Cuba'>Cuba</option>
                                        <option value='Curaçao'>Curaçao</option>
                                        <option value='Dinamarca'>Dinamarca</option>
                                        <option value='Dominica'>Dominica</option>
                                        <option value='Ecuador'>Ecuador</option>
                                        <option value='Egipto'>Egipto</option>
                                        <option value='El Salvador'>El Salvador</option>
                                        <option value='Emiratos Árabes Unidos'>Emiratos Árabes Unidos</option>
                                        <option value='Eritrea'>Eritrea</option>
                                        <option value='Eslovaquia'>Eslovaquia</option>
                                        <option value='Eslovenia'>Eslovenia</option>
                                        <option value='España'>España</option>
                                        <option value='Estados Federados de Micronesia'>Estados Federados de Micronesia</option>
                                        <option value='Estados Unidos de América'>Estados Unidos de América</option>
                                        <option value='Estonia'>Estonia</option>
                                        <option value='Esuatini'>Esuatini</option>
                                        <option value='Etiopía'>Etiopía</option>
                                        <option value='Filipinas'>Filipinas</option>
                                        <option value='Finlandia'>Finlandia</option>
                                        <option value='Fiyi'>Fiyi</option>
                                        <option value='Francia'>Francia</option>
                                        <option value='Gabón'>Gabón</option>
                                        <option value='Gambia'>Gambia</option>
                                        <option value='Georgia'>Georgia</option>
                                        <option value='Georgia del Sur y las Islas Sandwich del Sur'>Georgia del Sur y las Islas Sandwich del Sur</option>
                                        <option value='Ghana'>Ghana</option>
                                        <option value='Gibraltar'>Gibraltar</option>
                                        <option value='Granada'>Granada</option>
                                        <option value='Grecia'>Grecia</option>
                                        <option value='Groenlandia'>Groenlandia</option>
                                        <option value='Guadalupe'>Guadalupe</option>
                                        <option value='Guam'>Guam</option>
                                        <option value='Guatemala'>Guatemala</option>
                                        <option value='Guayana'>Guayana</option>
                                        <option value='Guayana Francesa'>Guayana Francesa</option>
                                        <option value='Guinea'>Guinea</option>
                                        <option value='Guinea Ecuatorial'>Guinea Ecuatorial</option>
                                        <option value='Guinea-Bissau'>Guinea-Bissau</option>
                                        <option value='Haití'>Haití</option>
                                        <option value='Honduras'>Honduras</option>
                                        <option value='Hong Kong'>Hong Kong</option>
                                        <option value='Hungría'>Hungría</option>
                                        <option value='India'>India</option>
                                        <option value='Indonesia'>Indonesia</option>
                                        <option value='Irán'>Irán</option>
                                        <option value='Iraq'>Iraq</option>
                                        <option value='Irlanda'>Irlanda</option>
                                        <option value='Isla Bouvet'>Isla Bouvet</option>
                                        <option value='Isla de Man'>Isla de Man</option>
                                        <option value='Isla de Navidad'>Isla de Navidad</option>
                                        <option value='Isla de San Martín'>Isla de San Martín</option>
                                        <option value='Isla Mauricio'>Isla Mauricio</option>
                                        <option value='Isla Norfolk'>Isla Norfolk</option>
                                        <option value='Islandia'>Islandia</option>
                                        <option value='Islas Åland'>Islas Åland</option>
                                        <option value='Islas Caimán'>Islas Caimán</option>
                                        <option value='Islas Cocos'>Islas Cocos</option>
                                        <option value='Islas Cook'>Islas Cook</option>
                                        <option value='Islas Feroe'>Islas Feroe</option>
                                        <option value='Islas Heard y McDonald'>Islas Heard y McDonald</option>
                                        <option value='Islas Malvinas'>Islas Malvinas</option>
                                        <option value='Islas Marianas del Norte'>Islas Marianas del Norte</option>
                                        <option value='Islas Marshall'>Islas Marshall</option>
                                        <option value='Islas Pitcairn'>Islas Pitcairn</option>
                                        <option value='Islas Salomón'>Islas Salomón</option>
                                        <option value='Islas Turcas y Caicos'>Islas Turcas y Caicos</option>
                                        <option value='Islas ultramarinas menores de los Estados Unidos'>Islas ultramarinas menores de los Estados Unidos</option>
                                        <option value='Islas Vírgenes (UK)'>Islas Vírgenes (UK)</option>
                                        <option value='Islas Vírgenes Americanas'>Islas Vírgenes Americanas</option>
                                        <option value='Israel'>Israel</option>
                                        <option value='Italia'>Italia</option>
                                        <option value='Jamaica'>Jamaica</option>
                                        <option value='Japón'>Japón</option>
                                        <option value='Jersey'>Jersey</option>
                                        <option value='Jordania'>Jordania</option>
                                        <option value='Kazajistán​​​'>Kazajistán​​​</option>
                                        <option value='Kenia'>Kenia</option>
                                        <option value='Kirguistán'>Kirguistán</option>
                                        <option value='Kiribati'>Kiribati</option>
                                        <option value='Kosovo'>Kosovo</option>
                                        <option value='Kuwait'>Kuwait</option>
                                        <option value='Laos'>Laos</option>
                                        <option value='Lesotho'>Lesotho</option>
                                        <option value='Letonia'>Letonia</option>
                                        <option value='Líbano'>Líbano</option>
                                        <option value='Liberia'>Liberia</option>
                                        <option value='Libia'>Libia</option>
                                        <option value='Liechtenstein'>Liechtenstein</option>
                                        <option value='Lituania'>Lituania</option>
                                        <option value='Luxemburgo'>Luxemburgo</option>
                                        <option value='Macao'>Macao</option>
                                        <option value='Macedonia del Norte'>Macedonia del Norte</option>
                                        <option value='Madagascar'>Madagascar</option>
                                        <option value='Malasia'>Malasia</option>
                                        <option value='Malaui'>Malaui</option>
                                        <option value='Maldivas'>Maldivas</option>
                                        <option value='Malí'>Malí</option>
                                        <option value='Malta'>Malta</option>
                                        <option value='Marruecos'>Marruecos</option>
                                        <option value='Martinica'>Martinica</option>
                                        <option value='Mauritania'>Mauritania</option>
                                        <option value='Mayotte'>Mayotte</option>
                                        <option value='México'>México</option>
                                        <option value='Moldavia'>Moldavia</option>
                                        <option value='Mongolia'>Mongolia</option>
                                        <option value='Montenegro'>Montenegro</option>
                                        <option value='Montserrat'>Montserrat</option>
                                        <option value='Mozambique'>Mozambique</option>
                                        <option value='Myanmar'>Myanmar</option>
                                        <option value='Namibia'>Namibia</option>
                                        <option value='Nauru'>Nauru</option>
                                        <option value='Nepal'>Nepal</option>
                                        <option value='Nicaragua'>Nicaragua</option>
                                        <option value='Níger'>Níger</option>
                                        <option value='Nigeria'>Nigeria</option>
                                        <option value='Niue'>Niue</option>
                                        <option value='Noruega'>Noruega</option>
                                        <option value='Nueva Caledonia'>Nueva Caledonia</option>
                                        <option value='Nueva Zelandia'>Nueva Zelandia</option>
                                        <option value='Omán'>Omán</option>
                                        <option value='Países Bajos'>Países Bajos</option>
                                        <option value='Pakistán'>Pakistán</option>
                                        <option value='Palaos'>Palaos</option>
                                        <option value='Palestina'>Palestina</option>
                                        <option value='Panamá'>Panamá</option>
                                        <option value='Papúa Nueva Guinea'>Papúa Nueva Guinea</option>
                                        <option value='Paraguay'>Paraguay</option>
                                        <option value='Perú'>Perú</option>
                                        <option value='Polinesia Francesa'>Polinesia Francesa</option>
                                        <option value='Polonia'>Polonia</option>
                                        <option value='Portugal'>Portugal</option>
                                        <option value='Principado de Mónaco'>Principado de Mónaco</option>
                                        <option value='Puerto Rico'>Puerto Rico</option>
                                        <option value='Reino Unido'>Reino Unido</option>
                                        <option value='República Centroafricana'>República Centroafricana</option>
                                        <option value='República del Congo'>República del Congo</option>
                                        <option value='República Democrática del Congo'>República Democrática del Congo</option>
                                        <option value='República Dominicana'>República Dominicana</option>
                                        <option value='Reunión'>Reunión</option>
                                        <option value='Ruanda'>Ruanda</option>
                                        <option value='Rumania'>Rumania</option>
                                        <option value='Rusia'>Rusia</option>
                                        <option value='Sáhara Occidental'>Sáhara Occidental</option>
                                        <option value='Samoa'>Samoa</option>
                                        <option value='Samoa Americana'>Samoa Americana</option>
                                        <option value='San Bartolomé'>San Bartolomé</option>
                                        <option value='San Cristóbal y Nieves'>San Cristóbal y Nieves</option>
                                        <option value='San Marino'>San Marino</option>
                                        <option value='San Pedro y Miquelón'>San Pedro y Miquelón</option>
                                        <option value='San Vicente y las Granadinas'>San Vicente y las Granadinas</option>
                                        <option value='Santa Elena, Ascensión y Tristán de Acuña'>Santa Elena, Ascensión y Tristán de Acuña</option>
                                        <option value='Santa Lucía'>Santa Lucía</option>
                                        <option value='Santo Tomé y Príncipe'>Santo Tomé y Príncipe</option>
                                        <option value='Senegal'>Senegal</option>
                                        <option value='Serbia'>Serbia</option>
                                        <option value='Seychelles'>Seychelles</option>
                                        <option value='Sierra Leona'>Sierra Leona</option>
                                        <option value='Singapur'>Singapur</option>
                                        <option value='Sint Maarten'>Sint Maarten</option>
                                        <option value='Siria'>Siria</option>
                                        <option value='Somalia'>Somalia</option>
                                        <option value='Sri Lanka'>Sri Lanka</option>
                                        <option value='Sudáfrica'>Sudáfrica</option>
                                        <option value='Sudán'>Sudán</option>
                                        <option value='Sudán del Sur'>Sudán del Sur</option>
                                        <option value='Suecia'>Suecia</option>
                                        <option value='Suiza'>Suiza</option>
                                        <option value='Surinam'>Surinam</option>
                                        <option value='Svalbard y Jan Mayen'>Svalbard y Jan Mayen</option>
                                        <option value='Tailandia'>Tailandia</option>
                                        <option value='Taiwán'>Taiwán</option>
                                        <option value='Tanzania'>Tanzania</option>
                                        <option value='Tayikistán'>Tayikistán</option>
                                        <option value='Territorio Británico del Océano Índico'>Territorio Británico del Océano Índico</option>
                                        <option value='Territorios Australes y Antárticos Franceses'>Territorios Australes y Antárticos Franceses</option>
                                        <option value='Timor Oriental'>Timor Oriental</option>
                                        <option value='Togo'>Togo</option>
                                        <option value='Tokelau'>Tokelau</option>
                                        <option value='Tonga'>Tonga</option>
                                        <option value='Trinidad y Tobago'>Trinidad y Tobago</option>
                                        <option value='Túnez'>Túnez</option>
                                        <option value='Turkmenistán'>Turkmenistán</option>
                                        <option value='Turquía'>Turquía</option>
                                        <option value='Tuvalu'>Tuvalu</option>
                                        <option value='Ucrania'>Ucrania</option>
                                        <option value='Uganda'>Uganda</option>
                                        <option value='Uruguay'>Uruguay</option>
                                        <option value='Uzbekistán'>Uzbekistán</option>
                                        <option value='Vanuatu'>Vanuatu</option>
                                        <option value='Venezuela'>Venezuela</option>
                                        <option value='Vietnam'>Vietnam</option>
                                        <option value='Wallis y Futuna'>Wallis y Futuna</option>
                                        <option value='Yemen'>Yemen</option>
                                        <option value='Yibuti'>Yibuti</option>
                                        <option value='Zambia'>Zambia</option>
                                        <option value='Zimbabue'>Zimbabue</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <h6 class="text-c-blue">Antecedentes de Vacunación</h6>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-4 col-md-4">
                                    <label class="floating-label-activo-sm">Vacunación</label>
                                    <select class="form-control form-control-sm" id="eno_vacunacion" name="eno_vacunacion" onchange="activacion_vacunas_eno();">
                                        <option value="">Seleccione una opción</option>
                                        <option value="1">Si</option>
                                        <option value="2">No</option>
                                        <option value="3">Ignorado</option>
                                        <option value="4">No corresponde</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                    <label class="floating-label-activo-sm">Fecha última dosis</label>
                                    <input type="date" class="form-control form-control-sm" name="eno_fecha_ultima_dosis" id="eno_fecha_ultima_dosis" disabled="disabled">
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                    <label class="floating-label-activo-sm">Nº última dosis</label>
                                    <input type="number" class="form-control form-control-sm" name="eno_numero_ultima_dosis" id="eno_numero_ultima_dosis" disabled="disabled">
                                </div>
                            </div>
                            <div class="form-row mt-0 pt-0">
                                <div class="form-group col-sm-12 col-md-12">
                                    <p class="mb-0 pb-0">Completar solo si la declaración corresponde a TBC</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Solo para TBC(NUEVO-RECAIDA)</label>
                                    <input type="text" class="form-control form-control-sm" name="eno_tbc" id="eno_tbc">
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">RECAIDAS</label>
                                    <input type="text" class="form-control form-control-sm" name="eno_tbc_recaidas" id="eno_tbc_recaidas">
                                </div>
                            </div>
                        </div>

                        {{-- Información del profesional que notifica --}}
                        <div class="tab-pane pt-4" id="notificacion_eno">
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <h6 class="text-c-blue">Información del profesional que notifica</h6>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Rut</label>
                                    <input type="person" class="form-control form-control-sm" name="rut_profesional_eno" id="rut_profesional_eno" value="{{ $profesional->rut }}" readonly>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Nombres y Apellidos</label>
                                    <input type="text" class="form-control form-control-sm" name="nombre_apellidos_eno" id="nombre_apellidos_eno" value="{{ $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos }}" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Teléfono</label>
                                    <input type="tel" class="form-control form-control-sm" name="telefono_profesional_eno" id="telefono_profesional_eno" value="{{ $profesional->telefono_uno }}" readonly>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Correo Electrónico</label>
                                    <input type="email" class="form-control form-control-sm" name="correo_profesional_eno" id="correo_profesional_eno" value="{{ $profesional->email }}" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="text-c-blue text-center mt-3">Instructivo boletín notificación de enfermedades de declaración obligatoria (boletín E.N.O)</h5>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                                        <ol class="px-2">
                                            <li value="1">
                                                <p>Los Items <strong>Nombre; Establecimiento</strong>;<strong>Oficina Provincial</strong>;<strong>Codigos Asignados</strong>;<strong>Seremi</strong>;<strong>Nacionalidad</strong>;<strong>Pueblo originario declarado</strong>;<strong> Comuna de residencia</strong>, etc. <a href="https://deis.minsal.cl" target="_blank" class="btn btn-xs btn-info"> Los puede consultar acá. </a></p>
                                            </li>
                                            <li>
                                                <p>Para el(la) enfermo(a) que presente 2 o más afecciones de
                                                    declaración obligatoria, éstas deberán ser registradas en <span
                                                        class="auto-style1"><strong>FORMULARIOS
                                                            SEPARADOS</strong></span> para cada una. Sólo en caso de
                                                    Tuberculosis se registrará en la 2da. línea otro diagnóstico
                                                    relacionado con esta afección.</p>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row justify-content-between mx-0 btn-page">
                            <div class="col-sm-6 pl-0">
                                <a href="#!" class="btn btn-success btn-sm button-previous">Anterior</a>
                            </div>
                            <div class="col-sm-6 text-md-right pr-0">
                                <a href="#!" class="btn btn-success btn-sm button-next">Siguente</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table responsive" id="tabla_registros_eno">
                            <thead>
                                <tr>
                                    <th>F. Notificación</th>
                                    <th>Profesional</th>
                                    <th>Diagnóstico</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info" onclick="registrar_eno();">Guardar</button>
            </div>

        </div>
    </div>
</div>


<script>
    function cargar_codigo(select_origen, input_destino)
    {
        var valor = $('#'+select_origen).val();
        var cod = $('#'+select_origen+' option:selected').attr('data-cod');

        $('#'+input_destino).val(cod);
    }

    /** 'eno_pais_contagio', 'eno_pais' */
    function activar_pais(select_origen, select_destino)
    {
        var valor = $('#'+select_origen).val();
        if(valor == 2)
        {
            $('#'+select_destino).val('');
            $('#'+select_destino).attr('disabled', false);
        }
        else
        {
            $('#'+select_destino).val('Chile');
            $('#'+select_destino).attr('disabled', true);
        }
    }

    function activacion_vacunas_eno()
    {
        var vacunacion = $('#eno_vacunacion').val();
        var fecha_ultima_dosis = $('#eno_fecha_ultima_dosis');
        var numero_ultima_dosis = $('#eno_numero_ultima_dosis');

        fecha_ultima_dosis.val('');
        numero_ultima_dosis.val('');
        if(vacunacion == 1)
        {
            fecha_ultima_dosis.attr('disabled', false);
            numero_ultima_dosis.attr('disabled', false);
        }
        else
        {
            fecha_ultima_dosis.attr('disabled', true);
            numero_ultima_dosis.attr('disabled', true);
        }
    }

    function registrar_eno()
    {
        var id_lugar_atencion = $('#eno_id_lugar_atencion').val();
        var nombre_establecimiento = $('#eno_nombre_establecimiento').val();
        var codigo_establecimiento = $('#eno_codigo_establecimiento').val();
        var nombre_oficina = $('#eno_nombre_oficina').val();
        var codigo_oficina = $('#eno_codigo_oficina').val();
        var id_ficha_atencion = $('#eno_id_ficha_atencion').val();
        var id_paciente = $('#eno_id_pacienter').val();
        var nacionalidad_paciente = $('#eno_nacionalidad_paciente').val();
        var codigo_nacionalidad_paciente = $('#eno_codigo_nacionalidad_paciente').val();
        var pueblo_originario_paciente = $('#eno_pueblo_originario_paciente').val();
        var ocupacion_paciente = $('#eno_ocupacion_paciente').val();
        var condicion_paciente = $('#eno_condicion_paciente').val();
        var categoria_paciente = $('#eno_categoria_paciente').val();
        var diagnositico_confirmado = $('#eno_diagnositico_confirmado').val();
        var diagnostico_cie = $('#eno_diagnostico_cie').val();
        var primeros_sintomas = $('#eno_primeros_sintomas').val();
        var pais_contagio = $('#eno_pais_contagio').val();
        var pais = $('#eno_pais').val();
        var vacunacion = $('#eno_vacunacion').val();
        var fecha_ultima_dosis = $('#eno_fecha_ultima_dosis').val();
        var numero_ultima_dosis = $('#eno_numero_ultima_dosis').val();
        var tbc = $('#eno_tbc').val();
        var tbc_recaidas = $('#eno_tbc_recaidas').val();
        var id_profesional = $('#id_profesional').val();

        var mensaje = '';
        var valido = 1;


        if(nombre_establecimiento == '')
        {
            mensaje +='Nombre Establecimiento es un campo requerido\n';
            valido = 0;
        }

        if(codigo_establecimiento == '')
        {
            mensaje +='Codigo Establecimiento es un campo requerido\n';
            valido = 0;
        }

        // if(nombre_oficina == '')
        // {
        //     mensaje +='Nombre Oficina es un campo requerido\n';
        //     valido = 0;
        // }

        // if(codigo_oficina == '')
        // {
        //     mensaje +='Codigo Oficina es un campo requerido\n';
        //     valido = 0;
        // }

        if(nacionalidad_paciente == '')
        {
            mensaje +='Nacionalidad Paciente es un campo requerido\n';
            valido = 0;
        }

        if(codigo_nacionalidad_paciente == '')
        {
            mensaje +='Codigo Nacionalidad Paciente es un campo requerido\n';
            valido = 0;
        }

        if(pueblo_originario_paciente == '')
        {
            mensaje +='Pueblo Originario Paciente es un campo requerido\n';
            valido = 0;
        }

        if(ocupacion_paciente == '')
        {
            mensaje +='Ocupacion Paciente es un campo requerido\n';
            valido = 0;
        }

        if(condicion_paciente == '')
        {
            mensaje +='Condicion Paciente es un campo requerido\n';
            valido = 0;
        }

        if(categoria_paciente == '')
        {
            mensaje +='Categoria Paciente es un campo requerido\n';
            valido = 0;
        }

        if(diagnositico_confirmado == '')
        {
            mensaje +='Diagnositico Confirmado en un campo requerido\n';
            valido = 0;
        }

        // if(diagnostico_cie == '')
        // {
        //     mensaje +='Diagnostico CIE10 es un campo requerido\n';
        //     valido = 0;
        // }

        if(primeros_sintomas == '')
        {
            mensaje +='Primeros Sintomas es un campo requerido\n';
            valido = 0;
        }

        if(pais_contagio == '')
        {
            mensaje +='Pais Contagio es un campo requerido\n';
            valido = 0;
        }

        if(pais == '')
        {
            mensaje +='Pais es un campo requerido\n';
            valido = 0;
        }

        if(vacunacion == '')
        {
            mensaje +='Vacunacion es un campo requerido\n';
            valido = 0;
        }
        else if(vacunacion == 1)
        {
            if(fecha_ultima_dosis == '')
            {
                mensaje +='fecha ultima dosis es un campo requerido\n';
                valido = 0;
            }
            if(numero_ultima_dosis == '')
            {
                mensaje +='numero ultima dosis es un campo requerido\n';
                valido = 0;
            }
        }

        if(valido == 1)
        {
            var url = '{{ route("ficha_atencion.registrar.eno") }}';
            var _token = CSRF_TOKEN;

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_lugar_atencion : id_lugar_atencion,
                    nombre_establecimiento : nombre_establecimiento,
                    codigo_establecimiento : codigo_establecimiento,
                    nombre_oficina : nombre_oficina,
                    codigo_oficina : codigo_oficina,
                    id_ficha_atencion : id_ficha_atencion,
                    id_paciente : id_paciente,
                    nacionalidad_paciente : nacionalidad_paciente,
                    codigo_nacionalidad_paciente : codigo_nacionalidad_paciente,
                    pueblo_originario_paciente : pueblo_originario_paciente,
                    ocupacion_paciente : ocupacion_paciente,
                    condicion_paciente : condicion_paciente,
                    categoria_paciente : categoria_paciente,
                    diagnositico_confirmado : diagnositico_confirmado,
                    diagnostico_cie : diagnostico_cie,
                    primeros_sintomas : primeros_sintomas,
                    pais_contagio : pais_contagio,
                    pais : pais,
                    vacunacion : vacunacion,
                    fecha_ultima_dosis : fecha_ultima_dosis,
                    numero_ultima_dosis : numero_ultima_dosis,
                    tbc : tbc,
                    tbc_recaidas : tbc_recaidas,
                    id_profesional : id_profesional,
                },
            })
            .done(function(data)
            {
                if (data !== 'null')
                {
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Enfermedades de declaración obligatoria E.N.O.",
                            text: "Declaracion Registrada",
                            icon: "success",
                        });

                        cargar_tabla_eno();

                        $('#eno_nacionalidad_paciente').val('');
                        $('#eno_codigo_nacionalidad_paciente').val('');
                        $('#eno_pueblo_originario_paciente').val('');
                        $('#eno_ocupacion_paciente').val('');
                        $('#eno_condicion_paciente').val('');
                        $('#eno_categoria_paciente').val('');
                        $('#eno_diagnositico_confirmado').val('');
                        $('#eno_diagnostico_cie').val('');
                        $('#eno_primeros_sintomas').val('');
                        $('#eno_pais_contagio').val('');
                        $('#eno_pais').val('');
                        $('#eno_vacunacion').val('');
                        $('#eno_fecha_ultima_dosis').val('');
                        $('#eno_numero_ultima_dosis').val('');
                        $('#eno_tbc').val('');
                        $('#eno_tbc_recaidas').val('');

                        $('#modal_enfermedades_declaracion_obligatoria').modal('hide');
                    }
                    else
                    {
                        var mensaje = '';
                        if(data.error)
                        {
                            $.each(data.error, function (indexInArray, valueOfElement)
                            {
                                mensaje += valueOfElement+'\n';
                            });
                        }
                        else
                        {
                            mensaje += 'Intente nuevamente.';
                        }

                        swal({
                            title: "Enfermedades de declaración obligatoria E.N.O.",
                            text: mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                }
                else
                {
                    swal({
                        title: "Enfermedades de declaración obligatoria E.N.O.",
                        text: "Problema en el registro.\nIntente de nuevo.",
                        icon: "warning",
                    })
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
        else
        {
            swal({
                title: "Registro Declaración ENO.",
                text:mensaje,
                icon: "warning",
            });
        }
    }

    function cargar_tabla_eno()
    {
        $('#tabla_registros_eno tbody').html('');
        var id_paciente = $('#eno_id_pacienter').val();
        var url = '{{ route("ficha_atencion.cargar.eno") }}';
        var _token = CSRF_TOKEN;

        $.ajax({
            url: url,
            type: "GET",
            data: {
                _token: _token,
                id_paciente : id_paciente,
            },
        })
        .done(function(data)
        {
            if(data.estado == 1)
            {
                $('#tabla_registros_eno tbody').html('');
                $.each(data.registros, function (key, value)
                {
                    var boton_estado = '<button type="button" class="btn btn-warning">En resolucion</button>';
                    // if(value.estado == 1) /** En resolucion */
                    //     boton_estado = '<button type="button" class="btn btn-info">En resolucion</button>';
                    // else if(value.estado == 2) /** resuelto */
                    //     boton_estado = '<button type="button" class="btn btn-success">Resuelto</button>';

                    var html = '';
                    html += '<tr>';
                    html += '   <td>'+value.fecha_notificacion+'</td>';
                    html += '   <td>'+value.diagnositico_confirmado+'</td>';
                    html += '   <td>'+value.profesional.nombre+' '+value.profesional.apellido_uno+'</td>';
                    html += '   <td>'+boton_estado+'</td>';
                    html += '</tr>';

                    $('#tabla_registros_eno tbody').append(html);
                });
            }
            else
            {
                var html = '';
                $('#tabla_registros_eno tbody').append(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }


    $(document).ready(function() {
        $("#eno_diagnostico_cie").autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getCie10') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                // Set selection
                $('#eno_diagnostico_cie').val(ui.item.label); // display the selected text
                $('#eno_id_diagnostico_cie').val(ui.item.value); // save selected id to input
                return false;
            }
        });

        $("#eno_diagnositico_confirmado").autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('diagnostico.auto.eno') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                // Set selection
                $('#eno_diagnositico_confirmado').val(ui.item.label); // display the selected text
                // $('#eno_id_diagnositico_confirmado').val(ui.item.value); // save selected id to input
                return false;
            }
        });
    });
</script>
