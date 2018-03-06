<?php
		session_start();
		$db = mysqli_connect('localhost', 'root', '', "lagos_corpers") or die(mysqli_error($db));

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Corper Registration</title>

<style>
		body {background-color:#008000;}
		
		
			
			
		#img {
			float:left;}
</style>
</head>

<body>
<div id="img">
            
            <img src="nysclogo.png" size=00px/>
            
            
            </div>


<div id="signup">
    <p class="note"> <h2><b>New User? Register Here</b></h2></p>
    
    
    
    	<?php
		
			$wrong = array();
			
			if(array_key_exists('register', $_POST)){
				
				if(empty($_POST['firstname'])){
 					
					$wrong[] = "Please Enter your Firstname";	
				} else {
				
				$firstname = mysqli_real_escape_string($db, $_POST['firstname']);	
				}
				
				
				if(empty($_POST['lastname'])){
					
					$wrong[] = "Please Enter your lastname";	
				} else {
				
				$lastname = mysqli_real_escape_string($db, $_POST['lastname']);	
				}
				
				if(empty($_POST['email'])){
					
					$wrong[] = "Please Enter your Email";	
				} else {
				
				$email = mysqli_real_escape_string($db, $_POST['email']);	
				}

				
				if(empty($_POST['statecode'])){
					
					$wrong[] = "Please Enter your State code number Number";	
				} else {
				
				$statecode = mysqli_real_escape_string($db, $_POST['statecode']);	
				}
				
				
				if(empty($_POST['password'])){
					
					$wrong[] = "Please Enter your Password";	
				} else {
				
				$password = mysqli_real_escape_string($db, $_POST['password']);	
				}
				
				if(empty($wrong)){
				
			
			
			   $check = mysqli_query($db, "SELECT * FROM corper_reg WHERE email = '".$email."' || password = '".sha1($password)."'")
			   						 or die(mysqli_error);
			
				if(mysqli_num_rows($check) == 0){
					
					$insert = mysqli_query($db, "INSERT INTO corper_reg VALUES (NULL,
					
																	'".$firstname."',
																	'".$lastname."',
																	'".$email."',
																	'".$statecode."',
																	'".sha1($password)."'
																	)") or die(mysqli_error($db));
						$reg = "You have been registered";
						header("Location:corper_login.php?reg=$reg");
					
				} else { 
					
					$incorrect = "Email or Password already exists";
					header("Location:corper_login.php?incorrect=$incorrect");	
					
				}
					
				} else {
					
					foreach($wrong as $wrongs){
					
						echo '<p class="error">*'.$wrongs.'</p>';	
					}
				}
				
			}
		
		
			if(isset($_GET['incorrect'])){
			$incorrect = $_GET['incorrect'];
			echo '<p class="error">'.$incorrect."</p>";		
			}
		
			if(isset($_GET['reg'])){
			
				$register = $_GET['reg'];
				echo '<p class="error">'.$register."</p>";	
				
			}
		
		?>
    
    <form action="corper_reg.php" method="post">
    	<fieldset style="width:150px; margin:100px 100px 100px 100px">
    	<p class="form2"><b>Firstname:</b>
        <input type="text" name="firstname" value="<?php if(isset($_POST['firstname'])){echo $_POST['firstname'];} ?>"/></p>
        <p class="form2"><b>Lastname:</b> 
        <input type="text" name="lastname" value="<?php if(isset($_POST['lastname'])){echo $_POST['lastname'];} ?>"/></p>
        <p class="form2"><b>Email:</b>
        <input type="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>"/></p>
        <p class="form2"><b>State Code Number:</b>
        <input type="text" name="statecode" value="<?php if(isset($_POST['statecode'])){echo $_POST['statecode'];} ?>"/></p>
        <p class="form2"><b>Password: </b>
        <input type="password" name="password"/></p>
        <button type="submit" name="register" /><b>Register</b></button>
    	</fieldset>
    </form>

	</div>
            
</body>
</html>
















</body>
</html>