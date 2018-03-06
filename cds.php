<?php
	session_start();
	$_SESSION['email'];
			$_SESSION['password'];
			$_SESSION['firstname'];
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
       <h1></h1>
      <h3></h3>
     	<br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
         <p> <b><em>What will you like to share today? </em></b> <br/> <textarea name="topic" rows="8" cols="70"></textarea>
                         
             			</p>
                        <input type="submit" name="submit" value="Click To Post" />
    </div>
  </div>
  <div id="right">
    <div style="background: url(Template/images/topright.gif) no-repeat top right; height: 25px;"></div>
    <div id="inner">
         <p><b>CDS GROUPS</b></p>
        </div> 
     
      <br />
      <h5><b>Links</b></h5>
      <ul class="nav">
        <li><a href="home_page.php">Home</a></li>
		<li><a href="cds.php">Cds Groups</a></li>
		<li><a href="profile.php">Profile</a></li>
		<li><a href="post_topic.php">Post a Topic</a></li>
                
      </ul>
      <h5><b>Information</b></h5>
      <ul class="nav">
        				<li> <a href="">Newsfeed</a> </li>
                    	<li> <a href="">Trending Topic</a> </li>
                    	<li> <a href="">Job opportunities </a> </li>
                        <li> <a href="">Politics </a> </li>
                        <li> <a href="">Entertainment</a> </li>
                        <li> <a href="">Sports</a> </li>
                        <li> <a href="">Corper of the week</a> </li>
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