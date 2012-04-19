
	<div id="contact">
	
<?
		// Attention! Please read the following.
		// It is important you do not edit pieces of code that aren't tagged as a configurable options identified by,
		
        // Configuration option.
		
		// Each option that is easily editable has a modified example given.
		
		
		$error    = '';
        $name     = ''; 
        $email    = ''; 
        $subject  = ''; 
        $comments = ''; 
        $verify   = '';
		
        if(isset($_POST['contactus'])) {
        
		$name     = $_POST['name'];
        $email    = $_POST['email'];
        $subject  = $_POST['subject'];
        $comments = $_POST['comments'];
        $verify   = $_POST['verify'];
		

        // Configuration option.
		// You may change the error messages below.
		// e.g. $error = 'Attention! This is a customised error message!';
		
        if(trim($reffromname) == '') {
        	$error = '<div class="error_message">Attention! You must enter your name.</div>';
        } else if(trim($reftoname) == '') {
        	$error = '<div class="error_message">Attention! You must enter your name.</div>';
        } else if(trim($reffromemail) == '') {
       		$error = '<div class="error_message">Attention! You must enter your name.</div>';
        } else if(trim($reftoemail) == '') {
        	$error = '<div class="error_message">Attention! Please enter a valid email address.</div>';
        } else if(!isEmail($reffromemail)) {
        	$error = '<div class="error_message">Attention! You have entered an invalid e-mail address, try again.</div>';
        } else if(!isEmail($reftoemail)) {
        	$error = '<div class="error_message">Attention! You have entered an invalid e-mail address, try again.</div>';
        }
		
        if(trim($verify) == '') {
	    	$error = '<div class="error_message">Attention! Please enter the verification number.</div>';
	    } else if(trim($verify) != '4') {
	    	$error = '<div class="error_message">Attention! The verification number you entered is incorrect.</div>';
	    }
		
        if($error == '') {
        
			if(get_magic_quotes_gpc()) {
            	$comments = stripslashes($comments);
            }


         // Configuration option.
		 // Enter the email address that you want to emails to be sent to.
		 // Example $address = "joe.doe@yourdomain.com";
		 
         $address = "ismael@globalminddesigns.com";


         // Configuration option.
         // i.e. The standard subject will appear as, "You've been contacted by John Doe."
		 
         // Example, $e_subject = '$name . ' has contacted you via Your Website.';

         $e_subject = 'New referral by ' . $reffromname . '.';


         // Configuration option.
		 // You can change this if you feel that you need to.
		 // Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.
					
		 $e_body = "#reffromname (#reffromemail) has referred #reftoname (#reftoemail).\r\n\n";

					
         $msg = $e_body;

         mail($address, $e_subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n");


		 // Email has sent successfully, echo a success page.
					
		 echo "<div id='succsess_page'>";
		 echo "<h1>Email Sent Successfully.</h1>";
		 echo "<p>Thank you,<strong>$reffromname</strong>, your message has been submitted to us.</p>";
		 echo "</div>";
                      
		}
	}

         if(!isset($_POST['contactus']) || $error != '') // Do not edit.
         {
?>

            <h1>Contact Us</h1>
            <p>Please take the time to refer a friend to our exciting times and join the movement!</p>
            
            <? echo $error; ?>
            
            <fieldset>
            
            <legend>Please fill in the following form to refer a friend.</legend>

            <form  method="post" action="">

			<label for=name accesskey=U><span class="required">*</span> Your Name</label>
            <input name="reffromname" type="text" id="name" size="30" value="<?=$reffromname;?>" />
            
            <label for=email accesskey=E><span class="required">*</span> Your Email</label>
            <input name="reffromemail" type="text" id="email" size="30" value="<?=$reffromemail;?>" />
            
            <br />
            <br />
            
            <label for=name accesskey=U><span class="required">*</span> Friend's Name</label>
            <input name="reftoname" type="text" id="name" size="30" value="<?=$reftoname;?>" />

			<label for=email accesskey=E><span class="required">*</span> Friend's Email</label>
            <input name="reftoemail" type="text" id="email" size="30" value="<?=$reftoemail;?>" />
            


            <hr />
            
            <p><span class="required">*</span> Are you human?</p>
            
            <label for=verify accesskey=V>&nbsp;&nbsp;&nbsp;3 + 1 =</label>
			<input name="verify" type="text" id="verify" size="4" value="<?=$verify;?>" /><br /><br />

            <input name="contactus" type="submit" class="submit" id="contactus" value="Submit" />

            </form>
            
            </fieldset>

            
<?			}
	
		function isEmail($email) { // Email address verification, do not edit.
		return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
		}
?>
     
     </div>
     