<?php
session_start();
//echo "<pre>"; propia
//print_r($_SESSION);
//echo "</pre>";
//Bloque de seguridad
include_once 'controladores/ManejoSesiones/BloqueDeSeguridad.php';
$seguridad = new BloqueDeSeguridad();
$seguridad->seguridad("login.php");
// Mensaje de bienvenida
if (isset($_SESSION['mensajebienvenido'])) {
    $mensajebienvenido = $_SESSION['mensajebienvenido'];
//    echo "<script languaje='javascript'>alert('$mensajebienvenido')</script>";
    unset($_SESSION['mensajebienvenido']);
}
?>




<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>INTRANET ACADEMICA EYC</title>
        <link href="startbootstrap-sb-admin-gh-pages/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> 
        <link rel="stylesheet" type="text/css" href="vistas/vistasVoceros/cssvistainsertarvocero/estilo.css">
        <link rel="shortcut icon" href="imagenes/Favicon.ico">     
        <!-- LIBRERIA SWEET -->
        <script src="librerias/sweetalert/package/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" type="text/css" href="librerias/sweetalert/package/dist/sweetalert2.min.css">
        <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    
    </head>
    <body class="sb-nav-fixed">
        
         <!--mensaje bienvenido al usuario  -->     
         <script languaje="javascript">
            Swal.fire({
                icon: 'success',
                text: '<?php  echo $mensajebienvenido; ?>'
            })
        </Script>
 
        
        
        
        
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="Controlador.php?ruta=mostrarinicio">INTRANET EYC</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown"> 
                        <a class="dropdown-item" href="Controlador.php?ruta=cerrarSesion" >CERRAR SESION</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <br>
                        <br>
                        <!--Aqui la funcionalidad de formularios -->
                        <!-- Roles en la sesion definidos-->
                        <!--rol 1 profesor obtendra el crud de voceros y curso -->
                        <!--rol 2 Coordinador obtendra el crud de profesores y materia -->
                        <!--rol 3 invitado obtenido generico cada vez que se registre -->
                        <!--rol 4 Desarrollador obtendra el acesso a todo -->
                        <!--rol 5 Rector obtendra crud contacto y rolcontacto -->
                        <!-- FUNCIONES PROFESOR Y DESARROLLADOR -->
                        <div class="nav">
                            <!-- FUNCIONES PROFESOR Y DESARROLLADOR -->
                            <?php if (in_array(1, $_SESSION['rolesEnSesion']) || in_array(4, $_SESSION['rolesEnSesion'])) { ?>    
                                <a class="nav-link" href="Controlador.php?ruta=mostrarInsertarVoceros">
                                    <div class="sb-nav-link-icon"><i class=""></i></div>
                                    <div style="background-color:whitesmoke; color:black ">INGRESAR VOCEROS </div>
                                </a>
                                <a class="nav-link" href="Controlador.php?ruta=listarVoceros&pag=0">
                                    <div class="sb-nav-link-icon"><i class=""></i></div>
                                    <div style="background-color:whitesmoke; color:black ">REGISTROS VOCEROS</div>
                                </a>
                                <br>
                                <br>
                            <?php } ?>
                            <!-- FUNCIONES RECTOR Y DESARROLLADOR -->                        
                            <?php if (in_array(4, $_SESSION['rolesEnSesion']) || in_array(5, $_SESSION['rolesEnSesion'])) { ?>

                                <a class="nav-link" href="Controlador.php?ruta=mostrarInsertarContactos">
                                    <div class="sb-nav-link-icon"><i class=""></i></div>
                                    <div style="background-color:whitesmoke; color:black ">INGRESAR CONTACTOS </div>
                                </a>

                                <a class="nav-link" href="Controlador.php?ruta=listarContactos&pag=0">
                                    <div class="sb-nav-link-icon"><i class=""></i></div>
                                    <div style="background-color:whitesmoke; color:black "> REGISTROS CONTACTOS </div>
                                </a>
                                <br>
                                <br>
                            <?php } ?>
                            <!-- FUNCIONES COORDINADOR Y DESARROLLADOR -->
                            <?php if (in_array(2, $_SESSION['rolesEnSesion']) || in_array(4, $_SESSION['rolesEnSesion'])) { ?>
                                <a class="nav-link" href="Controlador.php?ruta=mostrarInsertarProfesores">
                                    <div class="sb-nav-link-icon"><i class=""></i></div>
                                    <div style="background-color:whitesmoke; color:black ">INGRESAR PROFESORES </div>
                                </a>
                                <a class="nav-link" href="Controlador.php?ruta=listarProfesores&pag=0">
                                    <div class="sb-nav-link-icon"><i class=""></i></div>
                                    <div style="background-color:whitesmoke; color:black "> REGISTROS PROFESORES </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>


                    <!-- ESTO SERA PARA EL INVITADO -->

                    <?php if (in_array(3, $_SESSION['rolesEnSesion']) || in_array(3, $_SESSION['rolesEnSesion'])) { ?>
                    <div style="background-color:white; color:black">
                        <h6>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp USUARIO INVITADO </h6>
                    </div>
                     
                    <?php } ?>

<!--                    <script>
                        function preguntardesarrollador() {
                            Swal.fire(
                                    'Puede que el desarrollador no le haya dado funciones, comuniquese con el desarrollador!!',
                                    )
//                            alert ('Puede que el desarrollador no le haya dado funciones, comuniquese con el desarrollador   ');
                        }
                    </script>      -->


                    <div class="sb-sidenav-footer">
                        <div class="small">BIENVENIDO</div>
                        <!-- QUIEN INICIO SESION -->
                        <?php if ($_SESSION['perNombre'] && $_SESSION['perApellido']) echo "" . $_SESSION['perNombre'] . " &nbsp " . $_SESSION['perApellido'] ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="row">
                            <?php
                            if (isset($_GET['contenido'])) {
                                include($_GET['contenido']);
                            }
                            ?>
                        </div>
                        <br><br>
                        <footer class="py-4 bg-light mt-auto">
                            <div class="container-fluid">
                                <div class="d-flex align-items-center justify-content-between small">
                                    <div class="text-muted">Copyright &copy;  2020</div>
                                    <div>
                                        <a>POLITICA DE PRIVACIDAD</a>
                                        &middot;
                                        <a>TERMINOS Y CONDICIONES</a>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="startbootstrap-sb-admin-gh-pages/js/scripts.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
            <script src="startbootstrap-sb-admin-gh-pages/assets/demo/chart-area-demo.js"></script>
            <script src="startbootstrap-sb-admin-gh-pages/assets/demo/chart-bar-demo.js"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
            <script src="startbootstrap-sb-admin-gh-pages/assets/demo/datatables-demo.js"></script>
            <script type="text/javascript">
                        $(document).ready(function () {
                            $('#example').DataTable();
                        }
                        );
            </script>  
    </body>
</html>
