<?php require_once('includes/head.php');
require_once('config.php');
?>

<?php
// Check if the user is already logged in, if yes then redirect him to welcome page
if (is_null($_SESSION["loggedin"])) {
    header("location: login.php");
    exit;
}
if ($_GET['apply']) {
    
    $sql = "UPDATE jobs SET jobRunning=1 WHERE jobId=?";
    $stmt = $mysqli->prepare($sql);
    $applyForJob=$_GET['applyForJob'];
    $userId=$_GET['userId'];
    $stmt->bind_param("i", $applyForJob);
    $stmt->execute();
    header("location:profile.php?userId=".$userId);


}
?>
<?php require_once('includes/foot.php');

?>