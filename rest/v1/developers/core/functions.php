<?php

require 'Database.php';
require 'Response.php';

function sendResponse($result)
{
    $response = new Response();
    $response->setSuccess(true);
    $response->setStatusCode(200);
    $response->setData($result);
    $response->send();
}


function checkDBConnection()
{
    try {
        $conn = Database::connectDB();
    } catch (PDOException $error) {
        $response = new Response();
        $error = [];
        $error['type'] = "invalid_request_error";
        $error['success'] = "false";
        $error['error'] = "Database connection failed";
        $response->setSuccess(false);
        $response->setData($result);
        $response->send();
        exit;
    }
}
