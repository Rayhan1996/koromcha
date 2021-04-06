<?php 	
        require_once('includes/head.php');
		require_once('config.php');
		
?>
<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $_SESSION['loggedin'] = $results['loggedin'];
    $_SESSION['success_message']="You are successfully logged in";
    header("location: index.php");
    exit;
}

// Define variables and initialize with empty values
$firstname=$lastname=$email = $password = $confirm_password =$user_type= "";
$firstname_err=$lastnam_erre=$email_err = $confirm_password_err =$user_type_err= "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(trim($_POST["email"])){
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE email = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $email_err="This email is already taken.";
                } else{
                    
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    if(empty(trim($_POST["user_type"]))){
        $user_type_err = "Please select user type.";     
    } else{
        $user_type = trim($_POST["user_type"]);
    }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($user_type_err)){

        
        // Prepare an insert statement
        $sql = "INSERT INTO users (firstname,lastname, email, password, userType) VALUES (?,?,?,?,?)";
         
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssi",$param_fname,$param_lname, $param_email, $param_password,$param_user_type);
            
            // Set parameters
			$param_fname=$_POST["fname"];
			$param_lname=$_POST["lname"];
            $param_email = $_POST["email"];
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_user_type=$_POST["user_type"];
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                #echo "Insert successfully.";
                header("location:login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $mysqli->close();
}
?>
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle bg-pt" style="background-image:url(images/banner/bnr2.jpg);">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Register</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="#">Home</a></li>
							<li>Register</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="section-full content-inner shop-account">
            <!-- Product -->
            <div class="container">
                <div class="row">
					<div class="col-md-12 text-center">
						<h3 class="font-weight-700 m-t0 m-b20">Create An Account</h3>
					</div>
				</div>
                <div class="row">
					<div class="col-md-12 m-b30">
						<div class="p-a30 border-1  max-w500 m-auto">
							<div class="tab-content">
								<form id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="tab-pane active">
									<h4 class="font-weight-700">PERSONAL INFORMATION</h4>
									<p class="font-weight-600">If you have an account with us, please log in.</p>
									<div class="form-group">
										<label class="font-weight-700">First Name *</label>
										<input name="fname" required="" class="form-control" placeholder="First Name" type="text">
									</div>
									<div class="form-group">
										<label class="font-weight-700">Last Name *</label>
										<input name="lname" required="" class="form-control" placeholder="Last Name" type="text">
									</div>
									<div class="form-group">
										<label class="font-weight-700">E-MAIL *</label>
										<input name="email" required="" class="form-control" placeholder="Your Email Id" type="email">
									</div>
									<div class="form-group">
										<label class="font-weight-700">PASSWORD *</label>
										<input name="password" required="" class="form-control " placeholder="Type Password" type="password">
									</div>
									<div class="form-group">
										<label class="font-weight-700">CONFIRM PASSWORD *</label>
										<input name="confirm_password" required="" class="form-control " placeholder="Type Password" type="password">
									</div>
                                    <div class="form-group">
                                    <label class="font-weight-700">ACCOUNT TYPE *</label>
                                        <select name="user_type">
                                            <option value="">Select User Type</option>
                                            <option value=1>Admin</option>
                                            <option value=2>Buyer</option>
                                            <option value=3>Seller</option>
                                        </select>
                                    </div>
									<div class="text-left">
										<button class="site-button button-lg outline outline-2">CREATE</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- Product END -->
		</div>
		<!-- contact area  END -->
    </div>
    <!-- Content END-->
<?php 	require_once('includes/foot.php');


?>