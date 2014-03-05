<?php /*O3M*/
require_once("class/o3m.functions.php");
/**
* To send mail via SMTP
*/
function sendMail($FromMail='anonymous@localhost',$FromName='Anonymous',$ToMail,$ToName,$Subject='Send Mail Test',$Body,$Attachment=''){
	require_once('class/class.phpmailer/class.phpmailer.php');
	eval(d_include('class/MailConfig.php'));
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPDebug = $SmtpDebug; 
	$mail->SMTPAuth = $SmtpAuth; 
	$mail->SMTPSecure = $SmtpSecure; 
	$mail->Host = $SmtpHost;
	$mail->Port = $SmtpPort; 
	$mail->IsHTML($SmtpIsHTML);
	$mail->CharSet = $SmtpCharSet;
	$mail->Encoding = $SmtpEncoding; 
	$mail->Username = $SmtpUsername;
	$mail->Password = $SmtpPassword;
	$mail->SetFrom($FromMail,$FromName);
	$mail->AddReplyTo($FromMail,$FromName);
	$mail->AddAddress($ToMail,$ToName);
	$mail->Subject = $Subject;
	#$mail->Body = $Body;
	$mail->AltBody="HTML No se puede visualizar correctamente.";
	$mail->MsgHTML($Body);	
	$mail->AddAttachment($Attachment);
	if(!$mail->Send()){
		return "Error al enviar correo: " . $mail->ErrorInfo;
	}else{
		return "El correo ha sido enviado a: ".$ToMail;
	}
}
/*O3M*/
?>