<?php

require __DIR__ . '/vendor/autoload.php';

use Orhanerday\OpenAi\OpenAi;

$open_ai = new OpenAi('');

// get "prompt"  param that we send from JS file
// test it using  "GET" request
$prompt = $_POST['prompt'];
//$prompt = $_GET['prompt'];

$complete = $open_ai->image([
        "prompt" => $prompt,
        "n" => 3,
        "size" => "256x256",
        "response_format" => "b64_json",
    ]
);

echo $complete;
