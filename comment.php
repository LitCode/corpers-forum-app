<?php

		 session_start();
		
		$db = mysqli_connect('localhost', 'root', '', "lagos_corpers") or die(mysqli_error($db));
	
			$email = $_SESSION['email'];
			$password = $_SESSION['password'];
			$firstname = $_SESSION['firstname'];
			
	
	
	       $cate_id = $_GET['cat_id'];
	       $topic_id = $_GET['topic_id'];
		   
		   $boss = mysqli_query($db, "SELECT * FROM comment") or die(mysqli_error($db));
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
      <div id="headline"><p><em><b>>CDS GROUP</b></em></p>
     
        <h1><img src="Template/images/header.jpg" width="590px" /></h1>
        
        
       
       	 			
      </div>
    
     	
	<table border="1">
        
        	<tr>
            	 <th>CONTENT</th><th>COMMENT BY</th><th>DATE</th>
            </tr>
            
            <tr>
            	
                <?php
				
				while($result = mysqli_fetch_array($boss)){
			
			    	extract($result);	
					
				
				?>
            
           <tr>
				<td><?php echo $content; ?></td>
                <td><?php echo $firstname; ?></td>
                <td><?php echo $date; ?></td>
            
            </tr>
            
            <?php } ?>

   		 </table>
    
    <?php
	
		$content = mysqli_query($db, "SELECT topic_content FROM post_topic WHERE topic_id= '".$topic_id."'") or die(mysqli_error($db));
		
		while($response = mysqli_fetch_array($content)){
			extract($response);
			
		echo "Topic".'<p id="top1">'.$topic_content."</p>";
		}
	
	?>
    
    
    	<?php
			
			$error = array();
			
			if(array_key_exists('comment', $_POST)){
				
				if(empty($_POST['box'])){
					
					$error[] = "Please post a comment";	
				} else {
					
				$comment = mysqli_real_escape_string($db, $_POST['box']);	
				}
				
				if(empty($error)){
				
				$insert = mysqli_query($db, "INSERT INTO comment VALUES
															   (NULL,
															   '".$comment."',
															   '".$topic_id."',
															   '".$firstname."',
															   NOW())") or die(mysqli_error());
															   
					$success = "Your comment has been posted";
					header("Location:comment.php?cat_id=$cate_id&topic_id=$topic_id&success=$success");	
				} else {
				
					foreach($error as $final_error){
						echo $final_error;	
					}
				}
			}
		
		?>
    
    
    
    <form action="comment.php?cat_id=<?php echo $cate_id ?>&topic_id=<?php echo $topic_id ?>" method="post">
    
    	<p id="par1">Post a comment:<br/>
        	<textarea name="box" cols="20" rows="7"></textarea>
         </p>
    
    	<input type="submit" name="comment" value="Post Comment"/>
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
    	
	<li><a href="comment.php?cat_id=<?php echo $category_id; ?>&category_name=<?php echo $category_name ?>"><?php echo $category_name ?></a></li>
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