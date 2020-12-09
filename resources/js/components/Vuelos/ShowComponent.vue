<template>
  <div>
      <button data-toggle="modal" data-target="#guardarModal" type="button" class="boton_create"><i class="fas fa-plus-circle">Insertar Vuelo</i></button>
    <div class="row">
            <div class="col-sm"  v-for="vuelo in vuelos" :key="vuelo.id">
                <div  class="card text-center text-white  bg-dark mb-3" style="width: 18rem; margin-top: 40px" >
                    <div class="card-body text-white">
                        <h5 class="card-title text-white" v-text="vuelo.pais"></h5>
                        <h6 class="card-subtitle mb-2 text-white" v-text="vuelo.ciudad"></h6>
                        <p class="card-text text-white" v-text="vuelo.descripcion"></p>
                        <a data-toggle="modal" data-target="#exampleModal" type="button" class="boton_edit" v-on:click="updateid(vuelo)">Editar</a>
                        <a data-toggle="modal" data-target="#deletevuelos" type="button" class="boton_delete" v-on:click="deleteid(vuelo)" >Eliminar</a>
                    </div>  
                </div>
            </div>   
    </div>
    <!--  modal update -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificar Vuelo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="editarVuelos()" >
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Vuelos:</label>
                                        <input type="text"  v-model="vueloedit.pais" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left" for="recipient-name" class="col-form-label">Ciudad:</label>
                                        <input type="text"  v-model="vueloedit.ciudad" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left" for="recipient-name" class="col-form-label">Descripcion:</label>
                                        <input type="text"  v-model="vueloedit.descripcion" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="boton_cancel" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" name="action" class="boton_edit">Actualizar</button>                           
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- fin modal update -->
                            <!-- modal delete -->
                            <div class="modal fade" id="deletevuelos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Vuelo</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                            <div class="modal-body">
                                                <h4>¿Quieres eliminar el vuelo a <span class="badge badge-pill badge-primary">{{vuelodelete.pais}}</span>?</h4>
                                                <!--{{materiadelete}}-->                            
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="boton_cancel" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="boton_delete" @click="deleteVuelo(vuelodelete.id)">Eliminar</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <!-- fin modal delete -->
                    <!-- modal create -->
                    <div class="modal fade" id="guardarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nuevo Vuelo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="createVuelo()" >    
                                <div class="mb-3">
                                    <label align="left" for="recipient-name" class="col-form-label">Pais:</label>
                                    <input type="text" v-model="newvuelo.pais" :state="false" class="form-control" id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label align="left" for="recipient-name" class="col-form-label">Ciudad:</label>
                                    <input type="text" v-model="newvuelo.ciudad" class="form-control" id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label align="left" for="recipient-name" class="col-form-label">Descripcion:</label>
                                    <input type="text" v-model="newvuelo.descripcion" class="form-control" id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label align="left" for="recipient-name" class="col-form-label">URL de Imagen:</label>
                                    <input type="text" v-model="newvuelo.img" class="form-control" id="recipient-name">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="boton_cancel" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" name="action" class="boton_update">Guardar</button>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>
                </div>
                <!-- fin modal create -->
</div>
</template>
<script>
export default {
  data() {
    return {
      //show vuelos
      vuelos: [],
      //update vuelos
      vueloedit: [],
      //delete vuelos
      vuelodelete: [],
      //nuevo vuelo
      newvuelo: {
        pais: "",
        ciudad: "",
        descripcion: "",
        img: "",
      },
      errors:[],
    };
  },
  mounted() {
    this.getVuelos();
    console.log("se carga la API");
  },
  computed:{
      comprobar(){
         return this.newvuelo.pais.length = null ? false : true
      }
  },
  methods: {
    //función para obtener vuelos
    getVuelos: function () {
      axios.get("Vuelos").then((response) => {
        this.vuelos = response.data.vuelos;
        console.log(this.vuelos);
      });
    },
    //función para obtener el id
    updateid(id) {
      this.vueloedit = id;
    },
    //función para editar Vuelos
    editarVuelos() {
      let urlUpdate = "Vuelos/" + this.vueloedit.id;
      axios
        .put(urlUpdate, this.vueloedit)
        .then((response) => {
          if (response.data.error) {
            consolo.log("ocurrio un error");
          } else {
            console.log("Se Actualizo de manera correctamente");
            $("#exampleModal").modal("hide");
          }
        })
        .catch((error) => {});
    },
    //función para eliminir Vuelos
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
            $("#deletevuelos").modal("hide");
          }
        })
        .catch((error) => {});
    },
    //nuevo vuelo
    createVuelo() {
      let url = "Vuelos";
      axios.post(url, this.newvuelo).then((response) => {
            if (response.data.error) {
            console.log("ocurrio un error al guarda");
          } else {
            (this.newvuelo.pais = ""),
              (this.newvuelo.ciudad = ""),
              (this.newvuelo.descripcion = ""),
              (this.newvuelo.img = "");
            $("#guardarModal").modal("hide");
          }
        })
        .catch((error) => {
          console.log("ocurrio un error al guarda");
        });
    },
  },
};
</script>
<style scoped>
.cards h2.header {
  font-size: 40px;
  margin: 0 0 30px 0;
  text-transform: uppercase;
  letter-spacing: 1px;
}
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
.boton_create {
  text-decoration: none;
  padding: 3px;
  padding-left: 5px;
  padding-right: 5px;
  font-family: helvetica;
  font-weight: 300;
  font-size: 15px;
  font-style: italic;
  color: #f5f4fa;
  background-color: #66a9ec;
  border-radius: 15px;
  border: 3px double #f7faf7;
}
.boton_create:hover {
  opacity: 0.6;
  text-decoration: none;
}
.boton_cancel {
  text-decoration: none;
  padding: 3px;
  padding-left: 5px;
  padding-right: 5px;
  font-family: helvetica;
  font-weight: 300;
  font-size: 15px;
  font-style: italic;
  color: #202020;
  background-color: #eaec66;
  border-radius: 15px;
  border: 3px double #f7faf7;
}
.boton_cancel:hover {
  opacity: 0.6;
  text-decoration: none;
}
.boton_update {
  text-decoration: none;
  padding: 3px;
  padding-left: 5px;
  padding-right: 5px;
  font-family: helvetica;
  font-weight: 300;
  font-size: 15px;
  font-style: italic;
  color:  #3003cf;
  background-color: #f0f0ef;
  border-radius: 15px;
  border: 3px double #3003cf;
}
.boton_update:hover {
  opacity: 0.6;
  text-decoration: none;
}
</style>