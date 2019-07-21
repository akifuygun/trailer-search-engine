<?php
include("functions.php");
include "libs/tmdb/tmdb-api.php";
include("libs/tmdb/config.php");

$method = $_SERVER["REQUEST_METHOD"];

if ($method == "GET" && !empty($_GET["q"])) {

    $tmdb = new TMDB($cnf);
    $movies = $tmdb->searchMovie($_GET["q"]);
    $result = [];
    $i = 0;
    foreach($movies as $movie) {
        $i++;
        if (!empty($movie->getPoster())) {
            $result["movies"][] = [
                "id" => $movie->getID(),
                "title" => $movie->getTitle(),
                "poster" => "https://image.tmdb.org/t/p/w600_and_h900_bestv2" . $movie->getPoster(),
                "trailers" => $movie->getTrailers(),
                "year" => substr($movie->get("release_date"), 0, 4)
            ];
        }
	}
    $result["count"] = $i;

    setHeader(200);
    echo json_encode($result);
} else {
    setHeader(400);
}

?>