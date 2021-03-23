<?php require_once('includes/head.php');
require_once('config.php');
?>

<?php
// Check if the user is already logged in, if yes then redirect him to welcome page
if (is_null($_SESSION["loggedin"])) {
    header("location: login.php");
    exit;
}

$sql = "SELECT * FROM users WHERE userId = ? ";
if ($stmt = $mysqli->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("i", $param_userId);

    // Set parameters
    $param_userId = $_GET['userId'];
    if ($stmt->execute()) {

        $result     = $stmt->get_result();
        if ($result->num_rows == 0) {
            header("location: index.php");
            exit;
        }

        $data = $result->fetch_assoc();
        $userType = $data['userType'];
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $email = $data['email'];
    }
}

$sql = "SELECT * FROM usertypes WHERE userTypeId = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $userType);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$userTypeName = $data['userTypeName'];
$stmt->close();

if ($userType == 1) {
    $sql = "SELECT * FROM admins WHERE userId = ?";
}
if ($userType == 2) {
    $sql = "SELECT * FROM buyers WHERE userId = ?";
}
if ($userType == 3) {
    $sql = "SELECT * FROM sellers WHERE userId = ?";
}

// code

// if something is not as expected
// throw exception using the "throw" keyword

// code, it won't be executed if the above exception is thrown

if ($stmt = $mysqli->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("i", $param_userId);

    // Set parameters
    $param_userId = $_GET['userId'];
    if ($stmt->execute()) {

        $result     = $stmt->get_result();
        if ($result->num_rows == 0) {
            header("location: profile-edit.php");
            exit;
        }

        $data         = $result->fetch_assoc();
        $profilePicture = $data['profilePicture'];
        $profileTitle = $data['profileTitle'];
        $profileDescription = $data['profileDescription'];
    }
}






?>

<div class="container max-w900">
    <!-- Blog large img -->
    <div class="blog-post blog-lg blog-style-1">
        <div class="dez-post-media dez-img-effect zoom-slow radius-sm">
            <div class="blog-post blog-md clearfix">
                <div class="dez-post-media dez-img-effect zoom-slow radius-sm"> <a href="#"><img src="images/blog/grid/<?php echo $profilePicture ?>" alt=""></a> </div>
                <div class="dez-post-info">
                    <div class="dez-post-meta">
                        <ul class="d-flex align-items-center">
                            <li class="post-date"><i class="fa fa-calendar"></i>Join On : September 18, 2017</li><br>
                            <li class="post-author"><i class="fa fa-user"></i><a href="#"><?php echo $userTypeName ?></a> </li>
                            <li class="post-author"><i class="fa fa-user"></i><a href="profile-edit.php">Edit Your Profile</a> </li>
                            <!-- <li class="post-author"><i class="fa fa-user"></i>By <a href="#">demongo</a> </li>
										<li class="post-comment"><i class="fa fa-comments-o"></i><a href="#">5k</a> </li> -->
                        </ul>
                    </div>
                    <div class="dez-post-title ">
                        <h4 class="post-title font-24"><a href="#"><?php echo $firstname . ' ' . $lastname ?></a></h4>
                    </div>
                    <div class="dez-post-title ">
                        <h5 class="fw4 m-b0"> <?php echo $profileTitle ?></h5>
                    </div>
                    <div class="dez-post-text">
                        <p><?php echo $profileDescription ?>.</p>
                    </div>

                </div>
            </div>


        </div>

    </div>

    <!-- 
    <div class="section-full bg-white content-inner-2"> -->
    <div class="container">
        <div class="d-flex job-title-bx section-head">
            <div class="mr-auto">
                <?php
                if ($userType == 1) {
                ?>
                    <h2 class="m-b5">Jobs recently approve by you</h2>

                    <h5 class="fw4 m-b0">Total jobs 44</h5>
                <?php
                }
                if ($userType == 2) {
                ?>
                    <h2 class="m-b5">Jobs recently posted by you</h2>
                    <h5 class="fw4 m-b0">Total jobs 22</h5>
                    <a href="post-job.php?userId=<?php echo $_SESSION["userId"]; ?>">Post A New job</a>
                <?php
                }
                if ($userType == 3) {
                ?>
                    <h2 class="m-b5">Jobs recently applied by <?php echo $_SESSION["firstname"]; ?></h2>
                    <h5 class="fw4 m-b0">Total jobs 22</h5>

                <?php
                }

                ?>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <ul class="post-job-bx">
                    <?php

                    $sql = "SELECT jobId,jobCategory, jobDeadline, jobAddress, jobSalary,jobExperience,jobTitle,jobDescription,jobApplyProcess,jobRequirements,jobPostedBy,jobPostedOn,jobBanner FROM jobs WHERE jobPostedBy=? and jobRunning=? ORDER BY jobId DESC";
                    if ($stmt = $mysqli->prepare($sql)) {
                        $stmt->bind_param("ii", $param_userId, $param_jobRunning);

                        // Set parameters
                        $param_userId = $_GET['userId'];
                        $param_jobRunning = 0;
                        // Bind variables to the prepared statement as parameters
                        #$stmt->bind_param("i", $param_jobId);

                        // Set parameters
                        #$param_jobId = 1;
                        if ($stmt->execute()) {

                            $result     = $stmt->get_result();
                            while ($row = $result->fetch_assoc()) {
                                $jobId = $row['jobId'];
                                $jobCategory    = $row['jobCategory'];
                                $jobTitle = $row['jobTitle'];
                                $jobAddress = $row['jobAddress'];
                                $jobSalary = $row['jobSalary'];
                                $jobDeadline = $row['jobDeadline'];
                                $jobPostedOn = $row['jobPostedOn'];

                    ?>
                                <li>
                                    <a href="#">
                                        <div class="d-flex m-b30">
                                            <div class="job-post-company">
                                                <span><img src="images/logo/icon1.png" /></span>
                                            </div>
                                            <div class="job-post-info">
                                                <h4><?php echo $jobTitle ?></h4>
                                                <ul>
                                                    <li><i class="fa fa-map-marker"></i><?php echo $jobAddress ?></li>
                                                    <li><i class="fa fa-bookmark-o"></i>f</li>
                                                    <li><i class="fa fa-clock-o"></i> Posted On <?php echo $jobPostedOn ?></li>
                                                    <li><i class="fa fa-clock-o"></i> Deadline <?php echo $jobDeadline ?></li><br>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="job-time mr-auto">
                                                <span>Full Time</span>
                                            </div>
                                            <div class="salary-bx">
                                                <span>$1200</span>
                                            </div>

                                        </div>
                                        <span class="post-like fa fa-heart-o"></span>
                                    </a>
                                </li>
                                <?php if ($userType == 2) {
                                    $sql = "SELECT * FROM apply WHERE applyJobId = ? and applyConfirm=?";
                                    if ($stmt = $mysqli->prepare($sql)) {
                                        $stmt->bind_param("ib", $param_applyJobId, $param_applyConfirm);

                                        // Set parameters
                                        $param_applyJobId = $jobId;
                                        $param_applyConfirm = 0;
                                        if ($stmt->execute()) {

                                            $result     = $stmt->get_result();
                                            while ($row = $result->fetch_assoc()) {
                                                $applyBy = $row['applyBy'];
                                                $sql1 = "SELECT * FROM users WHERE userId = ? ";
                                                if ($stmt1 = $mysqli->prepare($sql1)) {
                                                    // Bind variables to the prepared statement as parameters
                                                    $stmt1->bind_param("i", $param_userId);

                                                    // Set parameters
                                                    $param_userId = $applyBy;
                                                    if ($stmt1->execute()) {

                                                        $result1     = $stmt1->get_result();
                                                        if ($result1->num_rows == 0) {
                                                            header("location: index.php");
                                                            exit;
                                                        }

                                                        $data = $result1->fetch_assoc();
                                                        $userType = $data['userType'];
                                                        $firstname = $data['firstname'];
                                                        $lastname = $data['lastname'];
                                                        $email = $data['email'];
                                                    }
                                                }


                                ?>
                                                <ul>
                                                    <div class="salary-bx">
                                                        <li> <span>Applied By <a href=""><?php echo $firstname ?></a></span></li>
                                                        <li> <a href="applyconfirm.php?userId=<?php echo $_SESSION['userId'] ?>&apply='apply'&applyForJob=<?php echo $jobId ?>">confirm Now</a></li>
                                                    </div>

                                                </ul>
                    <?php
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->

<?php require_once('includes/foot.php');

?>