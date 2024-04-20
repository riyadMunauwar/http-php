<?php 

require_once('Request.php');
require_once('Response.php');


$request = Request::capture();

$response = new Response();

if ($request->method() === 'GET' && $request->uri() === '/') {
    $response->body('Hello, World!');
} else {
    $response->setStatusCode(404);
    $response->body('Not Found');
}

$response->header('Content-Type', 'text/plain');
$response->send();