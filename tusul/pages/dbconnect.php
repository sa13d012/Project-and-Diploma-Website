<?php
	error_reporting(E_ALL); 
	ini_set('display_errors', 0);

	$DBhost = "localhost";
	$DBuser = "root";
	$DBpass = "uga9560";
	$DBname = "test22";
	 
	$DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
    if ($DBcon->connect_errno) {
    	die("ERROR : -> ".$DBcon->connect_error);
    }
function test_input(){
	$attack_name = strip_tags($_POST['attack_name']);
    $attack_name = strip_tags($_POST['short_def']);
    $attack_name = strip_tags($_POST['full_def']);
    return $attack_name;
  
}