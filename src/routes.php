<?php
// Routes

// *** DEVICE CALL ***
$app->get('/devices/{device}/cmds/{action}', function ($request, $response, $args) {
    $devices = require __DIR__ . '/../src/tarla_devices.php';

    $device = $request->getAttribute("device");

    //Comprovem que el device està configurat
    if(!array_key_exists($device,$devices)){
	$errorResponse = $response->withStatus(400);
	$errorResponse->getBody()->write("No s'ha trobat el dispositiu '" . $device . "'");
	return $errorResponse;
    }

    $deviceURL = $devices[$device]['_url'];

    if(substr($deviceURL, 0, 7) === "http://"){

        //Fem la crida HTTP al device
        $deviceHTTPURL = $deviceURL . '/cmds/' . $request->getAttribute("action") . '?' . $request->getUri()->getQuery();

 
        $deviceResponseBody = @file_get_contents($deviceHTTPURL);
    
        if($http_response_header === NULL){
            $deviceStatusCode = 404;
            $deviceResponseBody = "No s'ha trobat la URL '" . $deviceHTTPURL . "'";
        }else{
            $deviceStatusCode = (int)explode(' ', $http_response_header[0])[1];
        }

        //Retornem HTTP StatusCode i Response original
        $deviceResponse = $response->withStatus($deviceStatusCode);
        $deviceResponse->getBody()->write($deviceResponseBody);

        return $deviceResponse;
    }else if(substr($deviceURL, 0, 6) === "tcp://" ){
        
        //Fem la crida socket TCP al device
        $socket = stream_socket_client($deviceURL, $errno, $errorMessage);

	$deviceStatusCode = 200;

        if($socket === false){
            $deviceStatusCode = 404;
            $deviceResponseBody = "No es possible connectar al socket '" . $deviceURL . "'";
        }else{
            fwrite($socket, '/cmds/' . $request->getAttribute("action") . '?' . $request->getUri()->getQuery() . PHP_EOL);
            $deviceResponseBody = stream_get_line($socket, 2048, "\n");
            fclose($socket);
        }

	//Retornem HTTP StatusCode i Response
        $deviceResponse = $response->withStatus($deviceStatusCode);
        $deviceResponse->getBody()->write($deviceResponseBody);

        return $deviceResponse;
    }else{
        $errorResponse = $response->withStatus(400);
        $errorResponse->getBody()->write("Prefix de URL no reconegut '" . $deviceURL . "'");
        return $errorResponse;
    }
});

// DEVICE DISCOVERY
$app->get('/devices', function ($request, $response, $args) {
    $devices = require __DIR__ . '/../src/tarla_devices.php';

    // Hide private data
    $info = [];
    foreach ($devices as $deviceName => $deviceData) {
        unset($deviceData['_url']);
        $info[$deviceName] = $deviceData;
    }

    $discoveryResponse = $response->withJson($info, 200, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);

	return $discoveryResponse;
});
// DEVICE DISCOVERY
$app->get('/devices2', function ($request, $response, $args) {
    $devices = require __DIR__ . '/../src/tarla_devices.php';

    // Hide private data
    $info = [];
    foreach ($devices as $deviceName => $deviceData) {
        unset($deviceData['_url']);
        $info[$deviceName] = $deviceData;
    }

    $discoveryResponse = $response->withJson($info, 200, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);

	return $discoveryResponse;
});
