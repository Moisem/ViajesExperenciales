<template>
  <div>
    <div class="table-users">
      <div class="header">Usuarios</div>

      <table cellspacing="0">
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

          <td></td>
        </tr>
      </table>
    </div>
    <!--  modal update -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
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
          methods: {
            getUsuarios: function () {
              axios.get("Usuario").then((response) => {
                this.usuarios = response.data.usuarios;
                console.log(this.usuarios);
              });
            },
            updateid(id){
              this.usuarioedit = id;
            },
            editarUsuario(){
                let urlUpdate='Usuario/'+ this.usuarioedit.id;
                axios.put(urlUpdate,this.usuarioedit).then(response =>{
                if(response.data.error){
                    consolo.log("ocurrio un error");
                    } else {
                console.log("Se Actualizo de manera correctamente");
                    $('#exampleModal').modal('hide')
                }
                }).catch(error=>{
                });
            },
            
          },
        };
</script>
<style>

.header {
  background-color: #327a81;
  color: white;
  font-size: 1.5em;
  padding: 1rem;
  text-align: center;
  text-transform: uppercase;
}

img {
  border-radius: 50%;
  height: 60px;
  width: 60px;
}

.table-users {
  border: 1px solid #327a81;
  border-radius: 10px;
  box-shadow: 3px 3px 0 rgba(0, 0, 0, 0.1);
  max-width: calc(100% - 2em);
  margin: 1em auto;
  overflow: hidden;
  width: 800px;
}

table {
  width: 100%;
}
table td,
table th {
  color: #2b686e;
  padding: 10px;
}
table td {
  text-align: center;
  vertical-align: middle;
}
table td:last-child {
  font-size: 0.95em;
  line-height: 1.4;
  text-align: left;
}
table th {
  background-color: #daeff1;
  font-weight: 300;
}
table tr:nth-child(2n) {
  background-color: white;
}
table tr:nth-child(2n + 1) {
  background-color: #edf7f8;
}

@media screen and (max-width: 700px) {
  table,
  tr,
  td {
    display: block;
  }

  td:first-child {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    width: 100px;
  }
  td:not(:first-child) {
    clear: both;
    margin-left: 100px;
    padding: 4px 20px 4px 90px;
    position: relative;
    text-align: left;
  }
  td:not(:first-child):before {
    color: #91ced4;
    content: "";
    display: block;
    left: 0;
    position: absolute;
  }
  td:nth-child(2):before {
    content: "Name:";
  }
  td:nth-child(3):before {
    content: "Email:";
  }
  td:nth-child(4):before {
    content: "Phone:";
  }
  td:nth-child(5):before {
    content: "Comments:";
  }

  tr {
    padding: 10px 0;
    position: relative;
  }
  tr:first-child {
    display: none;
  }
}
@media screen and (max-width: 500px) {
  .header {
    background-color: transparent;
    color: white;
    font-size: 2em;
    font-weight: 700;
    padding: 0;
    text-shadow: 2px 2px 0 rgba(0, 0, 0, 0.1);
  }

  img {
    border: 3px solid;
    border-color: #daeff1;
    height: 100px;
    margin: 0.5rem 0;
    width: 100px;
  }

  td:first-child {
    background-color: #c8e7ea;
    border-bottom: 1px solid #91ced4;
    border-radius: 10px 10px 0 0;
    position: relative;
    top: 0;
    -webkit-transform: translateY(0);
    transform: translateY(0);
    width: 100%;
  }
  td:not(:first-child) {
    margin: 0;
    padding: 5px 1em;
    width: 100%;
  }
  td:not(:first-child):before {
    font-size: 0.8em;
    padding-top: 0.3em;
    position: relative;
  }
  td:last-child {
    padding-bottom: 1rem !important;
  }

  tr {
    background-color: white !important;
    border: 1px solid #6cbec6;
    border-radius: 10px;
    box-shadow: 2px 2px 0 rgba(0, 0, 0, 0.1);
    margin: 0.5rem 0;
    padding: 0;
  }

  .table-users {
    border: none;
    box-shadow: none;
    overflow: visible;
  }
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