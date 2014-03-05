<?php /*O3M*/
/**
* To send mail via SMTP
*/
function sendMail($FromMail='anonymous@localhost',$FromName='Anonymous',$ToMail,$ToName,$Subject='Send Mail Test',$Body,$Attachment=''){
	require_once('class.phpmailer/class.phpmailer.php');
	include('MailConfig.php');
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPDebug = $SmtpDebug; 
	$mail->SMTPAuth = $SmtpAuth; 
	$mail->SMTPSecure = $SmtpSecure; 
	$mail->Host = $SmtpHost;
	$mail->Port = $SmtpPort; 
	$mail->IsHTML($SmtpIsHTML);
	#$mail->CharSet = "UTF-8";
	#$mail->Encoding = "quoted­printable"; 
	$mail->Username = $SmtpUsername;
	$mail->Password = $SmtpPassword;
	$mail->SetFrom($FromMail,$FromName);
	#$mail->AddReplyTo($FromMail,$FromName);
	$mail->AddAddress($ToMail,$ToName);
	$mail->Subject = $Subject;
	$mail->Body = $Body;
	#$mail->AltBody="HTML No se puede visualizar correctamente.";
	#$mail->MsgHTML($Body);	
	#$mail->AddAttachment($Attachment);
	if(!$mail->Send()){
		return "Error al enviar correo: " . $mail->ErrorInfo;
	}else{
		return "El correo ha sido enviado a: ".$ToMail;
	}
}
/*O3M*/
?>