<?php
include("actions.php");
if (!empty($_GET["q"]) && !empty($_GET["type"])) {
    getResults($_GET["q"], $_GET["type"]);
} else {
    header("Location: index.php");
    exit();
}