<?php
	$db = mysqli_connect('localhost', 'root', '', "lagos_corpers") or die(mysqli_error($db));

	session_start();
	
			$email = $_SESSION['email'];
			$password = $_SESSION['password'];
			$firstname = $_SESSION['firstname'];
			
			//if(isset($_GET['cat_id']) && isset($_GET['category_name'])) {
			//$cate_id = $_GET['cat_id'];
			//$cate_name = $_GET['category_name'];
		//	} 
			
			$link = mysqli_query($db, "SELECT * FROM topic_category") or die(mysqli_error($db));
			
	

?>

		
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
<link href="stylehome.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lagos Corpers Home</title>
</head>

<body>
			<?php
			
			
			echo '<p id="welcome">'."Logged in user: <span>".$firstname.'</span></p>';
			
			?>
	         
        	<div id="main">
 				 <div id="left">
    				<div id="top">
     					 <dl class="left">
       						 <dt>Latest news</dt>
       							<dd><a href="#">Governor visits camp</a></dd>
       						    <dd><a href="#">Corper wins Most beautiful girl in Nigeria</a></dd>
        						<dd><a href="#">Best cds group</a></dd>
                                <dd><a href="#">How to write a good CV</a></dd>
     					 </dl>
     		<dl class="right">
       			
        			
     		 </dl> 
      <div id="topbottom"> </div>
    </div>
    <div id="content">
      <div id="headline"><p><em><b><marquee direction="left"> WELCOME TO EKO CORPERS</marquee></b></em></p>
     
        <h1><img src="nysclogo.png" width="215px" /></h1>
        <marquee direction="up"><img src="background.jpg" /></marquee>
       	 			
      </div>
       <h1></h1>
      <h3></h3>
     	<br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
      <!--   <p> <b><em>What will you like to share today? </em></b> <br/> <textarea name="topic" rows="8" cols="70"></textarea>
                         
             			</p>
                        <input type="submit" name="submit" value="Click To Post" /> -->
    </div>
  </div>
  <div id="right">
    <div style="background: url(Template/images/topright.gif) no-repeat top right; height: 25px;"></div>
    <div id="inner">
      <img src="Template/images/header.jpg" width="150px" height="90px"/>
        </div> 
     
      <br />
      <h5><b>Links</b></h5>
      <ul class="nav">
        <li><a href="home_page.php">Home</a></li>
		<li><a href="cds.php">Cds Groups</a></li>
		<li><a href="profile.php">Profile</a></li>
		<!--<li><a href="post_topic.php">Post a Topic</a></li>-->
                
      </ul>
      <h5><b>Information</b></h5>
      <ul class="nav">
        				 <?php
		
	
	while($ref = mysqli_fetch_array($link)){
		extract($ref);
	?>
    	
	<li><a href="post_topic.php?cat_id=<?php echo $category_id; ?>&category_name=<?php echo $category_name ?>"><?php echo $category_name ?></a></li>
    <?php
			
	}
	
	?>
      </ul>
      <h5><b>Logout</b></h5>
      <div id="log">
      <p class="as"><a href="logout.php">Logout</a></p></div>
    </div>
  </div>
  <br style="clear: both;" />
</div>
<div id="footer"><h5>Copyright@2017LagosCorpers</h5></div> 
            
  
     
</body>
</html>