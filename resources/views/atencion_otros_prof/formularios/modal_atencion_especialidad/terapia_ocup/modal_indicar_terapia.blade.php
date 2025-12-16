<div id="indicar_terapia_to" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_terapia_to"aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Plan de Tratamiento Terápia Ocupacional</h5>
                <input type="hidden" id="id_profesional" value="{{ @Auth::user()->id }}">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span  aria-hidden="true">×</span> </button>


            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link-wizard active " id="rec_auto_tab" data-toggle="pill" href="#rec_auto" role="tab" aria-controls="rec_auto" aria-selected="true">Terapia 1</a>
                            </li>
                            {{--  <li class="nav-item">
                                <a class="nav-link-wizard" id="rec_manual_tab" data-toggle="pill" href="#rec_manual" role="tab" aria-controls="rec_manual" aria-selected="true" toogle="true">Terapia 2</a>
                            </li>  --}}

                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="pills-tablas_examenes">
                            <!--TAB 1-->
                            <div class="tab-pane fade show active" id="rec_auto" role="tabpanel" aria-labelledby="rec_auto_tab">
                                <form id="form_indicar_terapia">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="tab-content" id="venereas">
                                                <!--SINTOMAS GENERALES-->
                                                <div class="tab-pane fade show active" id="uro_ven_sint" role="tabpanel" aria-labelledby="uro_ven_sint_tab">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Vida diaria</label>
                                                            <select class="form-control form-control-sm" name="select_1_tera_vidadiaria" id="select_1_tera_vidadiaria" multiple="multiple">
                                                                <option value="HP">heterosexual</option>
                                                                <option value="DI">Homosexual</option>
                                                                <option value="HC">Bisexual</option>
                                                                <option value="HL">Otro</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Conducta y hábitos sexuales</label>
                                                            <select class="form-control form-control-sm" name="select_2_tera_ant_cond" id="select_2_tera_ant_cond" multiple="multiple">
                                                                <option value="HP">Pareja única</option>
                                                                <option value="HP">mas de una pareja</option>
                                                                <option value="DI">Comercio Sexual</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Vida Laboral</label>
                                                            <select class="form-control form-control-sm" name="select_3_tera_laboral" id="select_3_tera_laboral" multiple="multiple">
                                                                <option value="HP">Siempre</option>
                                                                <option value="HP">Nunca</option>
                                                                <option value="DI">Ocacionalmente</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Autoestima</label>
                                                            <select class="form-control form-control-sm" name="select_4_tera_autoestima" id="select_4_tera_autoestima" multiple="multiple">
                                                                <option value="HP">Si</option>
                                                                <option value="HP">No</option>
                                                                <option value="DI">No sabe</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label-activo-sm">Observaciones al plan de trabajo</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="obs_planterapia_psi" id="obs_planterapia_psi"></textarea>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{--  <!--TAB 2-->
                            <div class="tab-pane fade show" id="rec_manual" role="tabpanel" aria-labelledby="rec_manual_tab">

                            </div>  --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function ind_terapia_to() {
        $('#indicar_terapia_to').modal('show');
    }

    $(document).ready(function() {
        $('#select_1_tera_vidadiaria').select2();
        $('#select_2_tera_ant_cond').select2();
        $('#select_3_tera_laboral').select2();
        $('#select_4_tera_autoestima').select2();

    });
</script>

