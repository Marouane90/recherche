<?php
$manager = new Manager($db);
$genders = $manager->findGenders();
require('views/search.phtml');
?>