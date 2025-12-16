<?php
require_once('../../scripts/conexion.php');

if($_POST['tipo']=='guardar') {
	$idcampo	= $_POST['idcampo'];
	$cod_con	= $_POST['cod_con'];
	$valor		= $_POST['valor'];
	$sql = "select valor from campodatos where cod_con=".$cod_con." and idcampo=".$idcampo;
	$rscampo = $dba->prepare($sql);
	$rscampo->execute();
	$row = $rscampo->fetch();
	if($row){
		$sql = "update campodatos set valor = '".$valor."' where cod_con=".$cod_con." and idcampo=".$idcampo;
	} else {
		$sql = "insert into campodatos (cod_con, idcampo, valor) values (".$cod_con.",".$idcampo.",'".$valor."')";
	}
	$rsg = $dba->prepare($sql);
	$rsg->execute();
	//print($sql);
}
?>