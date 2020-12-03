<template>
  <div>
    <button data-toggle="modal" data-target="#guardarModal" type="button" class="justify-content-center btn btn-primary">
      Insertar Vuelo
    </button>
    <div class="row">
            <div class="col-sm"  v-for="vuelo in vuelos" :key="vuelo.id">
                <div class="card text-center" style="width: 18rem; margin-top: 40px" >
                    <div class="card-body">
                        <h5 class="card-title" v-text="vuelo.pais"></h5>
                        <h6 class="card-subtitle mb-2 text-muted" v-text="vuelo.ciudad"></h6>
                        <p class="card-text " v-text="vuelo.descripcion"></p>
                        <a data-toggle="modal" data-target="#exampleModal" type="button" class="boton_edit" v-on:click="updateid(vuelo)">Editar</a>
                        <a data-toggle="modal" data-target="#deletevuelos" type="button" class="boton_delete" v-on:click="deleteid(vuelo)" >Eliminar</a>
                    </div>
                    <!--  modal update -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Midificaion de vuelo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="editarVuelos()" >
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Vuelos:</label>
                                        <input type="text"  v-model="vueloedit.pais" class="form-control" id="recipient-name">
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
                            <div class="modal fade" id="deletevuelos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Materia</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                            <div class="modal-body">
                                                <h4>¿Esta seguro que quieres eliminar la materia <span class="badge badge-pill badge-warning">{{vuelodelete.pais}}</span>?</h4>
                                                <!--{{materiadelete}}-->                            
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-danger" @click="deleteVuelo(vuelodelete.id)">Eliminar</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <!-- fin modal delete -->
                    
                </div>
            </div>   
    </div>
</div>
</template>
<script>
    export default {
        data (){
            return{
                //show vuelos
                vuelos: [],
                //update vuelos
                vueloedit: [],
                //delete vuelos
                vuelodelete: [],
                }
            },
        mounted() {
            this.getVuelos();
            console.log('se carga la API')
        },
        methods: {
            //función para obtener vuelos
            getVuelos: function () {
                 axios.get('Vuelos').then(response => {
                    this.vuelos = response.data.vuelos
                    console.log (this.vuelos);
                });
            },
            //función para obtener el id
            updateid(id){
                this.vueloedit = id;
            },
            //función para editar Vuelos
            editarVuelos(){
                let urlUpdate='Vuelos/'+ this.vueloedit.id;
                axios.put(urlUpdate,this.vueloedit).then(response =>{
                if(response.data.error){
                    toastr.error(response.data.mensaje);
                }else{
                    toastr.success(response.data.mensaje);
                    $('#exampleModal').modal('hide')
                }
                }).catch(error=>{
                });
            },
            
            deleteid(id) {
                this.vuelodelete = id;
            },
            deleteVuelo(id) {
            let urldeleteVuelo = "Vuelos/" + id;
            axios .delete(urldeleteVuelo, this.vuelodelete) .then((response) => {
            if (response.data.error) {
                consolo.log("ocurrio un error");
            } else {
                console.log("se elimino de manera correctamente");
            }
            })
            .catch((error) => {});
        },
        }
    }
</script>
<style scoped>
.cards h2.header {
  font-size: 40px;
  margin: 0 0 30px 0;
  text-transform: uppercase;
  letter-spacing: 1px;
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