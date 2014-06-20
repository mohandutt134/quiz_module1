

<html>
	<head>
			<title>quiz1</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
			<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css" />
			<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Gurgaon Police<a>
				</div>
			</div>
		</div><br><br><br><br>
		<div class="container ">
			<div class="row" style="width:50%">
						<form role="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
								<legend>Student Registration Form</legend>
								<div class="form-group">
								<label>Your name</label>
								<input class="form-control input-sm" type="text" name="name"  placeholder="Full Name"></div>
								<div class="form-group">
								<label>Select School</label>
								<select name="school" size="1" class="form-control input-sm"><!-- names of all the schools -->
									<option selected>Select one...</option>
									<option value="ess">Ess Ess Convent</option>
									<option value="shivalik">shivalik cambridge college</option>
									<option value="simpkins">Simpkins School</option>
									<option value="aps">Agra Public School</option>
								</select></div>
								<div class="form-group">
								<label>Class</label>
								<select name="standard" size="1" class="form-control input-sm"><!-- names of all the schools -->
									<option selected>Select one...</option>
									<option value="1">1st</option>
									<option value="2">2nd</option>
									<option value="3">3rd</option>
									<option value="4">4th</option>
									<option value="5">5th</option>
									<option value="6">6th</option>
									<option value="7">7th</option>
									<option value="8">8th</option>
									<option value="9">9th</option>
									<option value="10">10th</option>
									<option value="11">11th</option>
									<option value="12">12th</option>
								</select></div>
								<div class="form-group">
								<label>E-mail ID</label>
								<input type="text" name="e_id" class="form-control input-sm" placeholder="Email ID"></div>
								<div class="form-group">
								<label>Contact No</label>
								<input type="text" name="number" class="form-control input-sm" placeholder="Contact Number"></div>
								<button type="submit" class="btn btn-success btn-medium">Submit</button>
							
						</form>
			</div><!-- end row--> 
		</div><!--end container-->
			<script src="js/jquery-1.9.1.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/custom.js"></script>
	<script>
	</script>
	</body>
</html>
<?php
	$conn=mysql_connect('127.0.0.1','root','password') or die("connection failed");
	$name=mysql_real_escape_string($_POST['name'],$conn);	
	$school=mysql_real_escape_string($_POST['school'],$conn);
	$class=mysql_real_escape_string($_POST['standard'],$conn);
	$email=mysql_real_escape_string($_POST['e_id'],$conn);
	$number=mysql_real_escape_string($_POST['number'],$conn);
	if((!$name) or (!$school) or (!$class) or (!$email) or (!$number)){
		echo 'please Insert properly';
	}
	else{
		
		$db=@mysql_select_db('quiz',$conn)or die("could not select database");
		
		$result=mysql_query("INSERT INTO user (name,school_name,class,email_id,contact_no)VALUES ('{$name}','{$school}','{$class}','{$email}','{$number}')",$conn)or die('query execution failed'.mysql_error());
		if($result){
			$host=$_SERVER['HTTP_HOST'];
			$path=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
			header('Location: http:instruction.php');
			exit;
		}
	}
?>