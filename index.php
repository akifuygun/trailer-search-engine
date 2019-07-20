<?php
include("actions.php");
if (!empty($_GET["q"])) {
    $results = getResults($_GET["q"]);
}
?>
<!doctype html>
<html lang="en">
<head>
    <?php include("partials/head.php"); ?>
</head>
<body class="pb-5">
<?php include("partials/form.php"); ?>
<?php if ($results->count > 0) {?>
<div class="container">
    <h2>Select Your Movie</h2>
    <div class="row">
        <?php foreach($results->movies as $movie) {?>
        <div class="col-2 p-2">
            <a href="show.php?id=<?=$movie->id;?>" class="border d-block text-center p-1">
                <img src="<?=$movie->poster;?>" class="img-fluid mb-2 d-block">
                <span><?=$movie->title;?></span>
            </a>
        </div>
        <?php } ?>
    </div>
</div>
<?php }?>
<?php include("partials/footer.php"); ?>
</body>
</html>
