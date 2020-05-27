<?php 
	if (isset($_POST['send_mess'])) {

		$name = $_POST['name'];
		$whatsapp = $_POST['whatsapp'];
		$subject = $_POST['subject'];
		$attachSubject= "Contact Form: ".$subject;
		$email = $_POST['email'];
		$message = $_POST['message'];
		$to = 'rajrashed421@gmail.com';
		$headers= 'From: <admin@wpmethods.com>' . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		$messageBody = "
			<html>
			<head>
			<title>".$subject."</title>
			</head>
			<body>
			<p>".$message."</p>
			<table>
			<tr>
			<td>Regards, ".$name."</td>
			</tr>
			<tr>
			<td>Email Address: ".$email."</td>
			</tr>
			<tr>
			<td>WhatsApp ID: ".$whatsapp."</td>
			</tr>
			</table>
			</body>
			</html>
			";

		$errors = array();
		if ($name == '') {
			$errors['name']='<spam style="color: red;">Name is Blank</spam>';
		}

		if (empty($subject)) {
			$errors['subject']='Subject is Blank';
		}

		if (empty($email)) {
			$errors['email']='Email is Blank';
		}

		if (empty($message)) {
			$errors['message']='Message is Blank';
		}

		if(count($errors)==0){
			if(mail($to, $attachSubject, $messageBody, $headers, $name)){
				$msgsend['sucess']= "Message Send Sucessfully";
			}else{
				$msgsend['notsucess']= 'Message Not Send!';
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Contact Form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top ScrollSpy">
  <a class="navbar-brand" href="#"><img src="logo.jpg" height="40px" width="auto"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        		<!-- Button trigger modal -->
			<a href="#" type="button" class="nav-link" data-toggle="modal" data-target="#staticBackdrop">
			  Contact Us
			</a>
      </li>
    </ul>
  </div>
</nav>

	<header><h1 align="center">Contact Form</h1></header>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Contact Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
		<input type="text" name="name" placeholder="Name"> <?php if (isset($errors['name'])) {
			echo $errors['name'];
		} ?>
		<input type="text" name="subject" placeholder="Subject"> <?php if (isset($errors['subject'])) {
			echo $errors['subject'];
		} ?>
		<input type="email" name="email" placeholder="Email Address"> <?= isset($errors['email']) ? $errors['email'] : NULL;?> 
		<input type="text" name="whatsapp" placeholder="Your Whatsapp ID">
		<textarea placeholder="Type your Message" name="message"></textarea> <?php if (isset($errors['message'])) {
			echo $errors['message'];
		} ?>
		<input type="submit" name="send_mess" value="Send Message">

			</form>
      </div>
      
      		<?php if(isset($msgsend)):?> <div class="modal-footer"><div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
		  <div class="toast-body" >
		    <?php echo isset($msgsend['sucess'])? $msgsend['sucess']: $msgsend['notsucess'];  ?><button type="button" class="close" data-dismiss="toast" aria-label="Close">
			<span aria-hidden="true">&times;</span></button>
		  </div>
		</div></div> <?php endif; ?>
      
    </div>
  </div>
</div>

	<form action="" method="POST">
		<?php if(isset($msgsend)):?> <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
		  <div class="toast-body" >
		    <?php echo isset($msgsend['sucess'])? $msgsend['sucess']: $msgsend['notsucess'];  ?><button type="button" class="close" data-dismiss="toast" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
		  </div>
		</div> <?php endif; ?>
		<input type="text" name="name" placeholder="Name"> <?php if (isset($errors['name'])) {
			echo $errors['name'];
		} ?>
		<input type="text" name="subject" placeholder="Subject"> <?php if (isset($errors['subject'])) {
			echo $errors['subject'];
		} ?>
		<input type="email" name="email" placeholder="Email Address"> <?= isset($errors['email']) ? $errors['email'] : NULL;?> 
		<input type="text" name="whatsapp" placeholder="Your Whatsapp ID">
		<textarea placeholder="Type your Message" name="message"></textarea> <?php if (isset($errors['message'])) {
			echo $errors['message'];
		} ?>
		<input type="submit" name="send_mess" value="Send Message">

	</form>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.toast').toast('show');
	});


	/**
 * Listen to scroll to change header opacity class
 */
	function checkScroll(){
    var startY = $('.navbar').height() * 2; //The point where the navbar changes in px

    if($(window).scrollTop() > startY){
        $('.navbar').addClass("scrolled");
    }else{
        $('.navbar').removeClass("scrolled");
    }
}

if($('.navbar').length > 0){
    $(window).on("scroll load resize", function(){
        checkScroll();
    });
}

</script>
</body>
</html>