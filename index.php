<?php 
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \ximass\DB\Page;
use \ximass\Model\Category;

$app = new Slim();

$app->config('debug', true);

require_once("admin.php");

$app->get('/', function() {

	$page = new Page();

	$page->setTpl("index");
    
});

$app -> get("/categories/:idcategory", function($idcategory){

	$category = new Category();

	$category -> get((int)$idcategory);

	$page = new Page();

	$page -> setTpl("category", [
		'category' => $category -> getValues(),
		'products' => []
	]);

});

$app->run();

 ?>