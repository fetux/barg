<?php
/*
error_reporting(E_STRICT & E_ALL);
try{
	$client = new SoapClient("http://gisdesa.mardelplata.gob.ar/opendata/ws.php?wsdl");
	$barrios = $client->__soapCall('barrios',array('token'=>'wwfe345gQ3ed5T67g4Dase45F6fer'));
	foreach($barrios as $b)
		echo $b->descripcion.'</br>';	
}
catch(Exception $e){
	var_dump($e->getMessage());
}
 * 
 * */
 
?>



<?php

require_once('lib/nusoap.php');

$wsdl="https://gestionpas.mercantilandina.com.ar/ws_COT05v2TST/services/CotizarServicio/wsdl/CotizarServicio.wsdl";
//$wsdl="https://gestionpas.mercantilandina.com.ar/ws_COT05v2PRD/services/CotizarServicio/wsdl/CotizarServicio.wsdl";
$client=new nusoap_client($wsdl, 'wsdl','','','','');
$err = $client->getError();
if ($err) {
 echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
}


$param = array(
	'req'=>array(
	 	'auth'=>array(
	 		'canal' => '38',
	 		//'token' => 'P3R7Hx1J8t4m'
	 		'token' => 'polij18524'
		),
	 	'productor' => 0,
	 	'vehiculo'=>46528,
	 	'aniofab'=>2012,
	 	'localidad'=>7600,
	 	'uso'=>1,
	 	'gnc'=>'N',
	 	'parms' => null
	)
);

$result = $client->call('cotizarAuto', $param,'', '', false, true);

// Check for a fault
if ($client->fault) {
	echo '<h2>Fault</h2><pre>';
	print_r($result);
	echo '</pre>';
} else {

	// Check for errors
	$err = $client->getError();
	if ($err) {
	 // Display the error
		echo '<h2>Error</h2><pre>' . $err . '</pre>';
		var_dump($result);
	} else {
	 // Display the result
	 echo '<h2>Result</h2><pre>';
	 print_r($result);
	 echo '</pre>';
	}

}
echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';



$url = 'https://gestionpas.mercantilandina.com.ar/ws_selectorAutos_TST/api/v1/marcas/36/2012/DUSTER';
// create curl resource
$ch = curl_init();
// set url
curl_setopt($ch, CURLOPT_URL, $url);
//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$headers = array(
 'user: 38',
 'token: polij18524'
);
//curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// $output contains the output string
$outp = curl_exec($ch);
// close curl resource to free up system resources
curl_close($ch);
echo($outp);


?>