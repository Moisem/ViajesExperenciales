<template>
  <div>
    <div >
      <table class="table table-dark table-striped">
        <tr>
          <th>Nombre</th>
          <th>Apellido  Paterno</th>
          <th>Apellido  Materno</th>
          <th>Email</th>
          <th>Telefono</th> 
          <th>Editar</th>
        </tr>
        <tr v-for="usuario in usuarios" :key="usuario.id">
          <td v-text="usuario.name"></td>
          <td v-text="usuario.apellido_paterno"></td>
          <td v-text="usuario.apellido_materno"></td>
          <td v-text="usuario.email"></td>
          <td v-text="usuario.telefono"></td>
          <td>
               <a data-toggle="modal" data-target="#exampleModal" type="button" class="boton_edit" v-on:click="updateid(usuario)">Editar</a>
          </td>
        </tr>
      </table>
    </div>
    <!--  modal update -->
                    <div class="modal fade border-dark " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content border-dark ">
                                <div class="modal-header border-dark ">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificar Perfil de Usuario</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="editarUsuario()" >
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Nombre:</label>
                                        <input type="text"  v-model="usuarioedit.name" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left" for="recipient-name" class="col-form-label">Apellido Paterno:</label>
                                        <input type="text"  v-model="usuarioedit.apellido_paterno" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left" for="recipient-name" class="col-form-label">Apellido Materno:</label>
                                        <input type="text"  v-model="usuarioedit.apellido_materno" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left" for="recipient-name" class="col-form-label">Telefono:</label>
                                        <input type="text"  v-model="usuarioedit.telefono" class="form-control" id="recipient-name">
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
  </div>
</template> 
<script>
 export default {
          data() {
            return {
              usuarios: [],
              usuarioedit: [],
            };
          },
          mounted() {
            this.getUsuarios();
            console.log("se carga la API");
          },
          //mostrar usuarios
          methods: {
            getUsuarios: function () {
              axios.get("Usuario").then((response) => {
                this.usuarios = response.data.usuarios;
                console.log(this.usuarios);
              });
            },
            // obtener id
            updateid(id){
              this.usuarioedit = id;
            },
            //editar usuario
            editarUsuario(){
                let urlUpdate='Usuario/'+ this.usuarioedit.id;
                axios.put(urlUpdate,this.usuarioedit).then(response =>{
                if(response.data.error){
                    toastr.error("Ocurrio un error al actualizar");
                    } else {
                console.log("Se Actualizo de manera correctamente");
                    toastr.info("Se actualizo de manera correcta");
                    $('#exampleModal').modal('hide')
                }
                }).catch(error=>{
                });
            },
            
          },
        };
</script>
<style>
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
</style>