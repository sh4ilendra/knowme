<?php
	// You need to install the sendgrid client library so run: composer require sendgrid/sendgrid
	require './sendgrid/vendor/autoload.php';

	// contains a variable called: $API_KEY that is the API Key.
	// You need this API_KEY created on the Sendgrid website.
	include_once('./credentials.php');
	echo "Email senDING!!!";
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $fromEmailId = $_POST['email'];
        $subject = $_POST['subject'];
        $msg = $_POST['msg'];

        $email = new \SendGrid\Mail\Mail();
		$email->setFrom($fromEmailId, $name);
		$email->setSubject($subject);
		$email->addTo("mailtoverma.shailendra@gmail.com", "Shailendra");
		$email->addContent("text/plain", $msg);
		// $email->addContent(
		// 	"text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
		// );
		echo "Email senDING!!!";
		$sendgrid = new \SendGrid($API_KEY);
		if($sendgrid->send($email))
		{
			echo "Email sent succesfully!!!";
			header("Location: ./index.php?sendEmail=success");
		}
		else
		{
			header("Location: ./index.php?sendEmail=failure");
		}
		// try 
		// {
		// 	$response = $sendgrid->send($email);
		// 	print $response->statusCode() . "\n";
		// 	print_r($response->headers());
		// 	print $response->body() . "\n";
		// } catch (Exception $e) {
		// 	echo 'Caught exception: '. $e->getMessage() ."\n";
		// }
    }
	
	
?>