<?php
$method = $_SERVER['REQUEST_METHOD'];
//Script Foreach
$c = true;
if ( $method === 'POST' ) {
	$project_name = trim("Alina");
	$admin_email  = trim("vladyslavkrp@gmail.com");
	$form_subject = trim("Заявка");
	foreach ( $_POST as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" && $key != "captcha" ) {
            if( $key == "name" ) {
                $rowName = "Имя";
            } else if ( $key == "email" ) {
                $rowName = "E-mail";
            } else if ( $key == "message" ) {
                $rowName = "Сообщение";
            }
            else {
                $rowName = $key;
            }
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
			<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$rowName</b></td>
			<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
		</tr>
		";
	   }
    }
}
$message = "<table style='width: 100%;'>$message</table>";
function adopt($text) {
	return '=?UTF-8?B?'.base64_encode($text).'?=';
}
$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
'Reply-To: '.$admin_email.'' . PHP_EOL;
mail($admin_email, adopt($form_subject), $message, $headers );