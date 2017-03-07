<?php

$manager = new BookManager($db);
$gender = $manager -> findGenders();

require('views/search.phtml');