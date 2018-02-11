<?php

class Interview
{
	// 1. make this property static so the scope resolution operator can be applied successfully
	public $title = 'Interview test';
}

$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';

$people = array(
	array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
	array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
	array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
	array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
	array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);
/* 2. attempts to access an element which may be undefined.  Can fix by writing the following instead:

if (issset($_POST['person']))
	$person = $_POST['person'];

this will check if that key exists before attempting to access the value associated with it
*/
$person = $_POST['person'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interview test</title>
	<style>
		body {font: normal 14px/1.5 sans-serif;}
	</style>
</head>
<body>

	<h1><?=Interview::$title;?></h1>
	<!-- 3-4. loop is never entered because the test condition never evaluates to true
		3. change the test condition to $i>0
		4. change the loop so it decrements instead of increments
	-->
	<!-- 5-6. concatenation operator is . but + used instead
		change both + to .
	-->
	<?php
	// Print 10 times
	for ($i=10; $i<0; $i++) {
		echo '<p>'+$lipsum+'</p>';
	}
	?>


	<hr>

	<!-- 7. $person is searching for the person key in $_POST but this is sending it in $_GET instead
		replace method="get" with method="post" so that $person will be assigned the value of the person array
	-->
	<form method="get" action="<?=$_SERVER['REQUEST_URI'];?>">
		<p><label for="firstName">First name</label> <input type="text" name="person[first_name]" id="firstName"></p>
		<p><label for="lastName">Last name</label> <input type="text" name="person[last_name]" id="lastName"></p>
		<p><label for="email">Email</label> <input type="text" name="person[email]" id="email"></p>
		<p><input type="submit" value="Submit" /></p>
	</form>

	<?php if ($person): ?>
		<p><strong>Person</strong> <?=$person['first_name'];?>, <?=$person['last_name'];?>, <?=$person['email'];?></p>
	<?php endif; ?>


	<hr>


	<table>
		<thead>
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($people as $person): ?>
				<tr>
					<!-- 8-10. $person is an array but it's elements are being referenced as if it's an object 
						delete the -> operator and enclose the properties in brackets and quotes instead
					-->
					<td><?=$person->first_name;?></td>
					<td><?=$person->last_name;?></td>
					<td><?=$person->email;?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</body>
</html>