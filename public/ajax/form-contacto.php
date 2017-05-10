<?php

	if (isset($_POST)) 
	{
		
		if($_POST["nombre"]!="" && $_POST["mail"]!="" && $_POST["tel"]!="" && $_POST["msje"]!="")
		{
			$fecha = date("d-M-y H:i");
			//$mymail = "info@gerardobarg.com.ar";
			$mymail = "antonellaguayarello@gmail.com";
			$subject = "Nuevo Contacto desde el sitio Barg.com";
			
			
			$contenido = "Consulta por la Propiedad: " . $_POST['propiedad'];
			$contenido .= "-------- \n";
			$contenido .= "-------- \n";
			$contenido .= "Datos: \n";
			$contenido .= "-------- \n";
			$contenido .= "\n";
			$contenido .= "Nombre: " .$_POST['nombre']. "\n";
			$contenido .= "\n";
			$contenido .= "Correo electronico: " .$_POST['mail']. "\n";
			$contenido .= "\n";
			$contenido .= "Telefono: " .$_POST['tel']. "\n";
			$contenido .= "\n";

			$contenido .= "Mensaje: \n";
			$contenido .= "---------- \n";
			$contenido .= $_POST['msje']. "\n";
			$contenido .= "\n";		
			$contenido .= "Enviado el ".$fecha." desde el sitio web";
			
			$header = "From: ".$_POST['mail']."\n";
			$header .= "X-Mailer:PHP/".phpversion()."\n";
			$header .= "Mime-Version: 1.0\n";
			$header .= "Content-Type: text/plain";
			mail($mymail, $subject, utf8_decode($contenido) ,$header);
			
			
			
			
			echo "<p><b>El mensaje se envi&oacute; con &eacute;xito! Muchas gracias.</b></p>";
			
		}	
		else
			{
			echo "<p><b>Ocurrió un error al enviar el mensaje. Intente nuevamente.</b></p>";
			}
	}

?>