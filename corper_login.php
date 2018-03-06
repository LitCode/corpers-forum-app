

<?php

		$db = mysqli_connect('localhost', 'root', '', "lagos_corpers") or die(mysqli_error($db));

		session_start();

?>


     <div id="up">
    
    	  <p align="center"><b>LAGOS CORPERS FORUM</b></p>
    
      </div>
	<div id="text">
    
    	<h3><marquee>...connecting corpers in Lagos</marquee></h3>
	
	</div>
    <div id="container">
	
    
    <?php
		$error = array();
		if(array_key_exists('submit', $_POST))
	{
		
		if(empty($_POST['email'])) 
		{
		$error[] = "Corper wee! Please enter your Email";
		}else{
		$email = mysqli_real_escape_string($db, $_POST['email']);
		}
	
		if(empty($_POST['password'])) {
		$error[] = "Corper wee! Please enter your Password";
		}else{
		$password = sha1(mysqli_real_escape_string($db, $_POST['password']));
		}
	
		if(empty($error)) {
			
		$query = mysqli_query($db, "SELECT * FROM corper_reg WHERE email= '".$email."' AND password= '".$password."'")or die(mysqli_error($db));
							  
							  
			//echo mysqli_num_rows($query);
							  
							  
			if(mysqli_num_rows($query)== 1){
			$result = mysqli_fetch_array($query);
			
			$_SESSION['email'] = $result['email'];
			$_SESSION['password'] = $result['password'];
			$_SESSION['firstname'] = $result['firstname'];
			
		
			header("location:home_page.php");
			
			
			
			} else{
				
				$msg = "Invalid Email and Password";
				header("location:corper_login.php?msg=$msg");
			} 
			
		
		
		} else{
			foreach ($error as $final_error) {
			echo '<p class="error">*'.$final_error.'</p>';		
		
		}
		 
		
		}
		
		 if(isset($_GET['msg']))
		 {
			echo $_GET['msg'];
		 }


	}?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="stylelogin.css" rel="stylesheet" type="text/css" />
<title>Lagos corper Login page</title>
</head>

<body>

	
   <div class="login-page">
       

	 <form action="" method="POST" class="form1">
 		<fieldset style="width:50%; margin:105px 50px 95px 145px"> 
        	<!--<div class="form">-->
 			<legend><b>Lagos Corpers Login</b></legend>
         		<p><b>Email:</b> <input type="email" name="email"  size="35px" 
                placeholder="Fill in your email"/></p>
                		  
                <p><b>Password:</b> <input type="password" name="password" size="25px"
                 placeholder="Fill in your password"/></p>
                
                <p> <button type="submit" name="submit" style="margin-left:150px;"><b>Click to Login</b></button></p>
 				
                <p class="member"> <em>Not registered? Click on 
                this link to register <a href="corper_reg.php">Existing Member</a></em></p>
 
 		</fieldset>
	 </form>
   </div>
	</div> 
    </div> 



</body>
</html>