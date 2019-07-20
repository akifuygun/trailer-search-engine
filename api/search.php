<?php
include("functions.php");

$method = $_SERVER["REQUEST_METHOD"];

if ($method == "GET") {
    setHeader(200);
    $result = [
        "https://www.youtube.com/watch?v=3sN-DKevBuE",
        "https://www.youtube.com/watch?v=81QOIjeElCA",
        "https://www.youtube.com/watch?v=xgUe2Ssu7R8"
    ];
    echo json_encode($result);
} else {
    setHeader(400);
}


?>