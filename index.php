<?php

$request = $_SERVER['REQUEST_URI'];
$request = parse_url($request, PHP_URL_PATH);
$request = trim($request, "/");

if ($request == "") {
    require __DIR__ . "/pages/home.php";
    exit;
}

$file = __DIR__ . "/pages/" . $request . ".php";

if (file_exists($file)) {
    require $file;
} else {
    http_response_code(404);
    echo "<h1>404 - Page Not Found</h1>";
}
