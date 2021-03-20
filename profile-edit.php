<?php require_once('includes/head.php');
require_once('config.php');
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false) {
	header("location: index.php");
	exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$sql = "SELECT * FROM users WHERE userId = ? ";
	if ($stmt = $mysqli->prepare($sql)) {
		// Bind variables to the prepared statement as parameters
		$stmt->bind_param("i", $param_userId);

		// Set parameters
		$param_userId = $_SESSION["userId"];
		if ($stmt->execute()) {

			$result 	= $stmt->get_result();
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
		$sql = "SELECT * FROM admins WHERE userId = ? ";
		if ($stmt = $mysqli->prepare($sql)) {
			$stmt->bind_param("i", $param_userId);
			$param_userId = $_SESSION["userId"];
			if ($stmt->execute()) {

				$result 	= $stmt->get_result();
				if ($result->num_rows == 0) {
					$sql = "INSERT INTO admins ( userId, profilePicture, profileTitle, profileDescription, address, portfolioLink, rate, skill) VALUES (?,?,?,?,?,?,?,?)";
					$stmt = $mysqli->prepare($sql);
					$stmt->bind_param("ibssssis", $param_userId, $param_profilePicture, $param_profileTitle, $param_profileDescriptions, $param_address, $param_portfolioLink, $param_rate, $param_skill);
				}
				if ($result->num_rows == 1) {
					$sql = "UPDATE admins SET userId=?,profilePicture=?,profileTitle=?,profileDescription=?,address=?,portfolioLink=?,rate=?,skill=? WHERE userId=?";
					$stmt = $mysqli->prepare($sql);
					$stmt->bind_param("ibssssisi", $param_userId, $param_profilePicture, $param_profileTitle, $param_profileDescriptions, $param_address, $param_portfolioLink, $param_rate, $param_skill, $param_userId);
				}
			}
		}
	}
	if ($userType == 2) {
		$sql = "SELECT * FROM buyers WHERE userId = ? ";
		if ($stmt = $mysqli->prepare($sql)) {
			$stmt->bind_param("i", $param_userId);
			$param_userId = $_SESSION["userId"];
			if ($stmt->execute()) {

				$result 	= $stmt->get_result();
				if ($result->num_rows == 0) {
					$sql = "INSERT INTO buyers ( userId, profilePicture, profileTitle, profileDescription, address, portfolioLink, rate, skill) VALUES (?,?,?,?,?,?,?,?)";
					$stmt = $mysqli->prepare($sql);
					$stmt->bind_param("ibssssis", $param_userId, $param_profilePicture, $param_profileTitle, $param_profileDescriptions, $param_address, $param_portfolioLink, $param_rate, $param_skill);
				}
				if ($result->num_rows == 1) {
					$sql = "UPDATE buyers SET userId=?,profilePicture=?,profileTitle=?,profileDescription=?,address=?,portfolioLink=?,rate=?,skill=? WHERE userId=?";
					$stmt = $mysqli->prepare($sql);
					$stmt->bind_param("ibssssisi", $param_userId, $param_profilePicture, $param_profileTitle, $param_profileDescriptions, $param_address, $param_portfolioLink, $param_rate, $param_skill, $param_userId);
				}
			}
		}
	}
	if ($userType == 3) {
		$sql = "SELECT * FROM sellers WHERE userId = ? ";
		if ($stmt = $mysqli->prepare($sql)) {
			$stmt->bind_param("i", $param_userId);
			$param_userId = $_SESSION["userId"];
			if ($stmt->execute()) {

				$result 	= $stmt->get_result();
				if ($result->num_rows == 0) {
					$sql = "INSERT INTO sellers ( userId, profilePicture, profileTitle, profileDescription, address, portfolioLink, rate, skill) VALUES (?,?,?,?,?,?,?,?)";
					$stmt = $mysqli->prepare($sql);
					$stmt->bind_param("ibssssis", $param_userId, $param_profilePicture, $param_profileTitle, $param_profileDescriptions, $param_address, $param_portfolioLink, $param_rate, $param_skill);
				}
				if ($result->num_rows == 1) {
					$sql = "UPDATE sellers SET userId=?,profilePicture=?,profileTitle=?,profileDescription=?,address=?,portfolioLink=?,rate=?,skill=? WHERE userId=?";
					$stmt = $mysqli->prepare($sql);
					$stmt->bind_param("ibssssisi", $param_userId, $param_profilePicture, $param_profileTitle, $param_profileDescriptions, $param_address, $param_portfolioLink, $param_rate, $param_skill, $param_userId);
				}
			}
		}
	}
	// Set parameters
	$param_userId = $_SESSION["userId"];
	$param_profilePicture = $_POST["photo"];
	$param_profileTitle = $_POST["profile-Title"];
	$param_profileDescriptions = $_POST["discription"];
	$param_address = $_POST["address"];
	$param_portfolioLink = $_POST["portfolio"];
	$param_rate = $_POST["rate"];
	$param_skill = $_POST["skill"];

	// Attempt to execute the prepared statement
	if ($stmt->execute()) {
		// Redirect to login page
		#echo "Insert successfully.";
		header("location:profile.php?userId=".$_SESSION["userId"]);
	} else {
		echo "Something went wrong. Please try again later.";
	}

	// Close statement
	$stmt->close();
}

?>
<div class="content-block">
	<!-- Submit Resume -->
	<div class="section-full bg-white submit-resume content-inner-2">
		<div class="container">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

				<div class="form-group">
					<label>Professional title</label>
					<input type="text" name="profile-Title" class="form-control" placeholder="Web Designer">
				</div>
				<div class="form-group">
					<label>Address</label>
					<input type="text" name="address" class="form-control" placeholder="London">
				</div>
				<div class="form-group">
					<label>Profile Photo</label>
					<div class="custom-file">
						<input type="file" name="photo" class="site-button" id="customFile">
					</div>
				</div>
				<div class="form-group">
					<label>Live Portfolio Link</label>
					<input type="text" name="portfolio" class="form-control" placeholder="Video Link">
				</div>
				<div class="form-group">
					<label>About Yourself</label>
					<textarea class="form-control" name="discription" placeholder="Your Content"></textarea>
				</div>
				<div class="form-group">
					<label>Minimum rate/h ($) (optional)</label>
					<input type="text" name="rate" class="form-control" placeholder="50 ($)">
				</div>


				<div class="form-group">
					<label>Skills </label>
					<input type="text" name="skill" class="form-control" placeholder="Your Skills">
				</div>
				<button type="submit" class="site-button">Submit</button>
			</form>
		</div>
	</div>
	<!-- Submit Resume END -->
</div>
<?php require_once('includes/foot.php');

?>