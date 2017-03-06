<?php
$errors = [];
$page = "categories";
$db = mysqli_connect("192.168.1.57","animaniax","animaniax","animaniax");???????????
session_start();
$access = ["search", "search_elem"];
if (isset($_GET['page']) && in_array($_GET['page'], $access))
{
    $page = $_GET['page'];
}
function __autoload($classname)// http://php.net/manual/fr/function.autoload.php
{
	require('models/'.$classname.'.class.php');
}
$access_traitement = ["logout"=>"users", "login"=>"users", "register"=>"users", "create_category"=>"category", "cart"=>"orders",
						"user"=>"users", "create_product"=>"Products", "product"=>"orders"]; // comments
if (isset($_GET['page'], $access_traitement[$_GET['page']]))
{
	$traitement = $access_traitement[$_GET['page']];
	require('apps/traitement_'.$traitement.'.php');
}
if (isset($_GET['ajax']))
	require('apps/'.$page.'.php');
else
	require('apps/skel.php');
?>