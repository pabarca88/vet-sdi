<template>
  <div id="modal_exito" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="modal_1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
          <div class="card-header bg-success py-2 text-center">
              <img class="wid-80 mt-3 mb-3" src="/images/iconos/ok.svg">
          </div>
          <div class="modal-body text-center">
              <h4 class="text-success f-20 mt-4">!Exito¡</h4>
              <p>{{ msg }}</p>
              <button type="submit" class="btn btn-success btn-block" v-on:click="cerrarModal">Aceptar</button>
          </div>    
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {};
  },
  props:{
    msg: String,
  },
  methods : {
    cerrarModal(){
      $('#modal_exito').modal('hide')
    }
  }
};
</script>
