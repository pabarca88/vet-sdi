<?php
ini_set("display_errors","0");
require_once('../../scripts/conexion.php');

if($_POST['tipo']=='guardar') {
	$cod_con= $_POST["cod_con"];
	$textdata = $_POST["textdata"];
	$sql  = "UPDATE control SET periodontograma= '".$textdata."' where cod_con = ".$cod_con;
	$rs = $dba->prepare($sql);
	$rs->execute();
}

?>