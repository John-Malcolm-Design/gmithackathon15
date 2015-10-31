<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'GMIT Hackathon Contact Form'; 
		$to = 'john@gmithackathon.xyz'; 
		$subject = 'Message from GMIT Hackathon ';
		
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
	}
}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/favicon.ico">
  <title>GMIT Hackathon 2015</title>
  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <!-- Fonts from Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Custom styles for this template -->
  <link href="assets/css/main.css" rel="stylesheet">


  <!-- FAVICONS-->
  <link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="/favicons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
  <link rel="manifest" href="/favicons/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/favicons/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- END OF FAVICONS -->
</head>
<body>

  <!-- TOP SECTION -->
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#headerwrap"><b>GMIT Hackathon 2015</b></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right up">
          <li class="hvr-radial-out"><a href="#about-id">About</a></li>
          <li class="hvr-radial-out"><a href="#" data-toggle="modal" data-target="#myModal">Register</a></li>
          <!-- <li class="hvr-radial-out"><a href="#">Hack</a></li> -->
          <li class="hvr-radial-out"><a href="#contact-anchor">Contact</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div id="headerwrap">
    <div class="container">
     <div class="row">
      <div class="col-sm-6 intro-head">
       <span class="codehack"></span>
       <h2>Join us this November 11th & 12th</h2>
       <br>
       <button type="submit" class="btn btn-submit btn-lg emailbut" data-toggle="modal" data-target="#myModal">Register</button>
     </div>
     <div class="col-sm-6">
       <img class="img-responsive logo pull-right" src="assets/img/logo.png" alt="">
     </div>
     <span id="about-id"></span>
   </div>
 </div>
</div>
<!-- END OF TOP SECTION` -->

  <!-- ABOUT SECTION` -->
  <div class="container-fluid about-main">
  <div class="col-lg-5 col-md-4 about-img pull-left">
    <div class="row">
      <div id="slider">
        <figure>
          <img class="img-responsive" src="assets/img/slides/slide2.jpg" alt="">
          <img class="img-responsive" src="assets/img/slides/slide3.jpg" alt="">
          <img class="img-responsive" src="assets/img/slides/slide5.png" alt="">
          <img class="img-responsive" src="assets/img/slides/slide1.jpg" alt="">
          <img class="img-responsive" src="assets/img/slides/slide4.jpg" alt="">
        </figure>
      </div>
    </div>
  </div>
  <div class="col-lg-7 col-md-8 about pull-right">
   <div class="row">
     <h1>About the event</h1>
     <p>Two days to create an app, connect with other devs, have fun and win prizes. Last years prizes included phones, tablets and XBox live memberships! Speakers include Microsoft, HP, Bank of Ireland and professioanls involved in the startup community in Galway. And of course the real networking will be in the pub on Thursday night.</p>
     <h4>GMIT Registration Room 347</h4>
     <ul>
      <li>Wednesday: 11am - 7pm</li>
      <li>Thursday: 9am - 9pm</li>
    </ul>
    <br>
    <p>It's not all work... we will have consoles set up to play games if you want to take a breather. <br> The event will be catered for by GMIT Catering Company & Papa Johns Pizza - so food will be provided on both days.</p>
    <p>In the spirt of collaboration we are going to have quick pitches on the Wednesday, so people can join teams or find people to join theirs. Nothing fancy is needed for the pitches, just follow this format: who you are, your idea for an app, problem your solving, how you will solve it and the app name.
      <br><br>
      <i class="fa fa-twitter" id="contact-anchor"></i> <a href="https://twitter.com/GMITCompSociety">@GMITCompSociety</a><br>
      <i class="fa fa-facebook-official"></i> <a href="https://www.facebook.com/GMITComputerSociety">GMITComputerSociety</a>
    </p>
  </div>
</div>
</div>
<!-- END OF ABOUT SECTION` -->

<div class="clearfix" class="smallspace"></div>

<!-- CONTACT SECTION -->
<div class="container-fluid" id="contact-id">
<div class="col-lg-5 col-md-6 contact pull-left">
 <div class="row">
   <h1>Get in touch</h1>

   <form class="form-horizontal" role="form" method="post" action="index.php">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
							<?php echo "<p class='text-danger'>$errName</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
							<?php echo "<p class='text-danger'>$errEmail</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
							<?php echo "<p class='text-danger'>$errMessage</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="human" class="col-sm-2 control-label">2 + 3 =</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
							<?php echo "<p class='text-danger'>$errHuman</p>";?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result; ?>	
						</div>
					</div>
				</form>  </div>
	<div class="row sponsors">
		<h4 class="headwhite">Sponsors</h4>
		<img class="sponsor" src="/assets/img/sponsors/microsoft.png"/>
		<img class="sponsor" src="/assets/img/sponsors/hp.png"/>
		<img class="sponsor" src="/assets/img/sponsors/boi.png"/>
		<img class="sponsor" src="/assets/img/sponsors/gmit.png"/>
		<img class="sponsor" src="/assets/img/sponsors/carlow.png"/>
	</div>
</div>
<div class="col-lg-7 col-md-6 col-sm-12 contact-map pull-right">
  <div class="row Flexible-container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9542.468253864767!2d-9.014890100786012!3d53.27848060031808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x485b96cd4bcf0eef%3A0x230f1257a688d75!2sGalway+Mayo+Institute+of+Technology%2C+Old+Dublin+Rd%2C+Galway!5e0!3m2!1sen!2sie!4v1446225261678" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>
</div>
</div>
<!-- END OF CONTACT SECTION -->

</div>

<!-- MODAL SECTION -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="width:100%; text-align:left;" ><iframe  src="//eventbrite.ie/tickets-external?eid=19317789027&ref=etckt" frameborder="0" height="214" width="100%" vspace="0" hspace="0" marginheight="5" marginwidth="5" scrolling="auto" allowtransparency="true"></iframe><div style="font-family:Helvetica, Arial; font-size:10px; padding:5px 0 5px; margin:2px; width:100%; text-align:left;" ><a class="powered-by-eb" style="color: #dddddd; text-decoration: none;" target="_blank" href="http://www.eventbrite.ie/r/etckt">Powered by Eventbrite</a></div></div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    


<script src="assets/js/typed.min.js"></script>
<script>
  $(function(){
    $(".codehack").typed({
      strings: ["CODE. HACK. CREATE.", "Programming, Prizes &amp; Pizza.","CODE. HACK. CREATE."],
      typeSpeed: 50,
      backDelay: 1000
    });
  });
</script>
</body>
</html>
