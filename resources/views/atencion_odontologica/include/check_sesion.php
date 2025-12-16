<?php session_start();
if(!isset($_SESSION['cliente'])) {
	header("Location: ./?r=".base64_encode((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"));
}
 
?>