<?php
session_start();

//reset the session user_id
$_SESSION['user_id'] = 0;

//get back to the homepage for unlogged users
header('location: ../../index.php');
