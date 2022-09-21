<?php

declare(strict_types=1);

use App\Responder;

$action = '';
$assetTag     = '';

if (array_key_exists('QUERY_STRING', $_SERVER)) {
    parse_str($_SERVER['QUERY_STRING'], $qs);

    if (array_key_exists('action', $qs)) {
        $action = (string) $qs['action'];
    }

    if (array_key_exists('id', $qs)) {
        $assetTag = (int) $qs['id'];
    }
}

$requestMethod = (string) $_SERVER['REQUEST_METHOD'];

echo match (true) {
# CREATE - ?action=create
    # GET
    $action === 'create'
    && $requestMethod === 'GET'
        => $deviceController->new(),
    # POST
    $action === 'create'
    && $requestMethod === 'POST'
        => $deviceController->create($_POST),

# Read - ?action=read&id=int
    # GET
    $action === 'read'
    && $requestMethod === 'GET'
    && $assetTag
        => $deviceController->read($assetTag),

# UPDATE - ?action=update&id=int
    # GET
    $action === 'update'
    && $requestMethod === 'GET'
    && $assetTag
        => $deviceController->edit($assetTag),
    # POST
    $action === 'update'
    && $requestMethod === 'POST'
    && $assetTag
        => $deviceController->update($_POST),

# DELETE - ?action=delete&id=int
    # GET
    $action === 'delete'
    && $requestMethod === 'GET'
    && $assetTag
        => $deviceController->deleteRequest($assetTag),
    # POST
    $action === 'delete'
    && $requestMethod === 'POST'
    && $assetTag
        => $deviceController->delete($assetTag),

# Home
    # GET
    $action === ''
    && $requestMethod === 'GET'
        => $deviceController->index(),

# 404 Not found
    default
        => (new Responder($template))->notFound()
};