<?php 
    	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    		require 'mail/class.phpmailer.php';
			$email   = $_POST["f_email"];
			$phone   = $_POST["f_phone"];
			$subject = $_POST["f_subject"];
			$message = $_POST["f_message"];
			$fecha   = date("d-m-Y");
			$hora    = date("h:i:s a");
	         ######## ENVIAR AL MAIL AL BUZON DE LA EMPRESA ########################
	         $message    = "Contacto Nueva<br><div align='left'>Correo: ".$email."<br>"."Teléfono: ".$phone."<br>"."Tema: ".$subject."<br>"."Mensaje: ".$message[3]."<br>"."Fecha: ".$fecha.' '.$hora."</div>";
	         // $message = "Nombre:";
	         $message    = str_replace(
	         array('á', 'Á', 'é', 'É', 'í', 'Í', 'ó', 'Ó', 'ú', 'Ú', 'ñ', 'Ñ', '\n'),
	         array('&aacute;', '&Aacute;', '&eacute;', '&Eacute;', '&iacute;', '&Iacute;', '&oacute;', '&Oacute;', '&uacute;', '&Uacute;', '&ntilde;', '&Ntilde;', '<br>'),
	         $message
	         );
	         
	         $Correo = new PHPMailer();
	         $Correo->Charset  = "UTF-8";
	         $Correo->From     = "3daniel25@gmail.com";
	         $Correo->FromName = "=?ISO-8859-1?B?".base64_encode(utf8_decode("Potafolio Daniel")."=?=");
	         $Correo->Subject  = "=?ISO-8859-1?B?".base64_encode(utf8_decode("Conctacto Nuevo"))."=?=";
	         $Correo->Body     = $message;
	         $Correo->IsHTML(true);
	         $Correo->AddAddress("3daniel25@info.com", '');
	         // enviar mensaje
	         $Correo->CharSet = 'UTF-8';
	         if($Correo->Send()) {
	            echo json_encode("error");
	        } else {
	            echo json_encode('success');
	        }
    	}