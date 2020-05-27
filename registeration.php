<?php
	require_once('config.php')
?>
<!DOCTYPE html>
<html>
	<head>
		<title>User Registration | PHP</title>
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.min.css">
	</head>
	<body>
		<div>
			<?php
				if(isset($_POST['create'])){
					$firstname = $_POST['firstname'];
					$lastname = $_POST['lastname'];
					$email = $_POST['email'];
					$password = $_POST['password'];

					$sql = "INSERT INTO users (firstname, lastname, email, password ) VALUES(?,?,?,?)";
					$stminsert = $db->prepare($sql);
					$result = $stminsert->execute([$firstname, $lastname, $email, $password]);
					if($result){
						echo 'True!!! dummy dummt no careCongrats! 😃';
					}
					else{
						echo 'False! Sorry, there were some errors. ☹'	;
					}
				}
			?>
		</div>
		<div>
			<form action = "registeration.php" method = "post">
				<div class = "container">
					<div class="row">
						<div class = "col-sm-3">
							<h1>Registeration</h1>
							<p>Fill up the form with correct values.</p>
							<hr class = "mb-3">
							<label for  = "firstname"><b>First Name</b></label>
							<input class = "form-control" id = "firstname" type = "text" name = "firstname" required>

							<label for  = "lastname"><b>Last Name</b></label>
							<input class = "form-control" id = "lastname" type = "text" name = "lastname" required>

							<label for  = "Email Address"><b>Email Address</b></label>
							<input class = "form-control" id = "email" type = "email" name = "email" required>

							<label for  = "Password"><b>Password</b></label>
							<input class = "form-control" id = "password" type = "Password" name = "password" required>

							<hr class = "mb-3">
							<input class = "btn btn-primary" type = "submit" id = "register" name = "create" value = "Sign Up">
						</div>
					</div>
				</div>
			</form>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<script type="text/javascript">
			$(function(){
				$('#register').click(function(){
					var valid = this.form.checkValidity();
					if(valid){
						var firstname = $('#firstname').val();
						var lasttname = $('#lastname').val();
						var email = $('#email').val();
						var password = $('#password').val();
						e.preventDefault();
						$.ajax({
							type: 'POST',
							url: 'process.php',
							data: {firstname: firstname, lastname: lastname, email: email, password: password},
							success: function(data){
								Swal.fire({
								  'title': 'Results:',
								  'text': data,
								  'type': 'success'
								})
							},
							error: function(data){
								Swal.fire({
								  'Results:',
								  'False! Sorry, there were some errors. ☹',
								  'error'
								})
							}
						});
						Swal.fire(
						  'Resuls:',
						  'True!!! Congrats! 😃',
						  'success'
						)
					}
					else{
						Swal.fire(
						  'Results:',
						  'False! Sorry, there were some errors. ☹',
						  'error'
						)
					}
				});
			});
		</script>
	</body>
</html>