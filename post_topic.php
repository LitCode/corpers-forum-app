<?php

		$db = mysqli_connect('localhost', 'root', '', "lagos_corpers") or die(mysqli_error($db));

	session_start();
	
			$email = $_SESSION['email'];
			$password = $_SESSION['password'];
			$firstname = $_SESSION['firstname'];
			
			if(isset($_GET['cat_id']) && isset($_GET['category_name'])) {
			$cate_id = $_GET['cat_id'];
			$cate_name = $_GET['category_name'];
			} 
			
			
			$link = mysqli_query($db, "SELECT * FROM topic_category") or die(mysqli_error($db));	
			 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="stylehome.css" rel="stylesheet" type="text/css" />
<title>Cds group</title>
</head>

<body>

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
      <div id="headline"><p><em><b>>CDS GROUP</b></em></p>
     
        <h1><img src="Template/images/header.jpg" width="590px" /></h1>
       
       	 			
      </div>
      <div>
      	  <table border="1">
          
          	    <tr>
                <th>CONTENT</th><th>POSTED BY</th><th>DATE</th>
                </tr>
            
      			<?php
					$select = mysqli_query($db, "SELECT * FROM post_topic WHERE category_id = '".$cate_id."'") or die (mysqli_error($db));
					
					while($view = mysqli_fetch_array($select)) {
						extract($view);
			
				?>
                
         <tr>
             <td><a href="comment.php?cat_id=<?php echo $cate_id ?>&topic_id=<?php echo $view['topic_id']?>"><?php echo $view['topic_content'];?></a>             </td>
                    <td><?php echo $view['posted_by'];?></td>
                    <td><?php echo $view['date'];?></td>
         </tr>
                <?php } ?>
      	  </table>
      </div>
       
     	<br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
      <?php  		
	 echo '<p id="par2">'.$cate_name.'</p><br/>';
	
	 
	  ?>
		
	<?php
			
			//if($cate_name == "Newsfeed" && $level == 0){
				
			
			//} else {  
			
			
			$error = array();
			
			if(array_key_exists('submit', $_POST)){
				
				if(empty($_POST['text'])){
					
					$error[] = "Please Post a Topic";	
				} else {
					
				$topic = mysqli_real_escape_string($db, $_POST['text']);	
				}
				
				if(empty($error)){
				
				$insert = mysqli_query($db, "INSERT INTO post_topic VALUES
															   (NULL,
															   '".$topic."',
															   '".$firstname."',
															   '".$cate_id."',
															  	NOW() )") or die(mysqli_error($db));
															   
					$success = "Your comment has been posted";
					header("Location:post_topic.php?cat_id=$cate_id&category_name=$cate_name");	
				} else {
				
					foreach($error as $er){
						echo $er;	
					}
				}
			}
		//}
		?>
	<form action="post_topic.php?cat_id=<?php echo $cate_id; ?>&category_name=<?php echo $cate_name ?>" method="post">
         <p> <b><em>What will you like to share today? </em></b> <br/> <textarea name="text" rows="8" cols="70"></textarea>
                         
             			</p>
                        <input type="submit" name="submit" value="Click To Post" /> 
    </form>
    
    </div>
  </div>
  <div id="right">
    <div style="background: url(Template/images/topright.gif) no-repeat top right; height: 25px;"></div>
    <div id="inner">
         <p><b>Post Topic</b></p>
        </div> 
     
      <br />
      <h5><b>Links</b></h5>
      <ul class="nav">
        <li><a href="home_page.php">Home</a></li>
		<li><a href="cds.php">Cds Groups</a></li>
		<li><a href="profile.php">Profile</a></li>
		<!--<li><a href="post_topic.php">Post a Topic</a></li> -->
                
      </ul>
      <h5><b>Information</b></h5>
      <ul class="nav">
        				<!--li> <a href="">Newsfeed</a> </li>
                    	<li> <a href="">Trending Topic</a> </li>
                    	<li> <a href="">Job opportunities </a> </li>
                        <li> <a href="">Politics </a> </li>
                        <li> <a href="">Entertainment</a> </li>
                        <li> <a href="">Sports</a> </li>
                        <li> <a href="">Corper of the week</a> </li> -->
          	
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
      <p><a href="logout.php">Logout</a></p></div>
    </div>
  </div>
  <br style="clear: both;" />
</div>
<div id="footer"><h5>Copyright@2017LagosCorpers</h5></div> 

            


</body>
</html>