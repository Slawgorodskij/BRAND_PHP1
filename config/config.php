<?php

const HOSTNAME = "localhost";
const USERNAME = "root";
const PASSWORD = "";
const DATABASE = "brand";


define("TEMPLATES_DIR", dirname(__DIR__) . '/templates/');
define("DIR", dirname(__DIR__));
define("MODELS", dirname(__DIR__) . '/models');
define("CONTROLLER", dirname(__DIR__) . '/controller');
define("DB", dirname(__DIR__) . '/db');

const LAYOUTS_DIR = '/layouts/';
const IMAGES_DIR ='images/product/';

include_once DIR . '/engine/core.php';

addendumController(MODELS);
addendumController(CONTROLLER);
addendumController(DB);











