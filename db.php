<?php

$errors = "";

$db = mysqli_connect('localhost', 'root', '', 'ktelecomtest');

mysqli_query($db, "SET NAMES 'cp1251';");
mysqli_query($db, "SET CHARACTER SET 'cp1251';");
mysqli_query($db, "SET SESSION collation_connection = 'cp1251_general_ci';");

?>