<div class="container d-flex justify-content-center">
    <div class="mt-3">
        <h1 class="site-name">Trailer Search Engine</h1>
        <form class="form-horizontal" id="searchForm" method="GET" action="index.php">
            <div class="input-group">
                <input id="search" type="text" class="form-control" placeholder="Search for a Trailer" name="q" value="<?=array_key_exists("q", $_GET) ? $_GET["q"] : "";?>">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>