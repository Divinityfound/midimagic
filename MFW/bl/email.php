<?php
	require_once(dirname(__FILE__)."/mailer/class.phpmailer.php");
	class email
	{
		var $subjects = array(
			0 => "Registration and Verification",
			1 => "Message Notification",
			2 => "Forgot Password",
			);
		var $messages = array(
			0 => "Your email has been registered with Niche Date Network.<br /><br />Password: %s<br /><br />To verify this email, click <a href='%s'>here</a>.<br /><br />If you cannot click there, simply copy and paste this URL:<br />%s<br /><br />If you are not meant to receive this message, ignore and delete this email.",
			1 => "We are emailing you to notify that you have received a message! Login now and check it out!<br /><br /><a href='%s'>%s</a>",
			2 => "We are emailing you to notify you that your password has been changed.<br /><br />Your new password is: %s<br /><br />If you did not request this password change, simply "
			);
		var $id;
		var $subject;
		var $message;
		var $to;
		
		function setEmail()
		{
			$this->subject = $this->subjects[$this->id];
			$this->message = $this->messages[$this->id].SIGNATURE;
		}
		
		function messageFormat0($data)
		{
			$this->message = sprintf($this->message, $data[0], $data[1], $data[1]);
		}
		
		function messageFormat1()
		{
			$this->message = sprintf($this->message, URL."viewMessages.php", URL."viewMessages.php");
		}
		
		function messageFormat2($data)
		{
			$this->message = sprintf($this->message,$data[0]);
		}
		
		function constructEmailSend($emailType, $to, $data = array())
		{
			$this->id = $emailType;
			$this->setEmail();
			$this->to = $to;
			switch ($this->id)
			{
				case 0:
					$this->messageFormat0($data);
					break;
				case 1:
					$this->messageFormat1();
					break;
				case 2:
					$this->messageFormat2($data);
					break;
				default:
					echo "CRITICAL ERROR IN EMAIL.";
					exit();
			}
			
			$this->sendEmail();
		}
		
		function sendEmail()
		{
			$mail = new PHPMailer(); // create a new object
			$mail->IsSMTP(); // enable SMTP
			$mail->SMTPAuth = true; // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
			$mail->Host = "mail.nichedatenetwork.com";
			$mail->Port = 465; // or 587
			$mail->IsHTML(true);
			$mail->Username = "noreply@nichedatenetwork.com";
			$mail->Password = "asd34964";
			$mail->SetFrom("noreply@nichedatenetwork.com");
			$mail->Subject = $this->subject;
			$mail->Body = $this->message;
			$mail->AddAddress($this->to);
			$mail->send();
		}
	}
?>