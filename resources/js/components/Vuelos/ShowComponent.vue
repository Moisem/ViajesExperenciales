<template>
  <div>
    <button
      data-toggle="modal"
      data-target="#guardarModal"
      type="button"
      class="justify-content-center btn btn-primary"
    >
      Insertar Vuelo
    </button>
    <div class="row">
      <div class="col-sm" v-for="vuelo in vuelos" :key="vuelo.id">
        <div class="card text-center" style="width: 18rem; margin-top: 40px">
          <div class="card-body">
            <h5 class="card-title" v-text="vuelo.pais"></h5>
            <h6
              class="card-subtitle mb-2 text-muted"
              v-text="vuelo.ciudad"
            ></h6>
            <p class="card-text" v-text="vuelo.descripcion"></p>
            <a
              data-toggle="modal"
              data-target="#exampleModal"
              type="button"
              class="boton_edit"
              v-on:click="updateid(vuelo)"
              >Editar</a
            >
            <a
              data-toggle="modal"
              data-target="#deletvuelo"
              type="button"
              class="btn btn-danger"
              v-on:click="deleteid(vuelo)"
              >Eliminar</a
            >
          </div>
          <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">
                    Midificaion de vuelo
                  </h5>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form @submit.prevent="editarVuelos()">
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label"
                        >Vuelos:</label
                      >
                      <input
                        type="text"
                        v-model="vueloedit.pais"
                        class="form-control"
                        id="recipient-name"
                      />
                    </div>
                    <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                      >
                        Cancelar
                      </button>
                      <button
                        type="submit"
                        name="action"
                        class="btn btn-primary"
                      >
                        Actualizar
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div
      class="modal fade"
      id="deletvuelo"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar Vuelo</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h4>
              ¿Esta seguro que quieres eliminar la materia
              <span class="badge badge-pill badge-warning">{{
                vuelodelete.pais
              }}</span
              >?
            </h4>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Cancelar
            </button>
            <button
              type="button"
              class="btn btn-danger"
              @click="deleteVuelo(vuelodelete.id)"
            >
              Eliminar
            </button>
          </div>
        </div>
      </div>
    </div>

    <div
      class="modal fade"
      id="guardarModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Alta De Materia Desde un componente de vue
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="CrearMateria()">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Pais:</label>
                <input
                  type="text"
                  v-model="nuevoVuelo.pais"
                  class="form-control"
                  id="recipient-name"
                />
                <label for="recipient-name" class="col-form-label"
                  >Ciudad:</label
                >
                <input
                  type="text"
                  v-model="nuevoVuelo.ciudad"
                  class="form-control"
                  id="recipient-name"
                />
                <label for="recipient-name" class="col-form-label"
                  >Descripción:</label
                >
                <input
                  type="text"
                  v-model="nuevoVuelo.descripcion"
                  class="form-control"
                  id="recipient-name"
                />
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                >
                  Cancelar
                </button>
                <button type="submit" name="action" class="btn btn-primary">
                  Guardar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      vuelos: [],

      vueloedit: [],

      vuelodelete: [],

      nuevoVuelo: {
        pais: "",
        ciudad: "",
        descipcion: "",
      },
    };
  },
  mounted() {
    this.getVuelos();
    console.log("se carga la API");
  },
  methods: {
    getVuelos: function () {
      axios.get("Vuelos").then((response) => {
        this.vuelos = response.data.vuelos;
        console.log(this.vuelos);
      });
    },

    updateid(id) {
      this.vueloedit = id;
    },

    editarVuelos() {
      let urlUpdate = "Vuelos/" + this.vueloedit.id;
      axios
        .put(urlUpdate, this.vueloedit)
        .then((response) => {
          if (response.data.error) {
            toastr.error(response.data.mensaje);
          } else {
            toastr.success(response.data.mensaje);
            $("#exampleModal").modal("hide");
          }
        })
        .catch((error) => {});
    },
    deleteid(id) {
      this.vuelodelete = id;
    },
    deleteVuelo(id) {
      let urldeleteVuelo = "Vuelos/" + id;
      axios
        .delete(urldeleteVuelo, this.vuelodelete)
        .then((response) => {
          if (response.data.error) {
            consolo.log("ocurrio un error");
          } else {
            console.log("se elimino de manera correctamente");
          }
        })
        .catch((error) => {});
    },
    CrearMateria() {
      let url = "Vuelos";
      axios
        .post(url, this.nuevoVuelo)
        .then((resp) => {
          if ((resp.data.error = false)) {
            console.log("ocurrio un error al guarda");
          } else {
            this.nuevoVuelo.pais = "";
            this.nuevoVuelo.ciudad = "";
            this.nuevoVuelo.descipcion = "";
            $("#guardarModal").modal("hide");
            toastr.success(response.data.error);    
            //console.log("la materia de sio de alta con exito");
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
<style scoped>
.boton_edit {
  text-decoration: none;
  padding: 3px;
  padding-left: 5px;
  padding-right: 5px;
  font-family: helvetica;
  font-weight: 300;
  font-size: 15px;
  font-style: italic;
  color: #006558;
  background-color: #82b085;
  border-radius: 15px;
  border: 3px double #dee9de;
}
.boton_edit:hover {
  opacity: 0.6;
  text-decoration: none;
}
.boton_delete {
  text-decoration: none;
  padding: 3px;
  padding-left: 5px;
  padding-right: 5px;
  font-family: helvetica;
  font-weight: 300;
  font-size: 15px;
  font-style: italic;
  color: #650000;
  background-color: #a00527;
  border-radius: 15px;
  border: 3px double #f7faf7;
}
.boton_delete:hover {
  opacity: 0.6;
  text-decoration: none;
}
</style>