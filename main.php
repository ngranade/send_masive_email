<?php

include ("include/class.phpmailer.php");
include ("include/class.smtp.php");

$archivo = file('destinatarios.txt');
$line = count($archivo);
$time = ($line*5)/60;
$inicio = date('Y-m-d h:m:s');

$enviados = 0;
$noenviados = 0;

echo "\n\n" . "Cantidad de correos a enviar: " . $line . "\n";
echo "Duracion aproximada: " . $time . " Minutos" . "\n\n";

$question = readline("Desea continuar? y/n ");

if($question == "y"){

for($a = 0; $a<$line; $a++){

	$mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "xxxxxxxx";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->Username = "xxxxxxxx@xxxxxxxx";
    $mail->Password = "xxxxxxxx";
    $mail->IsHTML(true);
    $mail->From = "xxxxxxxx@xxxxxxxx";
    $mail->FromName = "xxxxxxxx";
    $mail->Timeout = 120;
    $mail->AddAddress($archivo[$a]);
    $mail->Subject = "xxxxxxxx";

    $cuerpo = "

    Hola! Test

    ";

    $mail->Body = $cuerpo;
    
    $send = $mail->Send();

    if($send){
    	echo $a+1 . "/" . $line . "........" . "Enviado. " . $archivo[$a];
    	$enviados++;
    }
    else{
    	echo $a+1 . "/" . $line . "........" . "No Enviado. " . $archivo[$a];
    	$noenviados++;
    }

    sleep(5);

}

    echo "\n\n" . "Inicio: " . $inicio . "\n";
    echo "Finalizado: " . date('Y-m-d h:m:s') . "\n\n";

    echo "Correos enviados: " . $enviados . "\n";
    echo "Correos no enviados: " . $noenviados . "\n\n";

    echo "------------------------- BYE \n";
    echo "------------------------- Created By NGranade\n\n";
}
else{
	exit();
}

?>
