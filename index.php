<?php include_once('./controllers/common.php') ?>
<?php include_once('./components/head.php') ?>
<?php 	include_once('./models/database.php');
Database::connect("company","root","");
 ?>
    <h1 class="mt-5">Employee Information System</h1>
    <p class="lead">Manage Employees information like Name, Age and Salary</code>.</p>

<?php include_once('./components/tail.php') ?>