<?php
include("connection.php");

function fail($value)
{
    $message = '
        <div class="alert alert-danger" role="alert">
            '. $value .'
        </div>
    ';
    return $message;
}

function success($value)
{
    $message = '
        <div class="alert alert-success" role="alert">
            '. $value .' 
        </div>
    ';
    return $message;
}
