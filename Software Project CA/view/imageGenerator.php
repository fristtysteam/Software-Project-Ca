<?php
require_once '../model/databaseConnection.php';
require_once '../model/doCart.php';
require_once '../model/cartModel.php';

include "../view/nav2.php";
include '../view/header.php';
include '../view/footer.php';

$isLoggedIn = isset($_SESSION['userId']);


?>
<head>
    <meta charset="UTF-8">
    <title>Image Generation using Open AI</title>
    <link rel="stylesheet" href="../css/aiStyle.css">
</head>
<body>
<h2>basic usage of Dall-E 2 mage Generation model of Open AI</h2>
<div class="container">
    <div class="user-action">
        <input type="text">
        <input type="text">
        <input type="text">
        <button>Get Images</button>
    </div>
        <div class ="img-container"></div>
</div>
<script>
    const input = document.querySelectorAll('input')
    const button = document.querySelector('button')
    const imgContainer = document.querySelector('.img-container')
    button.onclick = () => {
    if (input[0]){
        //now make a request using "POST" method
        var http  = new XMLHttpRequest();
        var data  = new FormData();
        data.append('prompt',input[0].value + input[1].value + input[2].value)
            http.open('POST','../model/request.php',true)
            http.send(data)
            http.onload = () => {
            imgContainer.innerHTML = ''
                var response = JSON.parse(http.response).data
                response.forEach(e => {
                var img = document.createElement('img')
                    img.src = 'data:image/jpeg;base64,' + e.b64_json
                    imgContainer.appendChild(img)
                });
            }
        }
}
</script>
</body>
</html>