<?php
defined("BASEPATH") or exit("No direct script access allowed");

$username = "root";
$password = "";
$hostname = "localhost";
$dbname = "kamus-sunda";

$db = mysqli_connect($hostname, $username, $password, $dbname)
  or die("Unable to connect to MySQL");