<?php
/**
 * Proceso de recibir las cola de mensaje es necesario ejecutar por teminal
 */
for ($i=0; $i < 500000; $i++) { 
	//echo "Procesando envio ".$i;
	$comando = "php ColaMensaje.php receive";
	system($comando);
}
?>