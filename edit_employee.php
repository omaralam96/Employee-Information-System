<?php 
	include_once("./controllers/common.php");
	include_once('./components/head.php');
	include_once('./models/employee.php');
	$id = safeGet('id');
	Database::connect('company', 'root', '');
	$employee = new employee($id);
?>

    <h2 class="mt-4"><?=($id)?"Edit":"Add"?> Employee</h2>

    <form action="controllers/save_employee.php" method="post">
    	<input type="hidden" name="id" value="<?=$employee->get('id')?>">
		<div class="card">
			<div class="card-body">
				<div class="form-group row gutters">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="name" value="<?=$employee->get('name')?>" required>
					</div>
				</div>
				<div class="form-group row gutters">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Age</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="age" value="<?=$employee->get('age')?>" required>
					</div>
				</div>
				<div class="form-group row gutters">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Salary</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="salary" value="<?=$employee->get('salary')?>" required>
					</div>
				</div>
				<div class="form-group row gutters">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Departement</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="departament" value="<?=$employee->get('departament')?>" required>
					</div>
				</div>
		    	<div class="form-group">
		    		<button class="button float-right" type="submit">Add</button>
		    	</div>
		    </div>
		</div>
    </form>

<?php include_once('./components/tail.php') ?>