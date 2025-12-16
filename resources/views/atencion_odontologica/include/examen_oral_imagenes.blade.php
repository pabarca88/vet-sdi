<div class="row mb-1">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="form-row">
            <div class="col-sm-4 mt-2">
                <div class="card">
                    <div class="card text-center" id="img">
                       <H6>Imagenes Pre</H6>
                    </div>

                    <div class="aten-a">
                        <!-- [ Main Content ] start -->
                        <div class="dropzone" id="mis-imagenes-dentales" action="{{ route('profesional.imagen.carga') }}"></div>
                        <!-- [ file-upload ] end -->
                    </div>

                </div>
            </div>
            <div class="col-sm-4 mt-2">
                <div class="card">
                    <div class="card text-center" id="img">
                        <H6>Imagenes Post</H6>
                    </div>


                    <div class="aten-a">
                        <!-- [ Main Content ] start -->
                        <div class="dropzone" id="mis-imagenes-dentales-post" action="{{ route('profesional.imagen.carga') }}"></div>
                        <!-- [ file-upload ] end -->
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-2">
                <div class="form-group fill">
                    <input type="hidden" name="biopsia_dermat" id="biopsia_dermat" value="">
                    <div class="switch switch-success d-inline m-r-10">
                        <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_odont" name="biopsia_check_odont" value="">
                        <label for="biopsia_check_odont" class="cr"></label>
                    </div>
                    <label>biopsia</label>
                    <hr>
                    <div class="form-group fill">
                        <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="od_biop_zona" id="od_biop_zona"></textarea>
                    </div>
                    <div class="form-group fill">
                        <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_result_biopsia" id="obs_result_biopsia"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
