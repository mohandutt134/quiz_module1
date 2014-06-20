<?php
	if(!isset($_POST['name']) || !isset($_POST['school']) || !isset($_POST['standard']) || !isset($_POST['e_id']) || !isset($_POST['number'])){

	}
	else{
		$conn=mysql_connect('127.0.0.1','root','password') or die("connection failed");
		$db=@mysql_select_db('quiz',$conn)or die("could not select database");
		$name=mysql_real_escape_string($_POST['name'],$conn);	
		$school=mysql_real_escape_string($_POST['school'],$conn);
		$class=mysql_real_escape_string($_POST['standard'],$conn);
		$email=mysql_real_escape_string($_POST['e_id'],$conn);
		$number=mysql_real_escape_string($_POST['number'],$conn);
		$result=mysql_query("INSERT INTO user (name,school_name,class,email_id,contact_no)VALUES ('{$name}','{$school}','{$class}','{$email}','{$number}')",$conn)or die('query execution failed'.mysql_error());
		if($result){
			echo 'insertion successfull';
		}
	}
?>
