<?php
/**
 * Permite enviar cola de mensaje esta predefinido para 500mil, debe ejecutar de primero en un terminal 
 */
for ($i=0; $i < 500000; $i++) { 
	//echo "Procesando envio ".$i;
	$comando = "php ColaMensaje.php send $i  gbolivar$i";
	system($comando);
}
?>