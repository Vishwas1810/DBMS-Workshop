<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	
	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {	
			
		?>
		<script>
			alert("Fill All the Fields")
			javascript:self.history.back();
		</script>

		<?php		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		?>
		<script>
			alert("Data added successfully.");
			window.location.href = "home.php";
		</script>
		<?php
		// header("Location: home.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
}
?>
<html>
<head>	
	<title>Edit Data</title>

	<style type="text/css">
		.form-style-2{
			max-width: 500px;
			padding: 20px 12px 10px 20px;
			font: 13px Arial, Helvetica, sans-serif;
		}
		.form-style-2-heading{
			font-weight: bold;
			font-style: italic;
			border-bottom: 2px solid #ddd;
			margin-bottom: 20px;
			font-size: 15px;
			padding-bottom: 3px;
		}
		.form-style-2 label{
			display: block;
			margin: 0px 0px 15px 0px;
		}
		.form-style-2 label > span{
			width: 100px;
			font-weight: bold;
			float: left;
			padding-top: 8px;
			padding-right: 5px;
		}
		.form-style-2 span.required{
			color:red;
		}
		.form-style-2 .tel-number-field{
			width: 40px;
			text-align: center;
		}
		.form-style-2 input.input-field, .form-style-2 .select-field{
			width: 48%;	
		}
		.form-style-2 input.input-field, 
		.form-style-2 .tel-number-field, 
		.form-style-2 .textarea-field, 
		.form-style-2 .select-field{
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			border: 1px solid #C2C2C2;
			box-shadow: 1px 1px 4px #EBEBEB;
			-moz-box-shadow: 1px 1px 4px #EBEBEB;
			-webkit-box-shadow: 1px 1px 4px #EBEBEB;
			border-radius: 3px;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			padding: 7px;
			outline: none;
		}
		.form-style-2 .input-field:focus, 
		.form-style-2 .tel-number-field:focus, 
		.form-style-2 .textarea-field:focus,  
		.form-style-2 .select-field:focus{
			border: 1px solid #0C0;
		}
		.form-style-2 .textarea-field{
			height:100px;
			width: 55%;
		}
		.form-style-2 input[type=submit],
		.form-style-2 input[type=button]{
			border: none;
			padding: 8px 15px 8px 15px;
			background: #FF8500;
			color: #fff;
			box-shadow: 1px 1px 4px #DADADA;
			-moz-box-shadow: 1px 1px 4px #DADADA;
			-webkit-box-shadow: 1px 1px 4px #DADADA;
			border-radius: 3px;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
		}
		.form-style-2 input[type=submit]:hover,
		.form-style-2 input[type=button]:hover{
			background: #EA7B00;
			color: #fff;
		}
	</style>
</head>

<body>	
	<center>
	<div class="form-style-2">
		<div class="form-style-2-heading">Update The Information</div>
			<form name="form1" method="post" action="edit.php">
				<label for="field1"><span>Name </span><input type="text" class="input-field" name="name" value="<?php echo $name;?>" /></label>
				<label for="field2"><span>Age </span><input type="text" class="input-field" name="age" value="<?php echo $age;?>" /></label>
				<label for="field2"><span>Email </span><input type="text" class="input-field" name="email" value="<?php echo $email;?>" /></label>
				
				<input type="hidden" name="id" value=<?php echo $_GET['id'];?> />
				<label><span> </span><input type="submit" name="update" value="Update" /></label>
			</form>
			<a href="home.php">
				<label><span> </span><input type="submit" name="return" value="Return"/></label>
			</a>
		</div>
	</center>
</body>
</html>
