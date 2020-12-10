<template>
<div>
  <button data-toggle="modal" data-target="#guardarModal" type="button" class="justify-content-center boton_create"><i class="fas fa-plus-circle">Nueva Reservacion</i></button>
          <div class="row">
            <div class="col-sm" v-for="(reservacion, index) in reservaciones" :key="index">
              <div class="cards">
              <div class="services" >
                <div class="content content-1" >
                  <div class="fab fa-twitter"></div>
                  <h2>Reservaciones</h2>
                  <h4 align="left">Usuario:</h4>
                  <h3 v-text="reservacion.users_id">Estado:</h3>
                  <h4 align="left">Costo:</h4>
                  <h3 v-text="reservacion.costo">Estado:</h3>
                  <h4 align="left">Fecha de salida:</h4>
                  <h3 v-text="reservacion.fecha_salida"></h3>
                  <h4 align="left">Fecha de regreso:</h4>
                  <h3 v-text="reservacion.fecha_regreso"></h3>
                  <h4 align="left">Acompañantes:</h4>
                  <h3 v-text="reservacion.acompañantes"></h3>
                  <a data-toggle="modal" data-target="#exampleModal" type="button" class="boton_edit" v-on:click="updateid(reservacion)">Editar</a>
                  <a data-toggle="modal" data-target="#deleteReservaciones" type="button" class="boton_delete" v-on:click="deleteid(reservacion)" >Eliminar</a>
                </div>
              </div>
            </div>
            </div>
          </div>
          <!--  modal update -->
                    <div class="modal fade border-dark " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content border-dark ">
                                <div class="modal-header border-dark ">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificar Reservacion</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="editarReservacion()" >
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">ID de Usuario:</label>
                                        <input type="text"  v-model="reservacionedit.users_id" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Costo:</label>
                                        <input type="text"  v-model="reservacionedit.costo" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Fecha Salidad:</label>
                                        <input type="text"  v-model="reservacionedit.fecha_salida" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Fecha Regreso:</label>
                                        <input type="text"  v-model="reservacionedit.fecha_regreso" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Acompañantes:</label>
                                        <input type="text"  v-model="reservacionedit.acompañantes" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="modal-footer border-dark ">
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
                          <div class="modal fade border-dark " id="deleteReservaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                        <div class="modal-content border-dark ">
                                                            <div class="modal-header border-dark ">
                                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Reservaciones</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                            <div class="modal-body">
                                                <h4>¿Esta seguro que quieres eliminar la reservacion del usuario con id <span class="badge badge-pill badge-danger">{{reservaciondelete.users_id}}</span>?</h4>                         
                                            </div>
                                            <div class="modal-footer border-dark ">
                                                <button type="button" class="boton_cancel" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="boton_delete" @click="deleteReservaciones(reservaciondelete.id)">Eliminar</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                <!-- fin modal delete -->
                <!-- modal create -->
                    <div class="modal fade border-dark " id="guardarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content border-dark ">
                            <div class="modal-header border-dark ">
                                <h5 class="modal-title" id="exampleModalLabel">Nueva Reservacion</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="createReservaciones()">
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">ID del Usuario:</label>
                                    <input type="number" v-model="newreservacion.users_id" class="form-control" placeholder="1" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Costo:</label>
                                    <input type="number" v-model="newreservacion.costo" class="form-control" placeholder="2000" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Fecha salida:</label>
                                    <input type="date" v-model="newreservacion.fecha_salida" class="form-control"  id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Fecha regreso:</label>
                                    <input type="date" v-model="newreservacion.fecha_regreso" class="form-control"  id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Acompañantes:</label>
                                    <input type="number" v-model="newreservacion.acompañantes" placeholder="5" class="form-control" id="recipient-name">
                                </div>
                                <div class="modal-footer border-dark ">
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
import toastr from 'toastr';
        export default {
          data() {
            return {
              //
              reservaciones: [],
              //
              reservaciondelete:[],
              //
              reservacionedit:[],
              //
              newreservacion:{
                  costo:"",
                  fecha_salida:"",
                  fecha_regreso:"",
                  acompañantes:"",
                  users_id:"",
              }
            };
          },
          mounted() {
            this.getReservacion();
            console.log("se carga la API");
          },
          methods: {
            //función para obtener Reservaciones
            getReservacion: function () {
              axios.get("Reservaciones").then((response) => {
                this.reservaciones = response.data.reservaciones;
                console.log(this.reservaciones);
              });
            },
            //obtener id
              updateid(id){
              this.reservacionedit = id;
            },
            //editar reservaciones
            editarReservacion(){
                let urlUpdate='Reservaciones/'+ this.reservacionedit.id;
                axios.put(urlUpdate,this.reservacionedit).then(response =>{
                if(response.data.error){
                      toastr.error("Ocurrio un error al actualizar");
                    } else {
                      toastr.info("Se actualizo de manera correcta");
                      $('#exampleModal').modal('hide');
                }
                }).catch(error=>{
                });
            },
            //obtener id
            deleteid(id) {
                this.reservaciondelete = id;
            },
            //eliminar reservaciones
            deleteReservaciones(id, index) {
            let urldeleteReservaciones = "Reservaciones/" + id;
            axios.delete(urldeleteReservaciones, this.reservaciondelete) .then((response) => {
            if (response.data.error) {
               toastr.error("Ocurrio un error al eliminar la reservacion");
            } else {
                $('#deleteReservaciones').modal('hide');
                toastr.warning("Se elimino de manera correctamente");
                this.reservaciones.splice(index,1);
            }
            })
            .catch((error) => {
              toastr.error("Ocurrio un error al eliminar la reservacion");
            });
        },
        //nueva reservacion 
        createReservaciones(){
            let url="Reservaciones";
            axios.post(url,this.newreservacion).then(response=>{
                if(response.data.error ){
                    toastr.error("No se pudo guardar la reservación");
                }else{
                    this.newreservacion.costo="",
                    this.newreservacion.fecha_salida="",
                    this.newreservacion.fecha_regreso="",
                    this.newreservacion.acompañantes="",
                    this.newreservacion.users_id=""
                    $('#guardarModal').modal('hide');
                    toastr.success("La reservacion se guardo de manera correcta");
                }
            }).catch(error=>{
              toastr.error("No se pudo guardar la reservacion");
            });
        },
          },
        };
</script>

<style >

@import url("https://fonts.googleapis.com/css?family=Montserrat:400,800|Poppins&display=swap");
.cards {
  max-width: 400px;
  margin: 0 auto;
  text-align: center;
  padding: 10px;
}
.cards h2.header {
  font-size: 20px;
  margin: 0 0 10px 0;
  text-transform: uppercase;
  letter-spacing: 1px;
}
.services {
  display: flex;
  align-items: center;
}
.content {
  display: flex;
  flex-wrap: wrap;
  flex: 1;
  margin: 20px;
  padding: 20px;
  border: 2px solid black;
  border-radius: 4px;
  transition: all 0.3s ease;
}
.content .fab {
  font-size: 70px;
  margin: 5px 0;
}
.content > * {
  flex: 1 1 100%;
}
.content h2 {
  font-size: 12px;
  margin: 8px 0;
  letter-spacing: 1px;
  text-transform: uppercase;
}
.content h4 {
  font-size: 10px;
  margin: 5px 0;
  letter-spacing: 1px;
  text-transform: uppercase;
}
.content h3 {
  font-size: 9px;
  margin: 3px 0;
  letter-spacing: 1px;
  text-transform: uppercase;
}
.content p {
  font-size: 9px;
  font-family: "Poppins", sans-serif;
  text-transform: uppercase;
}
.content a:hover {
  border-radius: 4px;
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