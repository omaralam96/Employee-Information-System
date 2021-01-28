<?php
	include_once("../controllers/common.php");
	include_once("../models/employee.php");
	Database::connect('company','root','');
	$id = safeGet("id", 0);
	if($id==0) {
		$employee = new employee($id);
		$employee->name = safeGet("name");
		$employee->age = safeGet("age");
		$employee->salary = safeGet("salary");
		$employee->departament = safeGet("departament");

		$employee->add();
	} else {
		$employee = new employee($id);
		$employee->name = safeGet("name");
		$employee->age = safeGet("age");
		$employee->salary = safeGet("salary");
		$employee->departament = safeGet("departament");
		$employee->save();
	}
	header('Location: ../employees.php');
?>