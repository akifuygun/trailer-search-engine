<?php
include("actions.php");
if (!empty($_GET["id"])) {
    $movie = getMovie($_GET["id"]);
} else {
    header("Location: index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <?php include("partials/head.php"); ?>
</head>
<body class="pb-5">
<?php include("partials/form.php"); ?>
<?php if ($movie->available) {?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
                <a href="<?=$movie->imdb; ?>" target="_blank"><img src="<?=$movie->poster; ?>" class="img-fluid mb-2 d-block"></a>
            </div>
            <div class="col-9">
                <h2><?=$movie->title;?> <span>(<?=$movie->year;?>)</span></h2>
                <?php if (count($movie->genres) > 0) {?>
                    <p><b>Genres: </b>
                    <?php foreach ($movie->genres as $genre) {
                        echo $genre->name.", ";
                    } ?>
                    </p>
                <?php } ?>
                <p><b>Tagline: </b> <?=$movie->tagline;?> </p>
                <p><b>IMDB: </b>  <a href="<?=$movie->imdb; ?>" target="_blank"><?=$movie->imdb; ?></a></p>
                <p><b>Runtime: </b> <?=$movie->runtime;?> min. </p>
                <p><b>Language: </b> <?=$movie->language;?> </p>
                <p><b>Status: </b> <?=$movie->status;?> </p>
                <p><b>Description: </b> <?=$movie->description;?> </p>
                <p>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?=$_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" target="_blank">
                        <i class="fab fa-facebook fa-2x color-facebook"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?text=Check this trailers! <?=$_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" target="_blank">
                        <i class="fab fa-twitter fa-2x color-twitter d-inline-block mx-3"></i>
                    </a>
                    <a href="whatsapp://send?text=Check this trailers! <?=$_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" data-action="share/whatsapp/share" target="_blank">
                        <i class="fab fa-whatsapp fa-2x color-whatsapp"></i>
                    </a>
                </p>
            </div>
        </div>
        <ul class="nav nav-tabs mt-5">
            <?php if ($movie->video->available) {?>
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tmdb-videos">TMDB Videos</a>
            </li>
            <?php } if ($movie->youtube->available) {?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#youtube-videos">Youtube Videos</a>
            </li>
            <?php } if ($movie->vimeo->available) {?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#vimeo-videos">Vimeo Videos</a>
            </li>
            <?php } ?>
        </ul>
        <div class="tab-content p-3 mb-5 border-left border-right border-bottom">
            <?php if ($movie->video->available) {?>
            <div class="tab-pane fade show active" id="tmdb-videos">
                <div class="row">
                <?php foreach ($movie->video->videos as $video) {
                    if ($video->site == "YouTube") {?>
                    <div class="col-6 mb-4">
                        <h4><?=$video->name;?></h4>
                        <div class="embed-container">
                            <iframe src="https://www.youtube.com/embed/<?=$video->key;?>" frameborder="0" allowfullscreen allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
                        </div>
                    </div>
                <?php } } ?>
                </div>
            </div>
            <?php } if ($movie->youtube->available) {?>
            <div class="tab-pane fade" id="youtube-videos">
                <div class="row">
                    <?php foreach ($movie->youtube->videos as $video) {?>
                        <div class="col-6 mb-4">
                            <h4><?=$video->name;?></h4>
                            <div class="embed-container">
                                <iframe src="https://www.youtube.com/embed/<?=$video->key;?>" frameborder="0" allowfullscreen allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php } if ($movie->vimeo->available) {?>
                <div class="tab-pane fade" id="vimeo-videos">
                    <div class="row">
                        <?php foreach ($movie->vimeo->videos as $video) {?>
                            <div class="col-6 mb-4">
                                <h4><?=$video->name;?></h4>
                                <div class="embed-container">
                                        <iframe src=https://player.vimeo.com/video/<?=$video->key;?>?title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=152444" frameborder="0" allowfullscreen allow="autoplay; fullscreen"></iframe>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
<?php } else { ?>
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">No moives found <i class="far fa-frown"></i> </h1>
            <p class="lead">Nothing found related with this id. Are you sure that you clicked to correct link?</p>
            <hr class="my-4">
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="index.php" role="button">Try Searching for Movies</a>
            </p>
        </div>
    </div>
<?php } ?>
<?php include("partials/footer.php"); ?>
</body>
</html>
