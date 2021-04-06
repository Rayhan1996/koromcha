<?php require_once('includes/head.php');
require_once('config.php');
if (is_null($_SESSION["loggedin"])) {
    header("location: login.php");
    exit;
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO jobs( jobCategory, jobDeadline, jobAddress, jobSalary, jobExperience, jobTitle, jobDescription,jobApplyProcess, jobRequirements, jobPostedBy, jobPostedOn, jobBanner) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssiissssisd", $param_jobCategory, $param_jobDeadline, $param_jobAddress, $param_jobSalary, $param_jobExperience, $param_jobTitle, $param_jobDescription, $param_jobApplyProcess, $param_jobRequirements,$param_jobPostedBy,$param_jobPostedOn, $param_jobBanner);
    
    $param_jobCategory = $_POST["category"];
    $param_jobDeadline = $_POST["deadline"];
    $param_jobAddress = $_POST["address"];
    $param_jobSalary = $_POST["salary"];
    $param_jobExperience = $_POST["experience"];
    $param_jobTitle = $_POST["title"];
    $param_jobDescription = $_POST["description"];
    $param_jobApplyProcess = $_POST["apply-process"];
    $param_jobRequirements = $_POST["requirements"];
    $param_jobPostedBy = $_SESSION["userId"];
    $param_jobPostedOn= date("Y-m-d");
    $param_jobBanner = $_POST["banner"];
    $stmt->execute();
    

    header("location: profile.php?userId=".$_SESSION["userId"]);
}
?>
<div class="content-block">
    <!-- Submit Resume -->
    <div class="section-full bg-white submit-resume content-inner-2">
        <div class="container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                <div class="form-group">
                    <label>Job Category</label>
                    <input type="text" name="category" class="form-control" placeholder="Web Designer">
                </div>
                <div class="form-group">
                    <label>Job Deadline</label>
                    <input type="text" name="deadline" class="form-control" placeholder="Web Designer">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" placeholder="London">
                </div>
                <div class="form-group">
                    <label>Salary per month</label>
                    <input type="text" name="salary" class="form-control" placeholder="London">
                </div>
                <div class="form-group">
                    <label>Experience</label>
                    <input type="text" name="experience" class="form-control" placeholder="London">
                </div>
                <div class="form-group">
                    <label>Job Title</label>
                    <input type="text" name="title" class="form-control" placeholder="London">
                </div>
                <div class="form-group">
                    <label>Job Description</label>
                    <input type="text" name="description" class="form-control" placeholder="London">
                </div>
                <div class="form-group">
                    <label>Job Apply Process</label>
                    <input type="text" name="apply-process" class="form-control" placeholder="London">
                </div>
                <div class="form-group">
                    <label>Job Requirements</label>
                    <input type="text" name="requirements" class="form-control" placeholder="London">
                </div>
                <div class="form-group">
                    <label>Job Banner</label>
                    <div class="custom-file">
                        <input type="file" name="banner" class="site-button" id="customFile">
                    </div>
                </div>
                <button type="submit" class="site-button">Submit</button>
            </form>
        </div>
    </div>

    <?php require_once('includes/foot.php');
    ?>