<?php
/*Se importa el archivo de conexion de la base de datos*/
require_once ("conexion.php");

/*Clase que maneja los DMLs de las ordenes de pago*/
class fachadaOrdenesDePago {
    
/*Se declara la variable "$consultas" de tipo private*/
    private $consultas;
    
/*Funcion constructor*/
    public function __construct() {
        $this->consultas = array();
    }
    
/*Funcion que muestra los proveedores registrados y a los cuales se les puede emitir una orden*/
    public function mostrarProveedoresRegistrados() {
        $sql = "SELECT *
                FROM tproveedor p
                ORDER BY nombre_proveedor";
		$mostrarOrdenes = mysql_query($sql, ConectarMySQL::conexion());
		while ($ordenesDePago = mysql_fetch_assoc($mostrarOrdenes)) {
			$this->consultas[] = $ordenesDePago;
		}
		return $this->consultas;
    }

/*Funcion que muestra los datos del proveedor que se selecciono para emitir la orden de pago*/
    public function mostrarProveedoresRegistradosPorId($idproveedor) {
        $sql = "SELECT id_proveedor, nombre_proveedor, razon_social, cedula
                FROM tproveedor 
                WHERE id_proveedor = '$idproveedor' ";
		$mostrarProveedorPorId = mysql_query($sql, ConectarMySQL::conexion());
		while ($resultadoProveedor = mysql_fetch_assoc($mostrarProveedorPorId)) {
			$this->consultas[] = $resultadoProveedor;
		}
		return $this->consultas;
    }
    
/*Funcion que muestra los proveedores registrados a los que se les puede descargar ordenes de pago*/
    public function mostrarProveedoresParaDescargarOrdenes() {
        $sql = "SELECT distinct p.id_proveedor, p.nombre_proveedor, p.cedula, op.orden_pagada 
		FROM tproveedor p, torden_proveedor op 
		WHERE p.id_proveedor=op.id_proveedor 
		AND op.orden_pagada=1
		ORDER BY p.nombre_proveedor;";
		$mostrarProveedor = mysql_query($sql, ConectarMySQL::conexion());
		while ($resultadoProveedor = mysql_fetch_assoc($mostrarProveedor)) {
			$this->consultas[] = $resultadoProveedor;
		}
		return $this->consultas;
    }
    
/*Funcion que muestra todas las ordenes de pago registradas*/
    public function mostrarOrdenesDePago() {
        $sql = "SELECT id_orden, DATE_FORMAT(fecha,'%d/%m/%Y') fecha, numero_factura, p.id_proveedor, nombre_proveedor, cedula, monto_factura 'monto', 
				CASE orden_pagada WHEN 1 THEN 'Pagada' ELSE 'Pendiente' END orden 
                FROM tproveedor p, torden_proveedor op
                WHERE p.id_proveedor = op.id_proveedor 
                ORDER BY numero_factura DESC ";
		$mostrarOrdenes = mysql_query($sql, ConectarMySQL::conexion());
		while ($ordenesDePago = mysql_fetch_assoc($mostrarOrdenes)) {
			$this->consultas[] = $ordenesDePago;
		}
		return $this->consultas;
    }
    
/*Funcion que muestra los datos de la orden que se selecciono para editar*/
    public function mostrarOrdenesDePagoPorId($idorden) {
       $sql = "SELECT op.id_orden, op.id_proveedor, DATE_FORMAT(op.fecha,'%d/%m/%Y') fecha, op.numero_factura, p.nombre_proveedor, p.cedula, op.monto_factura 'monto' 
               FROM tproveedor p, torden_proveedor op 
               WHERE p.id_proveedor = op.id_proveedor  
               AND op.id_orden = '$idorden' 
               ORDER BY op.numero_factura DESC ";
       $mostrarOrdenes = mysql_query($sql, ConectarMySQL::conexion());
       while ($ordenesDePago = mysql_fetch_assoc($mostrarOrdenes)) {
			$this->consultas[] = $ordenesDePago;
       }
       return $this->consultas;
    }

/*Funcion que registra las ordenes de pago a los proveedores*/
    public function registrarOrdenesDePago($idproveedor, $numerofactura, $montofactura) {
        $sql = "INSERT INTO torden_proveedor (id_proveedor, numero_factura, monto_factura, orden_pagada) 
                VALUES ('$idproveedor', '$numerofactura', '$montofactura', 0) ";
        $emitirOrden = mysql_query($sql, ConectarMySQL::conexion());
	header("location: ../ordenesDePago/mostrarOrdenesDePago.php");
    }
    
/*Funcion que edita una orden de pago seleccionada*/
    public function editarOrdenesDePago($numerofactura, $monto, $idorden) {
        $sql = "UPDATE torden_proveedor SET 
                numero_factura='$numerofactura', monto_factura='$monto' 
                WHERE id_orden='$idorden' ";
        $editarOrden = mysql_query($sql, ConectarMySQL::conexion());
        header("location: ../ordenesDePago/mostrarOrdenesDePago.php");
    }
    
/*Funcion que cancela una orden de pago seleccionada*/
    public function pagarOrdenes($idorden) {
        $sql = "UPDATE torden_proveedor SET 
                orden_pagada = 1 
                WHERE id_orden='$idorden' ";
        $pagarOrden = mysql_query($sql, ConectarMySQL::conexion());
        header("location: ../ordenesDePago/mostrarOrdenesDePago.php");
    }
    
/*Funcion que elimina una orden de pago seleccionada*/
    public function eliminarOrdenesDePago($idorden) {
        $sql = "DELETE FROM torden_proveedor 
				WHERE id_orden = '$idorden' ";
        $eliminarOrden = mysql_query($sql, ConectarMySQL::conexion());
        header("location: ../ordenesDePago/mostrarOrdenesDePago.php");
    }
}
?>
