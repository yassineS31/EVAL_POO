<?php

include './utils/utils.php';
include './interface/interfaceModel.php';
include './abstract/abstractController.php';
include './model/ModelPlayer.php';
// views:
include './view/ViewHeader.php';
include './view/viewPlayer.php';
include './view/ViewFooter.php';
include './controller/playerController.php';


//obtains the user's url ( i d)
$url = parse_url($_SERVER['REQUEST_URI']);

//check the users's path
$path = isset($url['path']) ? $url['path'] : '/evalpoo/';


$bdd = connect();
$home = render();
