<template>
<div>
  <button data-toggle="modal" data-target="#guardarModal" type="button" class="justify-content-center btn btn-primary"><i class="fas fa-plus-circle">Nueva Reservacion</i></button>
          <div class="row">
            <div class="col-sm" v-for="reservacion in reservaciones" :key="reservacion.id">
              <div class="cards">
              <div class="services" >
                <div class="content content-1" >
                  <div class="fab fa-twitter"></div>
                  <h2>Reservaciones</h2>
                  <h4 align="left">Usuarios:</h4>
                  <h3 v-text="reservacion.users_id">Estado:</h3>
                  <h4 align="left">Estado:</h4>
                  <h3 v-text="reservacion.costo">Estado:</h3>
                  <h4 align="left">Municipio:</h4>
                  <h3 v-text="reservacion.fecha_salida"></h3>
                  <h4 align="left">Colonia:</h4>
                  <h3 v-text="reservacion.fecha_salida"></h3>
                  <h4 align="left">Codigo Postal:</h4>
                  <h3 v-text="reservacion.acompañantes"></h3>
                  <a data-toggle="modal" data-target="#exampleModal" type="button" class="boton_edit" v-on:click="updateid(domicilio)">Editar</a>
                  <a data-toggle="modal" data-target="#deleteReservaciones" type="button" class="boton_delete" v-on:click="deleteid(domicilio)" >Eliminar</a>
                </div>
              </div>
            </div>
            </div>
          </div>
          <!--  modal update -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificar Reservacion</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="editarReservacion()" >
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Estado:</label>
                                        <input type="text"  v-model="reservacionedit.users_id" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Estado:</label>
                                        <input type="text"  v-model="reservacionedit.costo" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Municipio:</label>
                                        <input type="text"  v-model="reservacionedit.fecha_salida" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Colonia:</label>
                                        <input type="text"  v-model="reservacionedit.fecha_regreso" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Codigo Postal:</label>
                                        <input type="text"  v-model="reservacionedit.acompañantes" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" name="action" class="btn btn-primary">Actualizar</button>                           
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
          <!-- fin modal update -->
          <!-- modal delete -->
                          <div class="modal fade" id="deleteReservaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Reservaciones</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                            <div class="modal-body">
                                                <h4>¿Esta seguro que quieres eliminar la reservacion del usuario con id <span class="badge badge-pill badge-danger">{{reservaciondelete.users_id}}</span>?</h4>                         
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-danger" @click="deleteReservaciones(reservaciondelete.id)">Eliminar</button>
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
                                <h5 class="modal-title" id="exampleModalLabel">Nueva Reservacion</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="createReservaciones()">
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Id del Usuario:</label>
                                    <input type="text" v-model="newreservacion.users_id" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Costo:</label>
                                    <input type="text" v-model="newreservacion.costo" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">fecha salida:</label>
                                    <input type="date" v-model="newreservacion.fecha_salida" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">fecha regreso:</label>
                                    <input type="date" v-model="newreservacion.fecha_regreso" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Acompañantes:</label>
                                    <input type="text" v-model="newreservacion.acompañantes" class="form-control" id="recipient-name">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" name="action" class="btn btn-primary">Guardar</button>
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
              reservaciones: [],
              reservaciondelete:[],
              reservacionedit:[],
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
            this.getReservaciones();
            console.log("se carga la API");
          },
          methods: {
            //función para obtener vuelos
            getReservaciones: function () {
              axios.get("Reservaciones").then((response) => {
                this.reservaciones = response.data.reservaciones;
                console.log(this.reservaciones);
              });
            },
              updateid(id){
              this.reservacionedit = id;
            },
            editarReservacion(){
                let urlUpdate='Reservaciones/'+ this.reservacionedit.id;
                axios.put(urlUpdate,this.reservacionedit).then(response =>{
                if(response.data.error){
                    consolo.log("ocurrio un error");
                    } else {
                console.log("Se Actualizo de manera correctamente");
                    $('#exampleModal').modal('hide')
                }
                }).catch(error=>{
                });
            },
            
            deleteid(id) {
                this.reservaciondelete = id;
            },
            deleteReservaciones(id) {
            let urldeleteReservaciones = "Reservaciones/" + id;
            axios.delete(urldeleteReservaciones, this.reservaciondelete) .then((response) => {
            if (response.data.error) {
                consolo.log("ocurrio un error");
            } else {
                console.log("se elimino de manera correctamente");
            }
            })
            .catch((error) => {});
        },
        createReservaciones(){
            let url="Reservaciones";
            axios.post(url,this.newreservacion).then(response=>{
                if(response.data.error ){
                    console.log("ocurrio un error al guarda");
                }else{
                    thi.newreservacion.costo="",
                    thi.newreservacion.fecha_salida="",
                    thi.newreservacion.fecha_regreso="",
                    thi.newreservacion.acompañantes="",
                    thi.newreservacion.users_id=""
                    $('#guardarModal').modal('hide');
                }
            }).catch(error=>{
               console.log("ocurrio un error al guarda"); 
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
.boton_edit{
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
  .boton_edit:hover{
    opacity: 0.6;
    text-decoration: none;
  }
  .boton_delete{
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
  .boton_delete:hover{
    opacity: 0.6;
    text-decoration: none;
    }
</style>