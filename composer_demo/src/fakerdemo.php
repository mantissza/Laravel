<?php
    require_once('../vendor/autoload.php');
    $faker = Faker\Factory::create();
    echo $faker -> name() , "\n", $faker -> email() , "\n" , $faker -> text();
?>