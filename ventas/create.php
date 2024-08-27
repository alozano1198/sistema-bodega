<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/ventas/listado_de_ventas.php');
include ('../app/controllers/almacen/listado_de_productos.php');
include ('../app/controllers/clientes/listado_de_clientes.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Registro de Nueva Salida</h1>
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
                                <?php 
                                $contador_de_ventas = 0;
                                foreach ($ventas_datos as $ventas_dato) {
                                  $contador_de_ventas = $contador_de_ventas + 1;
                                }
                                ?>
                                   <h3 class="card-title"><i class="fa fa-shopping-bag"></i> Venta No. 
                                   <input type="text" style="text-align: center;" name="" id="" value="<?php echo $contador_de_ventas + 1;?>" disabled></h3>
                                   <div class="card-tools">
                                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                           <i class="fas fa-minus"></i>
                                       </button>
                                   </div>

                               </div>

                               <div class="card-body">
                                   <b>Carrito</b>

                                   <button type="button" class="btn btn-primary" data-toggle="modal"
                                               data-target="#modal-buscar_producto">
                                           <i class="fa fa-search"></i>
                                           Buscar producto
                                       </button>
                                       <!-- modal para visualizar datos de los proveedor -->
                                       <div class="modal fade" id="modal-buscar_producto">
                                           <div class="modal-dialog modal-lg">
                                               <div class="modal-content">
                                                   <div class="modal-header" style="background-color: #1d36b6;color: white">
                                                       <h4 class="modal-title">Busqueda del producto</h4>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true">&times;</span>
                                                       </button>
                                                   </div>
                                                   <div class="modal-body">
                                                       <div class="table table-responsive">
                                                           <table id="example1" class="table table-bordered table-striped table-sm">
                                                               <thead>
                                                               <tr>
                                                                   <th><center>No.</center></th>
                                                                   <th><center>Selecionar</center></th>
                                                                   <th><center>Código</center></th>
                                                                   <th><center>Categoría</center></th>
                                                                   <th><center>Imagen</center></th>
                                                                   <th><center>Nombre</center></th>
                                                                   <th><center>Descripción</center></th>
                                                                   <th><center>Stock</center></th>
                                                                   <th><center>Fecha compra</center></th>
                                                                   <th><center>Usuario</center></th>
                                                               </tr>
                                                               </thead>
                                                               <tbody>
                                                               <?php
                                                               $contador = 0;
                                                               foreach ($productos_datos as $productos_dato){
                                                                   $id_producto = $productos_dato['id_producto']; ?>
                                                                   <tr>
                                                                       <td><?php echo $contador = $contador + 1; ?></td>
                                                                       <td>
                                                                           <button class="btn btn-info" id="btn_selecionar<?php echo $id_producto;?>">
                                                                               Selecionar
                                                                           </button>
                                                                           <script>
                                                                               $('#btn_selecionar<?php echo $id_producto;?>').click(function () {

                                                                                //alert('<?php echo $id_producto;?>')


                                                                                   var id_producto = "<?php echo $id_producto;?>";
                                                                                   $('#id_producto').val(id_producto);

                                                                                    var producto = "<?php echo $productos_dato['nombre'];?>";
                                                                                   $('#producto').val(producto);

                                                                                   var descripcion = "<?php echo $productos_dato['descripcion'];?>";
                                                                                   $('#descripcion').val(descripcion);


                                                                                   $('#cantidad').focus();

                                                                                                  

                                                                                   //$('#modal-buscar_producto').modal('toggle');

                                                                               });
                                                                           </script>
                                                                       </td>
                                                                       <td><?php echo $productos_dato['codigo'];?></td>
                                                                       <td><?php echo $productos_dato['categoria'];?></td>
                                                                       <td>
                                                                           <img src="<?php echo $URL."/almacen/img_productos/".$productos_dato['imagen'];?>" width="50px" alt="asdf">
                                                                       </td>
                                                                       <td><?php echo $productos_dato['nombre'];?></td>
                                                                       <td><?php echo $productos_dato['descripcion'];?></td>
                                                                       <td>
                                                                        <?php echo $productos_dato['stock'];?>
                                                                      </td>
                                                                       <td><?php echo $productos_dato['fecha_ingreso'];?></td>
                                                                       <td><?php echo $productos_dato['nombres'];?></td>
                                                                   </tr>
                                                                   <?php
                                                               }
                                                               ?>
                                                               </tbody>
                                                               </tfoot>
                                                           </table>
                                                           <div class="row">
                                                            <div class="col-md-5">
                                                              <div class="form-group">
                                                                <input type="text" id="id_producto" hidden>
                                                                <label for="">Producto</label>
                                                                <input type="text" name="" id="producto" class="form-control" disabled>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                              <div class="form-group">
                                                                <label for="">Descripción</label>
                                                                <input type="text" name="" id="descripcion" class="form-control" disabled>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                              <div class="form-group">
                                                                <label for="">Cantidad</label>
                                                                <input type="text" name="" id="cantidad" class="form-control">
                                                              </div>
                                                            </div>
                                                           </div>
                                                           <button style="float: right;" id="btn_registrar_carrito" class="btn btn-primary">Registrar</button>
                                                           <div id="respuesta_carrito"></div>
                                                           <script>
                                                            $('#btn_registrar_carrito').click(function () {
                                                              //alert("Click");

                                                              var nro_venta = '<?php echo $contador_de_ventas+1; ?>';
                                                              var id_producto = $('#id_producto').val();
                                                              var cantidad = $('#cantidad').val();

                                                              if (id_producto == "") {
                                                                alert("Debe de llenar los campos...");
                                                              }else if (cantidad == "") {
                                                                alert("Debe de llenar la cantidad del producto...");
                                                              }else{
                                                                //alert("Listo");
                                                                var url = "../app/controllers/ventas/registrar_carrito.php";
                                                                $.get(url,{nro_venta:nro_venta, id_producto:id_producto, cantidad:cantidad},function (datos) {
                                                                    $('#respuesta_carrito').html(datos);
                                                                });
                                                              }
                                                              
                                                            });
                                                           </script>
                                                           <br><br>
                                                       </div>
                                                   </div>
                                               </div>
                                               <!-- /.modal-content -->
                                           </div>
                                           <!-- /.modal-dialog -->
                                       </div>

                                       <br><br>
                                       <div class="table-responsive">
                                        <table class="table table-bordered table-sm table-hover table-striped">
                                          <thead>
                                            <tr>
                                              <th style="background-color: #e7e7e7; text-align: center;">No.</th>
                                              <th style="background-color: #e7e7e7; text-align: center;">Producto</th>
                                              <th style="background-color: #e7e7e7; text-align: center;">Descripción</th>
                                              <th style="background-color: #e7e7e7; text-align: center;">Cantidad</th>
                                              <th style="background-color: #e7e7e7; text-align: center;">Acción</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php 
                                            $contador_de_carrito = 0;
                                            $cantidad_total = 0;

                                            $nro_venta = $contador_de_ventas + 1;
                                            $sql_carrito = "SELECT *, pro.nombre AS nombre_producto, pro.descripcion AS descripcion,
                                            pro.stock AS stock, pro.id_producto AS id_producto  
                                            FROM tb_carrito AS carr INNER JOIN tb_almacen AS pro 
                                            ON carr.id_producto = pro.id_producto
                                            WHERE nro_venta = '$nro_venta' ORDER BY id_carrito ASC;";
                                            $query_carrito = $pdo->prepare($sql_carrito);
                                            $query_carrito->execute();
                                            $carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($carrito_datos as $carrito_dato) {
                                              $id_carrito = $carrito_dato['id_carrito'];
                                              $contador_de_carrito = $contador_de_carrito + 1;
                                              $cantidad_total = $cantidad_total + $carrito_dato['cantidad'];
                                             ?>
                                              <tr>
                                                <td>
                                                  <center><?php echo $contador_de_carrito;?></center>
                                                  <input type="text" name="" id="id_producto<?php echo $contador_de_carrito;?>" value="<?php echo $carrito_dato['id_producto']; ?>" hidden>
                                                </td>
                                                <td><?php echo $carrito_dato['nombre_producto']; ?></td>
                                                <td><?php echo $carrito_dato['descripcion']; ?></td>
                                                <td>
                                                  <center><span id="cantidad_carrito<?php echo $contador_de_carrito;?>"><?php echo $carrito_dato['cantidad'];?></span></center>
                                                  <input type="text" value="<?php echo $carrito_dato['stock']; ?>" id="stock_de_inventario<?php echo $contador_de_carrito;?>" hidden>
                                                </td>
                                                <td>
                                                  <center>
                                                    <form action="../app/controllers/ventas/borrar_carrito.php" method="post">
                                                      <input type="text" name="id_carrito" value="<?php echo $id_carrito;?>" hidden>
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Borrar</button>
                                                  </form>
                                                  </center>
                                                </td>
                                              </tr>
                                              <?php
                                            }
                                            ?>
                                            <tr>
                                              <th colspan="3" style="background-color: #e7e7e7; text-align: right;">Total</th>
                                              <th style="background-color: #fff819;">
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
                                   <h3 class="card-title"><i class="fa fa-user-check"></i> Datos del cliente</h3>
                                   <div class="card-tools">
                                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                           <i class="fas fa-minus"></i>
                                       </button>
                                   </div>

                               </div>

                               <div class="card-body">
                                   <b>Cliente</b>

                                   <button type="button" class="btn btn-primary" data-toggle="modal"
                                               data-target="#modal-buscar_cliente">
                                           <i class="fa fa-search"></i>
                                           Buscar empleado
                                       </button>
                                       <!-- modal para visualizar datos de los clientes -->
                                       <div class="modal fade" id="modal-buscar_cliente">
                                           <div class="modal-dialog modal-lg">
                                               <div class="modal-content">
                                                   <div class="modal-header" style="background-color: #1d36b6;color: white">
                                                       <h4 class="modal-title">Busqueda del cliente </h4>
                                                       <div style="width: 10px;"></div>
                                                       <button type="button" class="btn btn-warning" data-toggle="modal"
                                                       data-target="#modal-agregar_cliente">
                                                       <i class="fa fa-users"></i>
                                                        Agregar nuevo cliente
                                                        </button>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true">&times;</span>
                                                       </button>
                                                   </div>
                                                   <div class="modal-body">
                                                       <div class="table table-responsive">
                                                           <table id="example2" class="table table-bordered table-striped table-sm">
                                                               <thead>
                                                               <tr>
                                                                   <th><center>No.</center></th>
                                                                   <th><center>Selecionar</center></th>
                                                                   <th><center>Nombre del cliente</center></th>
                                                                   <th><center>Área</center></th>
                                                               </tr>
                                                               </thead>
                                                               <tbody>
                                                               <?php
                                                               $contador_de_clientes = 0;
                                                               foreach ($clientes_datos as $clientes_dato){
                                                                   $id_cliente = $clientes_dato['id_cliente'];
                                                                   $contador_de_clientes = $contador_de_clientes + 1 ?>
                                                                   <tr>
                                                                    <td>
                                                                      <center><?php echo $contador_de_clientes;?></center>
                                                                    </td>
                                                                    <td><center>
                                                                      <button id="btn_pasar_cliente<?php echo $id_cliente;?>" class="btn btn-info">Seleccionar</button>
                                                                      <script>
                                                                        $('#btn_pasar_cliente<?php echo $id_cliente;?>').click(function () {

                                                                          var id_cliente = '<?php echo $clientes_dato['id_cliente'];?>';
                                                                          $('#id_cliente').val(id_cliente);

                                                                          var nombre_cliente = '<?php echo $clientes_dato['nombre_cliente'];?>';
                                                                          $('#nombre_cliente').val(nombre_cliente);

                                                                          var area_cliente = '<?php echo $clientes_dato['area_cliente'];?>';
                                                                          $('#area_cliente').val(area_cliente);

                                                                          $('#modal-buscar_cliente').modal('toggle');

                                                                          //alert(nombre_cliente);
                                                                        })
                                                                      </script>
                                                                    </center>
                                                                  </td>
                                                                  <td><?php echo $clientes_dato['nombre_cliente']; ?></td>
                                                                  <td><center><?php echo $clientes_dato['area_cliente']; ?></center></td>
                                                                 
                                                                   </tr>
                                                                   <?php
                                                               }
                                                               ?>
                                                               </tbody>
                                                               </tfoot>
                                                           </table>
                                                           
                                                          
                                                       </div>
                                                   </div>
                                               </div>
                                               <!-- /.modal-content -->
                                           </div>
                                           <!-- /.modal-dialog -->
                                       </div>
                                       <br><br>
                                       <div class="row">
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <input type="text" id="id_cliente" hidden>
                                            <label for="">Nombre del cliente</label>
                                            <input type="text" name="" id="nombre_cliente" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label for="">Área</label>
                                            <input type="text" name="" id="area_cliente" class="form-control">
                                          </div>
                                        </div>
                                        
                                       </div>
                               </div>

                           </div>
                       </div>

                       <div class="col-md-3">
                           <div class="card card-outline card-primary">
                               <div class="card-header">
                                   <h3 class="card-title"><i class="fa fa-shopping-basket"></i> Registrar Venta</h3>
                                   <div class="card-tools">
                                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                           <i class="fas fa-minus"></i>
                                       </button>
                                   </div>

                               </div>

                               <div class="card-body">
                                   <div class="form-group">
                                    <label for="">Monto a cancelar</label>
                                    <input type="text" name="" id="total_a_cancelar" class="form-control" style="text-align: center; background-color: #fff819;" value="<?php echo $cantidad_total;?>" disabled>
                                   </div>
                                   
                                   <hr>
                                   <div class="form-group">
                                      <button id="btn_guardar_venta" class="btn btn-primary btn-block">Guardar venta</button>
                                      <div id="respuesta_registro_venta"></div>
                                      <script>
                                        $('#btn_guardar_venta').click(function () {
                                          //alert("click");
                                          var nro_venta = '<?php echo $contador_de_ventas + 1;?>';
                                          var id_cliente = $('#id_cliente').val();
                                          var total_a_cancelar = $('#total_a_cancelar').val();

                                          if (id_cliente == "") {
                                            alert("Debe de llenar los datos del cliente")
                                          }else{
                                             
                                              actualizar_stock();
                                             guardar_venta();
                                          }

                                          
                                          function actualizar_stock() {
                                            var i = 1;
                                          var n = '<?php echo $contador_de_carrito;?>';
                                          //alert(n);

                                            for( i = 1; i <= n; i++){
                                              var a = '#stock_de_inventario'+i;
                                              var stock_de_inventario = $(a).val();

                                              var b = '#cantidad_carrito'+i;
                                              var cantidad_carrito = $(b).html();

                                              var c = '#id_producto'+i;
                                              var id_producto = $(c).val();

                                              var stock_calculado = parseFloat(stock_de_inventario - cantidad_carrito);
                                              //alert(id_producto + " - " + stock_de_inventario + " - " + cantidad_carrito + " - "+ stock_calculado);

                                              var url2 = "../app/controllers/ventas/actualizar_stock.php";
                                             $.get(url2,{id_producto:id_producto,stock_calculado:stock_calculado},function (datos) {
                                             
                                             });
                                            }
                                          }

                                          function guardar_venta() {
                                            var url = "../app/controllers/ventas/registro_de_ventas.php";
                                             $.get(url,{nro_venta:nro_venta,id_cliente:id_cliente,total_a_cancelar:total_a_cancelar},function (datos) {
                                             $('#respuesta_registro_venta').html(datos);
                                             });
                                          }

                                          //alert(total_a_cancelar);
                                        })
                                      </script>
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
                                       <div class="modal fade" id="modal-agregar_cliente">
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
                                                          <label for="">Área</label>
                                                          <input type="text" name="area_cliente" id="" class="form-control">
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
                                        </div>    