<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZhenshengLIU</title>
    
    <?php
    $css = 'style1'; 
    if (isset($_COOKIE['css'])) {
        $css = $_COOKIE['css'];
    }
    ?>

    <link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>.css">
</head>
