<?php
$id_devolucion_get = $_GET['id_devolucion'];
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/devoluciones/cargar_devolucion.php');
include ('../app/controllers/clientes/cargar_cliente.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Detalle de devolución No. <?php echo $nro_devolucion;?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

           <div class="row">
                       <div class="col-md-12">
                           <div class="card card-outline card-primary">
                               <div class="card-header">
                                
                                   <h3 class="card-title"><i class="fa fa-shopping-bag"></i> Devolución No. 
                                   <input type="text" style="text-align: center;" name="" id="" value="<?php echo $nro_devolucion;?>" disabled></h3>
                                   <div class="card-tools">
                                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                           <i class="fas fa-minus"></i>
                                       </button>
                                   </div>

                               </div>

                               <div class="card-body">
                                   
                                       <div class="table-responsive">
                                        <table class="table table-bordered table-sm table-hover table-striped">
                                          <thead>
                                            <tr>
                                              <th style="background-color: #e7e7e7; text-align: center;">No.</th>
                                              <th style="background-color: #e7e7e7; text-align: center;">Producto</th>
                                              <th style="background-color: #e7e7e7; text-align: center;">Descripción</th>
                                              <th style="background-color: #e7e7e7; text-align: center;">Cantidad</th>                                         
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php 
                                            $contador_de_carrito_devolucion = 0;
                                            $cantidad_total = 0;

                                            
                                            $sql_carrito_devolucion = "SELECT *, pro.nombre AS nombre_producto, pro.descripcion AS descripcion,
                                            pro.stock AS stock, pro.id_producto AS id_producto  
                                            FROM tb_carrito_devolucion AS carr INNER JOIN tb_almacen AS pro 
                                            ON carr.id_producto = pro.id_producto
                                            WHERE nro_devolucion = '$nro_devolucion' ORDER BY id_carrito_devolucion ASC;";
                                            $query_carrito_devolucion = $pdo->prepare($sql_carrito_devolucion);
                                            $query_carrito_devolucion->execute();
                                            $carrito_devolucion_datos = $query_carrito_devolucion->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($carrito_devolucion_datos as $carrito_devolucion_dato) {
                                              $id_carrito_devolucion = $carrito_devolucion_dato['id_carrito_devolucion'];
                                              $contador_de_carrito_devolucion = $contador_de_carrito_devolucion + 1;
                                              $cantidad_total = $cantidad_total + $carrito_devolucion_dato['cantidad'];
                                              ?>
                                              <tr>
                                                <td>
                                                  <center><?php echo $contador_de_carrito_devolucion;?></center>
                                                  <input type="text" name="" id="id_producto<?php echo $contador_de_carrito_devolucion;?>" value="<?php echo $carrito_devolucion_dato['id_producto']; ?>" hidden>
                                                </td>
                                                <td><?php echo $carrito_devolucion_dato['nombre_producto']; ?></td>
                                                <td><?php echo $carrito_devolucion_dato['descripcion']; ?></td>
                                                <td>
                                                  <center><span id="cantidad_carrito_devolucion<?php echo $contador_de_carrito_devolucion;?>"><?php echo $carrito_devolucion_dato['cantidad'];?></span></center>
                                                  <input type="text" value="<?php echo $carrito_devolucion_dato['stock']; ?>" id="stock_de_inventario<?php echo $contador_de_carrito_devolucion;?>" hidden>
                                                </td>
                                                                                    
                                              </tr>
                                              <?php
                                            }
                                            ?>
                                            <tr>
                                              <th colspan="3" style="background-color: #e7e7e7; text-align: right;">Total</th>
                                              <th>
                                                <center>
                                                  <?php echo $cantidad_total;?>
                                              </center>
                                            </th>
                                            </tr>
                                          </tbody>
                                       </table>
                                       </div>
                               </div>

                           </div>

                       </div>

                   </div>


                   <div class="row">
                       <div class="col-md-9">
                           <div class="card card-outline card-primary">
                               <div class="card-header">
                                   <h3 class="card-title"><i class="fa fa-user-check"></i> Datos empleado área</h3>
                                   <div class="card-tools">
                                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                           <i class="fas fa-minus"></i>
                                       </button>
                                   </div>

                               </div>

                               <?php 
                               foreach ($clientes_datos as $clientes_dato) {
                                $nombre_cliente = $clientes_dato['nombre_cliente'];
                                $area_cliente = $clientes_dato['area_cliente'];
                               }
                               ?>
                               <div class="card-body">
                                   
                                       <div class="row">
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <input type="text" id="id_cliente" hidden>
                                            <label for="">Nombre de empleado</label>
                                            <input type="text" value="<?php echo $nombre_cliente;?>" name="" id="nombre_cliente" class="form-control" disabled>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label for="">Área empleado</label>
                                            <input type="text" value="<?php echo $area_cliente;?>" name="" id="area_cliente" class="form-control" disabled>
                                          </div>
                                        </div>
                                        
                                       </div>
                               </div>

                           </div>
                       </div>

                       <div class="col-md-3">
                           <div class="card card-outline card-primary">
                               <div class="card-header">
                                   <h3 class="card-title"><i class="fa fa-arrow-left"></i> Cantidad de Productos</h3>
                                   <div class="card-tools">
                                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                           <i class="fas fa-minus"></i>
                                       </button>
                                   </div>

                               </div>

                               <div class="card-body">
                                   <div class="form-group">
                                    <label for="">Cantidad Total</label>
                                    <input type="text" name="" id="total_a_cancelar" class="form-control" style="text-align: center; background-color: #fff819;" value="<?php echo $cantidad_total;?>" disabled>
                                   </div>
                                   
                                   
                               </div>

                           </div>
                       </div>


                   </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>



<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });


    $(function () {
        $("#example2").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Clientes",
                "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Clientes",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- modal para visualizar el formulario para agregar clientes -->
                                       <!-- <div class="modal fade" id="modal-agregar_cliente">
                                           <div class="modal-dialog modal-sm">
                                               <div class="modal-content">
                                                   <div class="modal-header" style="background-color: #b6900c;color: white">
                                                       <h4 class="modal-title">Nuevo cliente </h4>
                                                       <div style="width: 10px;"></div>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true">&times;</span>
                                                       </button>
                                                   </div>
                                                   <div class="modal-body">
                                                       <form action="../app/controllers/clientes/guardar_clientes.php" method="post">
                                                        <div class="form-group">
                                                          <label for="">Nombre del cliente</label>
                                                          <input type="text" name="nombre_cliente" id="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="">Nit/CI del cliente</label>
                                                          <input type="text" name="nit_ci_cliente" id="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="">Celular del cliente</label>
                                                          <input type="text" name="celular_cliente" id="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="">Correo del cliente</label>
                                                          <input type="email" name="email_cliente" id="" class="form-control">
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                          <button type="submit" class="btn btn-warning btn-block">Guardar cliente</button>
                                                        </div>
                                                       </form>
                                                   </div>
                                               </div>
                                               <!-- /.modal-content -->
                                           </div>
                                           <!-- /.modal-dialog -->
                                        </div>     -->