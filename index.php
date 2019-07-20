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
<?php if (!empty($results)) {?>
<div class="container">
    <h2>Results</h2>
</div>
<?php }?>
<?php include("partials/footer.php"); ?>
</body>
</html>
