<template>
<div>
  <button data-toggle="modal" data-target="#guardarModal" type="button" class="justify-content-center boton_create"><i class="fas fa-plus-circle">Nuevo Domicilio</i></button>
          <div class="row">
            <div class="col-sm" v-for="domicilio in domicilios" :key="domicilio.id">
              <div class="cards">
              <div class="services" >
                <div class="content content-1" >
                  <div class="fab fa-twitter"></div>
                  <h2>Domicilio</h2>
                  <h4 align="left">Usuarios:</h4>
                  <h3 v-text="domicilio.users_id">Estado:</h3>
                  <h4 align="left">Estado:</h4>
                  <h3 v-text="domicilio.estado">Estado:</h3>
                  <h4 align="left">Municipio:</h4>
                  <h3 v-text="domicilio.municipio"></h3>
                  <h4 align="left">Colonia:</h4>
                  <h3 v-text="domicilio.colonia"></h3>
                  <h4 align="left">Codigo Postal:</h4>
                  <h3 v-text="domicilio.codigo_postal"></h3>
                  <h4 align="left">Calle:</h4>
                  <h3 v-text="domicilio.calle"></h3>
                  <h4 align="left">Numero Interior:</h4>
                  <h3 v-text="domicilio.numero_interior"></h3>
                  <h4 align="left">Numero Exterior:</h4>
                    <h3 v-text="domicilio.numero_exterior"></h3> 
                  <h4 align="left">Referencias:</h4>
                  <p v-text="domicilio.referencias"> </p>
                  <a data-toggle="modal" data-target="#exampleModal" type="button" class="boton_edit" v-on:click="updateid(domicilio)">Editar</a>
                  <a data-toggle="modal" data-target="#deleteDomicilio" type="button" class="boton_delete" v-on:click="deleteid(domicilio)" >Eliminar</a>
                </div>
              </div>
            </div>
            </div>
          </div>
          <!--  modal update -->
                    <div class="modal fade border-dark  " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content border-dark " >
                                <div class="modal-header border-dark">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificar Vuelo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body  ">
                                    <form @submit.prevent="editarDomcilio()" >
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Estado:</label>
                                        <input type="text"  v-model="domicilioedit.estado" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Municipio:</label>
                                        <input type="text"  v-model="domicilioedit.municipio" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Colonia:</label>
                                        <input type="text"  v-model="domicilioedit.colonia" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Codigo Postal:</label>
                                        <input type="number"  v-model="domicilioedit.codigo_postal" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Calle:</label>
                                        <input type="text"  v-model="domicilioedit.calle" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Numero Exterior:</label>
                                        <input type="number"  v-model="domicilioedit.numero_exterior" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Numero Interior:</label>
                                        <input type="number"  v-model="domicilioedit.numero_interior" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Referencias:</label>
                                        <input type="text"  v-model="domicilioedit.referencias" class="form-control" id="recipient-name">
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
                          <div class="modal fade border-dark " id="deleteDomicilio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog border-dark" role="document">
                                        <div class="modal-content border-dark ">
                                                            <div class="modal-header border-dark">
                                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Domicilio</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                            <div class="modal-body">
                                                <h4>¿Esta seguro que quieres eliminar el domcilio del usuario con id <span class="badge badge-pill badge-danger">{{domiciliodelete.users_id}}</span>?</h4>                         
                                            </div>
                                            <div class="modal-footer border-dark">
                                                <button type="button" class="boton_cancel" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="boton_delete" @click="deleteDomicilio(domiciliodelete.id)">Eliminar</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                <!-- fin modal delete -->
                <!-- modal create -->
                    <div class="modal fade border-dark " id="guardarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header border-dark">
                                <h5 class="modal-title" id="exampleModalLabel">Nuevo Domcilio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body border-dark">
                                <form @submit.prevent="createDomcilio()">
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Id del Usuario:</label>
                                    <input type="number" v-model="newdomicilio.users_id" class="form-control" placeholder="1" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Estado:</label>
                                    <input type="text" v-model="newdomicilio.estado" class="form-control" placeholder="Estado" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Municipio:</label>
                                    <input type="text" v-model="newdomicilio.municipio" class="form-control" placeholder="Municipio" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Colonia:</label>
                                    <input type="text" v-model="newdomicilio.colonia" class="form-control" placeholder="Colonia" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Codigo Postal:</label>
                                    <input type="number" v-model="newdomicilio.codigo_postal" class="form-control" placeholder="50000" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Calle:</label>
                                    <input type="text" v-model="newdomicilio.calle" class="form-control" placeholder="Calle" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Numero Interior:</label>
                                    <input type="number" v-model="newdomicilio.numero_interior" placeholder="0" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Numero Exterior:</label>
                                    <input type="number" v-model="newdomicilio.numero_exterior" placeholder="0" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Referencias:</label>
                                    <input type="text" v-model="newdomicilio.referencias" placeholder="Ejemplo: Casa de dos pisos" class="form-control" id="recipient-name">
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
              domicilios: [],
              //
              domiciliodelete:[],
              //
              domicilioedit:[],
              //
              newdomicilio:{
                estado:"",
                municipio:"",
                colonia:"",
                codigo_postal:"",
                calle:"",
                numero_interior:"",
                numero_exterior:"",
                referencias:"",
                users_id:"",
              }
            };
          },
          mounted() {
            this.getDomicilio();
            console.log("se carga la API");
          },
          methods: {
            //función para obtener domicilios
            getDomicilio: function () {
              axios.get("Domicilio").then((response) => {
                this.domicilios = response.data.domicilios;
                console.log(this.domicilios);
              });
            },
            //obtener id 
              updateid(id){
              this.domicilioedit = id;
            },
            //editar domcilio
            editarDomcilio(){
                let urlUpdate='Domicilio/'+ this.domicilioedit.id;
                axios.put(urlUpdate,this.domicilioedit).then(response =>{
                if(response.data.error){
                    consolo.log("ocurrio un error");
                    } else {
                console.log("Se Actualizo de manera correctamente");
                    $('#exampleModal').modal('hide')
                }
                }).catch(error=>{
                });
            },
            //obtener id
            deleteid(id) {
                this.domiciliodelete = id;
            },
            //eliminar domicilio
            deleteDomicilio(id) {
            let urldeleteDomcilio = "Domicilio/" + id;
            axios.delete(urldeleteDomcilio, this.domiciliodelete) .then((response) => {
            if (response.data.error) {
                consolo.log("ocurrio un error");
            } else {
                console.log("se elimino de manera correctamente");
            }
            })
            .catch((error) => {});
        },
        //nuevo domicilio
        createDomcilio(){
            let url="Domicilio";
            axios.post(url,this.newdomicilio).then(response=>{
                if(response.data.error ){
                    console.log("ocurrio un error al guarda");
                }else{
                    this.newdomicilio.estado="",
                    this.newdomicilio.municipio="",
                    this.newdomicilio.colonia="",
                    this.newdomicilio.codigo_postal="",
                    this.newdomicilio.calle="",
                    this.newdomicilio.numero_interior="",
                    this.newdomicilio.numero_exterior="",
                    this.newdomicilio.referencias="",
                    this.newdomicilio.users_id="",
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