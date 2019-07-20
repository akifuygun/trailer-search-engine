<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Trailer Search Engine">
    <meta name="author" content="Mehmet Akif Uygun">
    <title>Trailer Search Engine</title>
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container d-flex justify-content-center">
    <div class="mt-5">
        <h1 class="site-name">Trailer Search Engine</h1>
        <form class="form-horizontal" id="searchForm" method="GET" action="search.php">
            <div class="input-group">
                <input id="search" type="text" class="form-control" placeholder="Search for a Trailer" name="q">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="js/events.js"></script>
</body>
</html>
