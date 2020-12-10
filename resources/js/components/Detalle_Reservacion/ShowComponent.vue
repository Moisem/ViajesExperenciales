<template>
<div>
  <div>
  <button data-toggle="modal" data-target="#guardarModal" type="button" class="justify-content-center boton_create"><i class="fas fa-plus-circle">Nueva Reservacion</i></button>
      </div>    
          <div class="row">
            <div class="col-sm">
              <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Estado</th>
                        <th>Vuelo ID</th>
                        <th>Reservacion ID</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(detalle, index) in detalles" :key="index">
                        <td v-text="detalle.id"></td>
                        <td v-text="detalle.estado"></td>
                        <td v-text="detalle.vuelos_id"></td>
                        <td v-text="detalle.reservaciones_id"></td>
                        <td>
               <a data-toggle="modal" data-target="#exampleModal" type="button" class="boton_edit" v-on:click="updateid(detalle)">Editar</a>
          </td>
                    </tr>
                </tbody>
                </table>
            </div>
          </div>
          <!--  modal update -->
                    <div class="modal fade border-dark" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content border-dark">
                                <div class="modal-header border-dark">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificar Detalles</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="editarDetalle()" >
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Estado:</label>
                                       <select class="form-select" aria-label=".form-select-sm example" v-model="detalleedit.estado" name="recipient-name">
                                                <option>Activo</option>
                                                <option>Inactivo</option>
                                              </select>
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Vuelo ID:</label>
                                        <input type="text"  v-model="detalleedit.vuelos_id" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Reservacion ID:</label>
                                        <input type="text"  v-model="detalleedit.reservaciones_id" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="modal-footer border-dark">
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
                          <div class="modal fade border-dark" id="deleteReservaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                        <div class="modal-content border-dark">
                                                            <div class="modal-header border-dark">
                                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Detalle Reservaciones</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                            <div class="modal-body">
                                                <h4>¿Esta seguro que quieres eliminar la reservacion del usuario con id <span class="badge badge-pill badge-danger">{{detalledelete.vuelos_id}}</span>?</h4>                         
                                            </div>
                                            <div class="modal-footer border-dark">
                                                <button type="button" class="boton_cancel" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="boton_delete" @click="deleteDetalle(detalledelete.id)">Eliminar</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                <!-- fin modal delete -->
                <!-- modal create -->
                    <div class="modal fade border-dark" id="guardarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content border-dark">
                            <div class="modal-header border-dark">
                                <h5 class="modal-title" id="exampleModalLabel">Nuevo Detalle</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="createDetalle()">
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Estado:</label>
                                  <select class="form-select" aria-label=".form-select-sm example" v-model="newdetalle.estado" name="recipient-name">
                                                <option>Activo</option>
                                                <option>Inactivo</option>
                                              </select>
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Vuelo ID:</label>
                                    <input type="number" v-model="newdetalle.vuelos_id" placeholder="0" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Reservacion ID:</label>
                                    <input type="number" v-model="newdetalle.reservaciones_id" placeholder="0" class="form-control" id="recipient-name">
                                </div>
                                <div class="modal-footer border-dark">
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
              //
              detalles: [],
              detalledelete:[],
              detalleedit:[],
              newdetalle:{
                  estado:"",
                  vuelos_id:"",
                  reservaciones_id:"",
              }
            };
          },
          mounted() {
            this.getDetalles();
            console.log("se carga la API");
          },
          methods: {
            //función para obtener vuelos
            getDetalles: function () {
              axios.get("Detalle_reservacion").then((response) => {
                this.detalles = response.data.detalles;
                console.log(this.detalles);
              });
            },
              updateid(id){
              this.detalleedit = id;
            },
            editarDetalle(){
                let urlUpdate='Detalle_reservacion/'+ this.detalleedit.id;
                axios.put(urlUpdate,this.detalleedit).then(response =>{
                if(response.data.error){
                    toastr.error("Ocurrio un error al editar");
                    } else {
                    toastr.info("Se Actualizo de manera correctamente");
                    $('#exampleModal').modal('hide')
                }
                }).catch(error=>{
                });
            },
            
            deleteid(id) {
                this.detalledelete = id;
            },
            deleteDetalle(id, index) {
            let urldeleteDetalle = "Detalle_reservacion/" + id;
            axios.delete(urldeleteDetalle, this.detalledelete) .then((response) => {
            if (response.data.error) {
                toastr.error("Ocurrio un error al eliminar");
            } else {
               $('#deleteReservaciones').modal('hide');
                toastr.warning("se elimino de manera correctamente");
                this.reservaciones.splice(index,1);
            }
            })
            .catch((error) => {
              toastr.error("Ocurrio un error al eliminar");
            });
        },
        createDetalle(){
            let url="Detalle_reservacion";
            axios.post(url,this.newdetalle).then(response=>{
                if(response.data.error ){
                    console.log("ocurrio un error al guarda");
                }else{
                    this.newdetalle.estado="",
                    this.newdetalle.vuelos_id="",
                    this.newdetalle.reservaciones_id=""
                     $('#guardarModal').modal('hide');
                    toastr.success("La reservacion se guardo de manera correcta");
                   
                }
            }).catch(error=>{
               console.log("ocurrio un error al guarda"); 
            });
        },
          },
        };
</script>

<style >
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