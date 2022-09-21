<?php

include '../src/App/Responder.php';

echo match (true) { # PHP 8
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
        && $id
    => $deviceController->read($id),

        # 404 Not found
    default
    => (new $Responder($template))->notFound()
};
