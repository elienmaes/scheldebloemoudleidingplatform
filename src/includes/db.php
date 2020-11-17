<?php

const DB_DSN = 'mysql:dbname=schol;host=127.0.0.1;port=3306';        //naar welke database wordt geconnecteerd
const DB_USER = 'root';
const DB_PWD = 'root';

//connectie maken met DB
$db = new PDO(DB_DSN, DB_USER, DB_PWD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);     //enkel bedoelt voor development, moet weg in productie
