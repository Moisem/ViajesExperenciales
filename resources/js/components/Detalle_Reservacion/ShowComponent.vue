<template>
<div>
  <button data-toggle="modal" data-target="#guardarModal" type="button" class="justify-content-center btn btn-primary"><i class="fas fa-plus-circle">Nueva Reservacion</i></button>
          <div class="row">
            <div class="col-sm">
              <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Estado</th>
                        <th>Vuelo</th>
                        <th>Reservacion id</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="detalle in detalles" :key="detalle.id">
                        <td v-text="detalle.id"></td>
                        <td v-text="detalle.estado"></td>
                        <td v-text="detalle.vuelos_id"></td>
                        <td v-text="detalle.reservaciones_id"></td>
                    </tr>
                </tbody>
                </table>
            </div>
          </div>
          <!--  modal update -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificar Detalles</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="editarDetalle()" >
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Estado:</label>
                                        <input type="text"  v-model="detalleedit.estado" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Estado:</label>
                                        <input type="text"  v-model="detalleedit.vuelos_id" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Municipio:</label>
                                        <input type="text"  v-model="detalleedit.reservaciones_id" class="form-control" id="recipient-name">
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
                                                <h4>¿Esta seguro que quieres eliminar la reservacion del usuario con id <span class="badge badge-pill badge-danger">{{detalledelete.vuelos_id}}</span>?</h4>                         
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-danger" @click="deleteDetalle(detalledelete.id)">Eliminar</button>
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
                                <h5 class="modal-title" id="exampleModalLabel">Nuevo Detalle</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="createDetalle()">
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Estado:</label>
                                    <input type="text" v-model="newdetalle.estado" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Id Vuelo:</label>
                                    <input type="number" v-model="newdetalle.vuelos_id" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Id reservacion:</label>
                                    <input type="number" v-model="newdetalle.reservaciones_id" class="form-control" id="recipient-name">
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
                    consolo.log("ocurrio un error");
                    } else {
                console.log("Se Actualizo de manera correctamente");
                    $('#exampleModal').modal('hide')
                }
                }).catch(error=>{
                });
            },
            
            deleteid(id) {
                this.detalledelete = id;
            },
            deleteDetalle(id) {
            let urldeleteDetalle = "Detalle_reservacion/" + id;
            axios.delete(urldeleteDetalle, this.detalledelete) .then((response) => {
            if (response.data.error) {
                consolo.log("ocurrio un error");
            } else {
                console.log("se elimino de manera correctamente");
            }
            })
            .catch((error) => {});
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