<?php

	include("inc/MailChimp.php");
	use \DrewM\MailChimp\MailChimp;

if($_POST)
{
    ##################################################################################################################

	//MailChimp Settings - do NOT store keys in source. Use environment variables.
	$api_key = getenv('MAILCHIMP_API_KEY') ?: null; // Set in environment variables on server
	$list_id = getenv('MAILCHIMP_LIST_ID') ?: null; // Set in environment variables on server

	// If running locally without environment set, you can temporarily set placeholders here
	// but DO NOT commit real keys to the repository.

    // Output Messages
    $success_mssg   = "Thank you, you have been added to our mailing list."; 

    ##################################################################################################################
    
	$MailChimp = new MailChimp($api_key);

	$result = $MailChimp->post("lists/$list_id/members", [
							'email_address' => $_POST["subscribe_email"],
							'status'        => 'subscribed',
						]);

	if ($MailChimp->success()) {
         $output = json_encode(array('type'=>'message', 'text' => $success_mssg));
        die($output);
        
	} else {
		$error_mssg = $MailChimp->getLastError();  
        $output = json_encode(array('type'=>'error', 'text' => $error_mssg));
        die($output);
	}
}else{
    
    header('Location: ../404.html');
    
}
?>