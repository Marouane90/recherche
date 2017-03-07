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
if (isset($_GET['ajax']))
	require('apps/'.$page.'.php');
else
	require('apps/skel.php');
?>