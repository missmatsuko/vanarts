<?php
$active = "suggest";
include("partials/_header.php");
include("partials/_nav.php");
?>

<!--Index Page Content Here-->
<div class="content-wrapper">
    <div class='row'>
        <div class='small-12 medium-8 column'>
            <h1>Suggest A Food!</h1>
           
            
             <div class="post-text-wrapper page-content-wrapper">
                         <?php
            	if(isset($_POST['submit'])){
            		/*$to      = '';
			$subject = 'Weird Eats - New Food Suggestion';
			$message = $_POST['senderMessage'];
			$senderEmail = filter_var($_POST['senderEmail'], FILTER_SANITIZE_EMAIL);
			$senderName = $_POST['senderName'];
			$headers = 'From: '.$senderName.'<'.$senderEmail . ">\r\n" .
			    'Reply-To: '.$senderEmail."\r\n" .
			    'X-Mailer: PHP/' . phpversion();
			
			mail($to, $subject, $message, $headers);*/
			
			echo "<h3>Your suggestion has been sent. Thank you!</h3>";
            	}
            ?>
             
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <p>Name: </p><input type='text' placeholder="Your Name" name="senderName">
                <p>E-mail: </p><input type='email' placeholder="Your Email" name="senderEmail">
                <p>Message </p><textarea name="senderMessage">Enter your food suggestion here, and it could be featured on Weird Eats!</textarea>
                <input class="button" type='submit' value='send' name="submit">
            </form>
             </div>
        </div>
        <div class="small-12 medium-4 column">
            <?php include("partials/_sidebar.php"); ?>
        </div>
    </div><!--row ends-->

</div><!--content wrapper ends-->

<?php include("partials/_footer.php"); ?>
