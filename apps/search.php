<?php
<<<<<<< HEAD
// if (isset($_GET['page'], $_GET['author'])
// {
	require('views/search.phtml');
// }
=======
$manager = new Manager($db);
$genders = $manager->findGenders();
require('views/search.phtml');
>>>>>>> a7398715feae2fb0b2ba0b9b2e9ced2bf3aef013
?>