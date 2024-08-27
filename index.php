<?php
include ('app/config.php');
include ('layout/sesion.php');

include ('layout/parte1.php');
include ('app/controllers/usuarios/listado_de_usuarios.php');
include ('app/controllers/roles/listado_de_roles.php');
include ('app/controllers/categorias/listado_de_categoria.php');
include ('app/controllers/almacen/listado_de_productos.php');
include ('app/controllers/proveedores/listado_de_proveedores.php');
include ('app/controllers/compras/listado_de_compras.php');
include ('app/controllers/ventas/listado_de_ventas.php');
include ('app/controllers/clientes/listado_de_clientes.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Bienvenido al SISTEMA de BODEGA - <?php echo $rol_sesion; ?> </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <h5>CONTENIDO DEL SISTEMA</h5>
            <br><br>

            <div class="row">



            <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <?php
                            $contador_de_productos = 0;
                            foreach ($productos_datos as $productos_dato){
                                $contador_de_productos = $contador_de_productos + 1;
                            }
                            ?>
                            <h3><?php echo $contador_de_productos;?></h3>
                            <h5>ALMACEN</h5>
                        </div>
                        <a href="<?php echo $URL;?>/almacen/create.php">
                            <div class="icon">
                                <i class="fas fa-list"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL;?>/almacen" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>


            <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php
                            $contador_de_compras = 0;
                            foreach ($compras_datos as $compras_dato){
                                $contador_de_compras = $contador_de_compras + 1;
                            }
                            ?>
                            <h3><?php echo $contador_de_compras;?></h3>
                            <h5>ENTRADAS</h5>
                        </div>
                        <a href="<?php echo $URL;?>/compras">
                            <div class="icon">
                                <i class="fas fa-cart-plus"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL;?>/compras" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>



                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php
                            $contador_de_ventas = 0;
                            foreach ($ventas_datos as $ventas_dato){
                                $contador_de_ventas = $contador_de_ventas + 1;
                            }
                            ?>
                            <h3><?php echo $contador_de_ventas;?></h3>
                            <h5>SALIDAS</h5>
                        </div>
                        <a href="<?php echo $URL;?>/ventas">
                            <div class="icon">
                                <i class="fas fa-shopping-basket"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL;?>/ventas" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>




                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php
                            $contador_de_usuarios = 0;
                            foreach ($usuarios_datos as $usuarios_dato){
                                $contador_de_usuarios = $contador_de_usuarios + 1;
                            }
                            ?>
                            <h3><?php echo $contador_de_usuarios;?></h3>
                            <h5>USUARIOS</h5>
                        </div>
                        <a href="<?php echo $URL;?>/usuarios/create.php">
                            <div class="icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL;?>/usuarios" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>



            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include ('layout/parte2.php'); ?>






