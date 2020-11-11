<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .formulario-viaje {
            width: 100%;
            padding: 30px;
            background-color: #2E2E2E;
            color:#fff;
            border-radius: 4px;
        }

        .form-viaje input {
            width: 100%;
            border-radius: 4px;
            border: 2px solid #FFB202;
        }

        .form-registro {
            width: 300px;

            display: inline-block;
        }

        .formulario {
            color: #fff;
            background-color: #2E2E2E;
        }

        .formulario input {
            width: 100%;
            border-radius: 5px;
        }

        .modal-title {
            color: #fff;
        }

        .btn-blanco {
            background-color: #FFB202;
            color: #fff;
            font-size: 15px;
            padding: 15px 26px;
            width: 100%;
            border-radius: 5px;
            display: inline-block;
        }

        .btn-blanco:hover {
            background-color: #FFE01B;
            color: #fff;
        }

        .modal-content {
            background-color: #2E2E2E;
        }

        .contacto {
            width: 80%;
            background-color: #2E2E2E;
            color: #fff;
            padding: 20px;
            margin-bottom: 70px;
        }

        .form-contacto input {
            width: 100%;
            border-radius: 4px;
            border: 2px solid #FFB202;
            height: 50px;
        }

        .form-contacto textarea {
            width: 100%;
            height: 80px;
            border-radius: 4px;
            border: 2px solid #FFB202;
        }
    </style>
</head>

<body>
    <div class="row content-row">
        <div class="col-sm-4">
            <div class="form-registro">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h5 class="modal-title m-auto" id="exampleModalLabel">Unirse</h5>
                            <button type="button" class="close btn-close ml-0" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body content-right">
                            <form action="" method="Post" class="formulario">
                                <div class="form-section">
                                    <label class="label">Nombre de usuario</label>
                                    <br>
                                    <input type="text" id="usu" name="nombreusu" placeholder="Nombre de usuario" required>
                                </div>
                                <div class="form-section ">
                                    <label>Nombre</label>
                                    <br>
                                    <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                                </div>
                                <div class="form-section">
                                    <label>Apellidos</label>
                                    <br>
                                    <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" required>
                                </div>
                                <div class="form-section">
                                    <label>Telefono</label>
                                    <br>
                                    <input type="text" id="telefono" name="telefono" placeholder="telefono" required>
                                </div>
                                <div class="form-section">
                                    <label>Correo</label>
                                    <br>
                                    <input type="text" id="correo" name="correo" placeholder="Correo electrinico" required>
                                </div>
                                <div class="form-section">
                                    <label>Contraseña</label>
                                    <br>
                                    <input type="password" id="pass" name="pass" placeholder="Contraseña" required>
                                </div>
                                <div class="form-section">
                                    <input type="checkbox" id="terminos" name="terminos" value="Acepto" required>
                                    <p>Estoy de acuerdo con terminos y condiciones</p>
                                </div>
                                <div class="form-section buscar">
                                    <input type="submit" name="" value="Registrar" class="btn btn-blanco">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-sm-4">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title m-auto" id="exampleModalLabel1">Iniciar Sesión</h5>
                        <button type="button" class="close btn-close ml-0" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="logueo.php" method="Post" class="formulario text-center">

                            <div class="form-section">
                                <label>Usuario</label>
                                <br>
                                <input type="text" name="usuario" placeholder="Usuario" required>
                            </div>
                            <div class="form-section">
                                <label>Contraseña</label>
                                <br>
                                <input type="password" name="pass" placeholder="Contraseña" required>
                            </div>
                            <div class="form-section buscar">
                                <br>
                                <input type="submit" name="" value="Iniciar Sesión" class="btn btn-blanco">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="contacto">
                <form action="" method="Post" class="form-contacto	">
                    <h5 class="text-center"> Contactanos</h5>
                    <div class="form-section ">
                        <br>
                        <input type="text" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-section">
                        <br>
                        <input type="text" name="apellidos" placeholder="Apellidos">
                    </div>
                    <div class="form-section">
                        <br>
                        <input type="text" name="correo" placeholder="Correo electrinico">
                    </div>
                    <div class="form-section">
                        <br>
                        <textarea class="Comentarios-contacto" name="comentarios" placeholder="Comentarios"></textarea>
                    </div>
                    <div class="form-section buscar">
                        <br>
                        <input type="submit" name="" value="Enviar" class="btn btn-blanco">
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
    <div class="row content-row">
        <div class="col-sm-4">
            <div class="formulario-viaje">
                <form action="reservacion.php" method="Post" class="form-viaje">
                    <p class="h3 text-center"> Reservar</p>
                    <div class="form-section ">

                        <input type="hidden" name="viaje" value="Isla arena, Campeche">
                        <br>
                        <input type="text" name="nombre" placeholder="Nombre" required="">
                    </div>
                    <div class="form-section">
                        <br>
                        <input type="text" name="apellidos" placeholder="Apellidos" required="">
                    </div>
                    <div class="form-section">
                        <br>
                        <input type="text" name="correo" placeholder="Correo electrinico" required="">
                    </div>
                    <div class="form-section">
                        <br>
                        <input type="text" id="telefono" placeholder="Telefono" name="telefono" required="">
                    </div>
                    <br>
                    <div class="form-section">
                        <input type="date" name="fecha" required="">
                    </div>
                    <br>
                    <div class="form-section">
                        <label>
                            <p>¿Cuantos viajan?</p>
                        </label>
                        <select name="personas" id="cant-personas" onclick="recargar();">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-section">
                        <p id="precio">$1,499 MXN por personas</p>
                    </div>
                    <div class="form-section buscar">
                        <input type="submit" name="" value="Reservar" class="btn btn-blanco">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>