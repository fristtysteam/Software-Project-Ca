<?php

require __DIR__ . '/vendor/autoload.php';

use Orhanerday\OpenAi\OpenAi;

$open_ai = new OpenAi('sk-proj-s3oZnpdH8i2xWTL05Vu1T3BlbkFJJ4Dl2XqY6pien8LkxlxF');

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
