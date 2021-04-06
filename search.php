<?php 	require_once('includes/head.php');
		require_once('config.php');
		

?>

<?php

$sql = "SELECT * FROM jobs WHERE jobCategory = ?";
if($stmt = $mysqli->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("s", $param_jobCategory);

    // Set parameters
    $param_jobCategory = $_GET['query'];

		if($stmt->execute()){
			
			$result 	= $stmt->get_result();
			while ($row= $result->fetch_assoc()) {
				$jobId=$row['jobId'];
				$jobCategory	= $row['jobCategory'];
				$jobTitle=$row['jobTitle'];
				$jobAddress=$row['jobAddress'];
				$jobSalary=$row['jobSalary'];
				$jobDeadline=$row['jobDeadline'];
				$jobPostedOn=$row['jobPostedOn'];
				
?>
								<li>
									<a href="job-detail.php?jobId=<?php echo $jobId ?>">
										<div class="d-flex m-b30">
											<div class="job-post-company">
												<span><img src="images/logo/icon1.png"/></span>
											</div>
											<div class="job-post-info">
												<h4><?php echo $jobTitle?></h4>
												<ul>
													<li><i class="fa fa-map-marker"></i> <?php echo $jobAddress ?></li>
													<li><i class="fa fa-bookmark-o"></i> uh</li><br>
													<li><i class="fa fa-clock-o"></i> Posted On <?php echo $jobPostedOn ?></li>
													<li><i class="fa fa-clock-o"></i> Deadline  <?php echo $jobDeadline ?></li><br>
												</ul>
											</div>
										</div>
										<div class="d-flex">
											<div class="job-time mr-auto">
												<span><?php echo $jobCategory;?></span>
											</div>
											<div class="salary-bx">
												<span>Salary - <?php echo $jobSalary?> K</span>
											</div>
										</div>
										<span class="post-like fa fa-heart-o"></span>
									</a>
								</li>
<?php
				
			}

		}
	}
?>


<?php 	require_once('includes/foot.php');

?>