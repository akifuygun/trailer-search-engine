<?php
define("APP_NAME", "trailer-search-engine");
define("YOUTUBE_TOKEN", "AIzaSyCy59aINVV1xEao_1Y_LKqfMP8xBIKsBsI");
define("VIMEO_CLIENT_ID", "bb08e88bd87a5dc36ae9140395949e241cd6dd4b");
define("VIMEO_CLIENT_SECRET", "ISUwe+11MBTGgubm2xf6B5Q3wFVTiT7H8GIuRyRPGPiSWfiV0zfl4099yy7PGm6h1l3aJTJ0fi7Xp8dv5jTD2qlOoFrS0Pgau4RPncyqHfOKOqwL9OGIj0sLifddsvSd");



function httpStatus($code) {
    $status = array(
        100 => 'Continue',
        101 => 'Switching Protocols',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported'
    );
    return $status[$code] ? $status[$code] : $status[500];
}

function setHeader($code){
    header("HTTP/1.1 ".$code." ".HttpStatus($code));
    header("Content-Type: application/json; charset=utf-8");
}

?>