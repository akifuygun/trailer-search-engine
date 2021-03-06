<?php

function getResults($q) {
    $result = [];
    if (!empty($q)) {
        $API_URL = "http://".$_SERVER['SERVER_NAME']."/trailer-search-engine";
        $API_ROUTE = "/api/search.php?q=";
        $response = file_get_contents($API_URL.$API_ROUTE.$q);
        $result = json_decode($response);
    }
    return $result;
}

function getMovie($id) {
    $result = [];
    if (!empty($id)) {
        $API_URL = "http://".$_SERVER['SERVER_NAME']."/trailer-search-engine";
        $API_ROUTE = "/api/movie.php?id=";
        $response = file_get_contents($API_URL.$API_ROUTE.$id);
        $result = json_decode($response);
    }
    return $result;
}