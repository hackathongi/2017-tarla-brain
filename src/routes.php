<?php
// Routes

// *** DEVICE CALL ***
$app->get('/devices/{device}/cmds/{action}', function ($request, $response, $args) {
    $devices = require __DIR__ . '/../src/jarvis_devices.php';

	//print_r($request);
	//return "test";
    $device = $request->getAttribute("device");

    //Comprovem que el device està configurat
    if(!array_key_exists($device,$devices)){
	$errorResponse = $response->withStatus(400);
	$errorResponse->getBody()->write("No s'ha trobat el dispositiu '" . $device . "'");
	return $errorResponse;
    }

    //Fem la crida HTTP al device
    $deviceURL = $devices[$device] . '/cmds/' . $request->getAttribute("action") . '?' . $request->getUri()->getQuery();

 
    $deviceResponseBody = @file_get_contents($deviceURL);
    
    if($http_response_header === NULL){
        $deviceStatusCode = 404;
        $deviceResponseBody = "No s'ha trobat la URL '" . $deviceURL . "'";
    }else{
        $deviceStatusCode = (int)explode(' ', $http_response_header[0])[1];
    }

    //Retornem HTTP StatusCode i Response original
    $deviceResponse = $response->withStatus($deviceStatusCode);
    $deviceResponse->getBody()->write($deviceResponseBody);

    return $deviceResponse;
});

// Testing HTTP 200 responses
$app->get('/test/echo/[{string}]', function ($request, $response, $args) {
    $response->getBody()->write($args["string"]);

    return $response;
});

// Testing HTTP 400 responses
$app->get('/test/error', function ($request, $response, $args) {
    $errorResponse = $response->withStatus(400);
    $errorResponse->getBody()->write("error 400");
    return $errorResponse;
});


