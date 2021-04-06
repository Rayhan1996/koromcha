<?php require_once('includes/head.php');
require_once('config.php');
$sql="SELECT * FROM users WHERE userId = ? ";
if($stmt = $mysqli->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("i", $param_userId);

    // Set parameters
    $param_userId =  $_SESSION['userId'];
    if($stmt->execute()){
        
        $result 	= $stmt->get_result();
        if($result->num_rows ==0){
            header("location: index.php");
            exit;
        }

        $data = $result->fetch_assoc();
        $userType=$data['userType'];
        $firstname=$data['firstname'];
        $lastname=$data['lastname'];
        $email=$data['email'];

    }
    
}


$sql = "SELECT * FROM usertypes WHERE userTypeId = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $userType);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$userTypeName=$data['userTypeName'];
$stmt->close();

if($userType!=3){
    header("location: index.php");
    exit;
}
if($userType==3){
    $sql = "INSERT INTO apply( applyJobId, applyBy, applyConfirm) VALUES (?,?,?)";
         
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("iib",$param_applyJobId,$param_applyBy, $param_applyConfirm);
        
        // Set parameters
        $param_applyJobId=$_GET["jobId"];
        $param_applyBy=$_SESSION['userId'];
        $param_applyConfirm = 0;

        // Attempt to execute the prepared statement
        if($stmt->execute()){
?>
<div class="container">
    <h5 class="post-title">Title of blog post</h5>
</div>
<?php
        } else{
            echo "Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }
}
?>


<?php require_once('includes/foot.php');

?>