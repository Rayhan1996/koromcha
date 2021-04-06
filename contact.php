<?php 	require_once('includes/head.php');
		require_once('config.php');
		

?>
<?php
if(!empty($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $toEmail = "17201045@uap-bd.edu";
    $mailHeaders = "From: " . $name . "<". $email .">\r\n";
    if(mail($toEmail, $subject, $message, $mailHeaders)) {
        $message = "Your contact information is received successfully.";
        $type = "success";
    }
}
?>

    </header>
    <!-- header END -->
    <!-- message -->
    <div class="page-message bg-white">
		<!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(images/banner/bnr1.jpg);">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Contact Us</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="#">Home</a></li>
							<li>Contact Us</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
		<!-- contact area -->
        <div class="section-full message-inner bg-white contact-style-1">
			<div class="container">
                <div class="row">
					<!-- right part start -->
					<div class="col-lg-4 col-md-6 d-lg-flex d-md-flex">
                        <div class="p-a30 border m-b30 contact-area border-1 align-self-stretch radius-sm">
							<h4 class="m-b10">Quick Contact</h4>
							<p>If you have any questions simply use the following contact details.</p>
                            <ul class="no-margin">
                                <li class="icon-bx-wraper left m-b30">
                                    <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="ti-location-pin"></i></a> </div>
                                    <div class="icon-message">
                                        <h6 class="text-uppercase m-tb0 dez-tilte">Address:</h6>
                                        <p>117 Tejgaon, Dhaka-1215</p>
                                    </div>
                                </li>
                                <li class="icon-bx-wraper left  m-b30">
                                    <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="ti-email"></i></a> </div>
                                    <div class="icon-message">
                                        <h6 class="text-uppercase m-tb0 dez-tilte">Email:</h6>
                                        <p>info@koromcha.com</p>
                                    </div>
                                </li>
                                <li class="icon-bx-wraper left">
                                    <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="ti-mobile"></i></a> </div>
                                    <div class="icon-message">
                                        <h6 class="text-uppercase m-tb0 dez-tilte">PHONE</h6>
                                        <p>+880 191 78 79 895</p>
                                    </div>
                                </li>
                            </ul>
							<div class="m-t20">
								<ul class="dez-social-icon dez-social-icon-lg">
									<li><a href="javascript:void(0);" class="fa fa-facebook bg-primary"></a></li>
									<li><a href="javascript:void(0);" class="fa fa-twitter bg-primary"></a></li>
									<li><a href="javascript:void(0);" class="fa fa-linkedin bg-primary"></a></li>
									<li><a href="javascript:void(0);" class="fa fa-pinterest-p bg-primary"></a></li>
									<li><a href="javascript:void(0);" class="fa fa-google-plus bg-primary"></a></li>
								</ul>
							</div>
                        </div>
                    </div>
                    <!-- right part END -->
                    <!-- Left part start -->
					<div class="col-lg-4 col-md-6">
                        <div class="p-a30 m-b30 radius-sm bg-gray clearfix">
							<h4>Send Message Us</h4>
							<div class="dzFormMsg"></div>
                            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="tab-pane active">
							<input type="hidden" value="Contact" name="dzToDo" >
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="name" type="text" required class="form-control" placeholder="Your Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group"> 
											    <input name="email" type="email" class="form-control" required  placeholder="Your Email Id" >
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <textarea name="message" rows="4" class="form-control" required placeholder="Your Message..."></textarea>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-12">
										<div class="form-group">
											<div class="input-group">
												<div class="g-recaptcha" data-sitekey="6LefsVUUAAAAADBPsLZzsNnETChealv6PYGzv3ZN" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
												<input class="form-control d-none" style="display:none;" data-recaptcha="true" required data-error="Please complete the Captcha">
											</div>
										</div>
									</div>
                                    <div class="col-lg-12">
                                        <button name="send" type="submit" value="send" class="site-button "> <span>Submit</span> </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Left part END -->
					<div class="col-lg-4 col-md-12 d-lg-flex m-b30">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29212.338097949545!2d90.3706476973753!3d23.763697108439956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c75f68e3e199%3A0x1091c4aa2634b568!2sTejgaon%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1617740735645!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
                </div>
            </div>
        </div>
        <!-- contact area  END -->
    </div>

    

<?php

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }


    if (empty($errors)) {
        $toEmail = '17201045@uap-bd.edu';
        $emailSubject = 'New email from your contant form';
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];

        $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", $message];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            header('Location: thank-you.html');
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
        }
    } else {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    }
}

?>

<html>
<body>
  <form action="/contact.php" method="post" id="contact-form">
    <h2>Contact us</h2>

    <?php echo((!empty($errorMessage)) ? $errorMessage : '') ?>
    <p>
      <label>First Name:</label>
      <input name="name" type="text" value="dima"/>
    </p>
    <p>
      <label>Email Address:</label>
      <input style="cursor: pointer;" name="email" value="dima@dima.com" type="text"/>
    </p>
    <p>
      <label>Message:</label>
      <textarea name="message">dima</textarea>
    </p>

    <p>
      <input type="submit" value="Send"/>
    </p>
  </form>
  <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
  <script>
      const constraints = {
          name: {
              presence: { allowEmpty: false }
          },
          email: {
              presence: { allowEmpty: false },
              email: true
          },
          message: {
              presence: { allowEmpty: false }
          }
      };

      const form = document.getElementById('contact-form');

      form.addEventListener('submit', function (event) {
          const formValues = {
              name: form.elements.name.value,
              email: form.elements.email.value,
              message: form.elements.message.value
          };

          const errors = validate(formValues, constraints);

          if (errors) {
              event.preventDefault();
              const errorMessage = Object
                  .values(errors)
                  .map(function (fieldValues) {
                      return fieldValues.join(', ')
                  })
                  .join("\n");

              alert(errorMessage);
          }
      }, false);
  </script>
</body>
</html>
    <!-- message END-->
    <?php 	require_once('includes/foot.php');

?>