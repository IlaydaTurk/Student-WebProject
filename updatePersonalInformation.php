<?php
session_start();
?>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<style>
.register{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
</style>
<body>
 <form class="form-horizontal" method="post" enctype="multipart/form-data" >
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                  
                        <h3>Welcome</h3>
						
                        <h4><?php echo"".$_SESSION["firstname"]."";?></h4>
						<h4><?php echo"".$_SESSION["lastname"]."";?></h4>
                        <input type="submit" formaction="HomePage.php" name=""  value="Back"/><br/>
                    </div>
                   <div class="col-md-9 register-right">
                       
                         <div class="tab-content" id="myTabContent">
						                             <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <h3 class="register-heading">Update Your Information</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input  name="firstname" type="text" class="form-control" placeholder="First Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input name="lastname" type="text" class="form-control" placeholder="Last Name *" value="" />
                                        </div>
										
										
										<div class="form-group">
                                            <input name="username" type="text" class="form-control" placeholder="UserName *" value="" />
                                        </div>
										<div class="form-group">
                                            <input name="department" type="text" class="form-control" placeholder="Department *" value="" />
											
                                        </div>
										<div class="form-group">
        
											<input name =birthdate type="date" id="birthdate" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control" placeholder="Password *" value="" />
                                        </div>
                                      
									
                                        <div class="form-group">
                                            <div class="maxl">
											Are you president?
                                                <label class="radio inline"> 
                                                    <input type="radio" name="president" value="yes" >
                                                    <span> 	Yes </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="president" value="no" >
                                                    <span>No </span> 
                                                </label>
												
											
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control" placeholder="Your Email *" value="" />
                                        </div>
                                       	<div class="form-group">
							Select image to upload:
							<input type="file" name="image"/>
							</div>
                                     
                                        <input name="submit" type="submit" class="btnRegister"  value="Update"/>
                                    </div>
                                </div>
  </div>
                          
                                    </div>
                                </div>
								 </div>
                                </div>
</form>

<?php

if(isset($_POST["submit"])){
		
		echo"'".$_SESSION["id"]."' ";
		$field_names = array("firstname","lastname","email","password","username","department","birthdate","president","image");
		$n_fields = 9;
		$count=0;
		for($i=0;$i<$n_fields; $i++) {
		$field_name=$field_names[$i];
			if(array_key_exists($field_name, $_POST)){ 
				$count++;
			}
		}
		
		$db=new mysqli("localhost","root","201511062", "canclub");
		$firstname=$_POST["firstname"];
		$lastname=$_POST["lastname"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		$username=$_POST["username"];
		$department=$_POST["department"];
		$president=$_POST["president"];
		$image=$_POST["image"];
		
		
		if($firstname!=''){ 
			
			$query_str1="UPDATE clubmember SET firstname = '$firstname' WHERE id = '".$_SESSION["id"]."' ";
				if ($db->query($query_str1)==TRUE){
			
				 echo "Firstname is updated." ;
		
		}
			}
		if($lastname!=''){ 
		
				$query_str2="UPDATE clubmember SET lastname = '$lastname' WHERE id = '".$_SESSION["id"]."' ";
				
			if ($db->query($query_str2)==TRUE){
			
				 echo "Lastname is updated." ;
		
		}
			}
		if($email!=''){ 
		
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			echo"Please enter a valid email address";}
			else {
				$query_str3="UPDATE clubmember SET email = '$email' WHERE id = '".$_SESSION["id"]."' ";
				
			if ($db->query($query_str3)==TRUE){
			
				 echo "Email is updated." ;
		
		}
			}
		}
		
		
		
		if($password!=''){ 
		
		if(strlen($_POST['password']) < 8){
			
			echo "Password is too short."; }
			
			else {
				
				$secret = password_hash($password, PASSWORD_BCRYPT);
				$query_str4="UPDATE clubmember SET password = '$secret' WHERE id = '".$_SESSION["id"]."' ";
				
			if ($db->query($query_str4)==TRUE){
			
				 echo "Password is updated." ;
		
		}
			}
		}
		if($username!=''){ 
		
		
				$query_str5="UPDATE clubmember SET username = '$username' WHERE id = '".$_SESSION["id"]."' ";
				
			if ($db->query($query_str5)==TRUE){
			
				 echo "Username is updated." ;
				 //$query_str2="select username from clubmember where username =\"" .$username . "\"  LIMIT 1";
		
		}
			}
		if($department!=''){ 
		
				$query_str6="UPDATE clubmember SET department = '$department' WHERE id = '".$_SESSION["id"]."' ";
				
			if ($db->query($query_str6)==TRUE){
			
				 echo "Department is updated." ;
		
		}
			}
		if($birthdate!=''){ 
		$birthDate=$_POST["birthdate"];
				$query_str7="UPDATE clubmember SET birthdate = '$birthdate' WHERE id = '".$_SESSION["id"]."' ";
				
			if ($db->query($query_str7)==TRUE){
			
				 echo "Birthdate is updated." ;
		
		}
			}
			
		if($president!=''){
			
    if($president=="yes"){
	$query_str8="UPDATE clubmember SET isPresident = true WHERE id = '".$_SESSION["id"]."' ";
	if ($db->query($query_str8)==TRUE){
			
				 echo "President is updated." ;
		
		}}
			
			else{
			$query_str8="UPDATE clubmember SET isPresident = false WHERE id = '".$_SESSION["id"]."' ";
			if ($db->query($query_str8)==TRUE){
			
				 echo "President is updated." ;
		
		}
				
			
		
		
			}
		}
		if(getimagesize($_FILES["image"]["tmp_name"])!=''){ 
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
		$query_str9="UPDATE clubmember SET photo = '$imgContent' WHERE id = '".$_SESSION["id"]."' ";
				
			$result =$db->query($query_str9);
		if ($result==TRUE){
			
				 echo "Photo is updated." ;
		
		}
		
			}
		}
		
			
		
}

		
			
		
	?>
	
	
	</body>
	</html>