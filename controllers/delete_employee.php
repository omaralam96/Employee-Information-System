<?php
	header('Content-Type: application/json; charset=utf-8');
	include_once("../models/employee.php");
	Database::connect('company', 'root', '');
	$employee = new employee($_GET['id']);
	$employee->delete();
	echo json_encode(['status'=>1]);
?>