USE sistema_ventas;

SELECT * FROM tb_usuarios;

SELECT * FROM tb_roles;

SELECT * FROM tb_categorias;

SELECT * FROM tb_proveedores;

SELECT * FROM tb_compras;

SELECT * FROM tb_almacen;

SELECT * FROM tb_carrito;

SELECT * FROM tb_clientes;

SELECT * FROM tb_ventas;

UPDATE tb_usuarios
SET
fyh_creacion = NOW();

UPDATE tb_usuarios
SET
fyh_actualizacion = date();

SELECT * FROM tb_usuarios WHERE email = "";



SELECT *,pro.codigo AS codigo, pro.nombre AS nombre_producto, pro.descripcion AS descripcion,
pro.stock AS stock, pro.stock_minimo AS stock_minimo, pro.stock_maximo AS stock_maximo,
pro.precio_compra AS precio_compra_producto, pro.precio_venta AS precio_venta_producto, 
pro.fecha_ingreso AS fecha_ingreso, pro.imagen AS imagen,
cat.nombre_categoria AS nombre_categoria, us.nombres AS nombre_usuarios_producto,
prov.nombre_proveedor AS nombre_proveedor, prov.celular AS celular_proveedor,
prov.telefono AS telefono_proveedor, prov.empresa AS empresa, 
prov.email AS email_proveedor, prov.direccion AS direccion_proveedor,
us.nombres AS nombres_usuario
FROM tb_compras AS co 
INNER JOIN tb_almacen AS pro ON co.id_producto = pro.id_producto 
INNER JOIN tb_categorias AS cat ON cat.id_categoria = pro.id_categoria
INNER JOIN tb_usuarios AS us ON co.id_usuario = us.id_usuario
INNER JOIN tb_proveedores AS prov ON co.id_proveedor = prov.id_proveedor;




SELECT *, pro.nombre AS nombre_producto, pro.descripcion AS descripcion,
pro.precio_venta AS precio_venta  
FROM tb_carrito AS carr INNER JOIN tb_almacen AS pro 
ON carr.id_producto = pro.id_producto
WHERE nro_venta = '';
