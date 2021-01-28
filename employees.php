<?php 
	include_once('./controllers/common.php');
	include_once('./components/head.php');
	include_once('./models/employee.php');
	Database::connect('company', 'root', '');
?>
	<div style="padding: 10px 0px 10px 0px; vertical-align: text-bottom;">
		<span style="font-size: 125%;">Employees</span>
		<button class="button float-right edit_employee" id="0">Add Employee</button>
	</div>

    <table class="table table-striped">
    	<thead>
	    	<tr>
	      		<th scope="col">ID</th>
	      		<th scope="col">Name</th>
	      		<th scope="col">Age</th>
	      		<th scope="col">Salary</th>
	      		<th scope="col">Departement</th>

	      		<th scope="col"></th>
	    	</tr>
	  	</thead>
	  	<tbody>
		  	<?php	
				$employees = employee::all(safeGet('keywords'));
				foreach ($employees as $employee) {

			?>
    		<tr>
    			<td><?=$employee->id?></td>
    			<td><?=$employee->name?></td>
    			<td><?=$employee->age?></td>
    			<td><?=$employee->salary?></td>
    			<td><?=$employee->departament?></td>
    			<td>
    				<button class="button edit_employee" id="<?=$employee->id?>">Edit</button>&nbsp;
    				<button class="button delete_employee" id="<?=$employee->id?>">Delete</button>
				</td>
    		</tr>
    		<?php } ?>
    	</tbody>
    </table>

<?php include_once('./components/tail.php') ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.edit_employee').click(function(event) {
			window.location.href = "edit_employee.php?id="+$(this).attr('id');
		});
	
		$('.delete_employee').click(function(){
			var anchor = $(this);
			$.ajax({
				url: './controllers/delete_employee.php',
				type: 'GET',
				dataType: 'json',
				data: {id: anchor.attr('id')},
			})
			.done(function(reponse) {
				if(reponse.status==1) {
					anchor.closest('tr').fadeOut('slow', function() {
						$(this).remove();
					});
				}
			})
			.fail(function() {
				alert("Connection error.");
			})
		});
	});
</script>