<div id="rol_menu_adm_gen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="rol_menu_adm_gen"

    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header bg-info">

                <h5 class="modal-title text-white text-center">Autorización de Menú</h5>

                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span

                        aria-hidden="true">×</span></button>

            </div>

            <div class="modal-body">

                <form>

                    <div class="row">

                        <div class="col-sm-6 mb-3">

                            <h6 class="text-c-blue">Usuario</h6>

                            {{--  <span>{{ $user->Nombre }}</span>  --}}

                        </div>

                        <div class="col-sm-6 mb-3">

                            <h6 class="text-c-blue">Rol</h6>

                            <span>Administrador</span>

                        </div>

                        <div class="col-sm-12">

                            <h6 class="text-c-blue mb-2">Módulos</h6>

                        </div>



                        <div class="col-sm-12 mb-3">

                            <?php $i = 0; ?>

                            {{--  @foreach ($permisos as $per)  --}}

                                <div class="custom-control custom-switch">

                                    <input type="checkbox"

                                        {{--  onclick="guardar_permiso({{ $per->id }},{{ $per->name }})"

                                        class="custom-control-input" id="{{ $per->name }}">  --}}

                                    <label class="custom-control-label"

                                        {{--  for="{{ $per->name }}">{{ $per->name }}</label>  --}}

                                </div>

                            {{--  @endforeach  --}}



                        </div>

                    </div>

            </div>

            <div class="modal-footer mb-0 pb-0">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                <button type="button" class="btn btn-info">Guardar Cambios</button>

            </div>

        </div>

    </div>

</div>

</div>

