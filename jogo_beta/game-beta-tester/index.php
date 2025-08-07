<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../../login.php");
    exit();
}

include("../../conexao.php");
// resto da página
?>

<!DOCTYPE html>
<html>
<head>
    <title>2D Game</title>
    <link type="text/css" href="assets/css/main.css" rel="stylesheet" />
</head>
<body>
    <canvas id="game"></canvas>


    <div id="log">
        <div id="fps"></div>
        <div id="coords"></div>
    </div>

    <script src="assets/js/viewport.js"></script>
    <script src="assets/js/player.js"></script>
    <script src="assets/js/map.js"></script>
    <script src="assets/js/main.js"></script>
    
</body>
</html>
