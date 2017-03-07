<?php
$errors = [];
$page = "categories";
$db = mysqli_connect("192.168.1.95","recherche","recherche","recherche");
session_start();
$access = ["search", "search_elem"];
// if (isset($_GET['page']) && in_array($_GET['page'], $access))
// {
    // $page = $_GET['page'];
// }
function __autoload($classname)// http://php.net/manual/fr/function.autoload.php
{
	require('models/'.$classname.'.class.php');
}
$access_traitement = ["search"=>"books", "search_elem"=>"books"]; // comments
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