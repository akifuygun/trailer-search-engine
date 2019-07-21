<?php
require_once("functions.php");
require_once("libs/tmdb/tmdb-api.php");
require_once("libs/tmdb/config.php");
require_once("libs/google-api/vendor/autoload.php");
require_once("libs/vimeo/autoload.php");

$method = $_SERVER["REQUEST_METHOD"];

if ($method == "GET" && !empty($_GET["id"])) {

    $tmdb = new TMDB($cnf);
    $movie_raw = $tmdb->getMovie($_GET["id"]);
    $movie = json_decode($movie_raw->getJSON());
    $video_available = count($movie->videos->results) > 0 ? true : false;
    if (!empty($movie)) {
        $result = [
            "available" => true,
            "id" => $movie->id,
            "imdb" => "https://www.imdb.com/title/".$movie->imdb_id,
            "genres" => $movie->genres,
            "poster" => "https://image.tmdb.org/t/p/w600_and_h900_bestv2" . $movie->poster_path,
            "release_date" => $movie->release_date,
            "year" => substr($movie->release_date, 0, 4),
            "title" => $movie->title,
            "tagline" => $movie->tagline,
            "runtime" => $movie->runtime,
            "language" => $movie->spoken_languages[0]->name,
            "status" => $movie->status,
            "video" => [
                "available" => $video_available,
                "videos" => $movie->videos->results
            ],
            "description" => $movie->overview
        ];

        $client = new Google_Client();
        $client->setApplicationName(APP_NAME);
        $client->setDeveloperKey(YOUTUBE_TOKEN);
        $youtube = new Google_Service_YouTube($client);
        $videos = $youtube->search->listSearch("id,snippet", ["q" => $movie->title." trailer", "order" => "relevance", "maxResults" => 10, "type" => "video"]);
        if (count($videos->items) > 0){
            $result["youtube"]["available"] = true;
            foreach ($videos->items as $video) {
                $result["youtube"]["videos"][] = [
                    "name" => $video->snippet->title,
                    "key" => $video->id->videoId
                ];
            }
        } else {
            $result["youtube"]["available"] = false;
        }

        $lib = new \Vimeo\Vimeo(VIMEO_CLIENT_ID, VIMEO_CLIENT_SECRET);
        $token = $lib->clientCredentials(["public"]);
        $lib->setToken($token["body"]["access_token"]);
        $vimeo = $lib->request("/videos", ["query" => $movie->title." trailer", "per_page" => 10, "sort" => "relevant"], 'GET');
        if (count($vimeo["body"]["data"]) > 0){
            $result["vimeo"]["available"] = true;
            foreach ($vimeo["body"]["data"] as $video) {
                $result["vimeo"]["videos"][] = [
                    "name" => $video["name"],
                    "key" => substr($video["uri"],8)
                ];
            }
        } else {
            $result["vimeo"]["available"] = false;
        }

    } else {
        $result = [
            "available" => false
        ];
    }

    setHeader(200);
    echo json_encode($result);
} else {
    setHeader(400);
}

?>