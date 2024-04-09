<?php
// Incluindo o arquivo do PHPMailer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$urls = array(
    'https://erp.xonguissa.co.mz/',
    'http://amoravida.entretech.co.mz/',
    'https://erp.thevenue.co.mz/',
    'https://ntxuva.bncs.co.mz/',
    'https://erp.afridevmati.co.mz/',
    'https://ntxuva.armar.co.mz/',
    'http://erp.movicargo.co.mz/',
    'https://erp.kidzkare.co.mz/'
);

$to = 'tecnico@entretech.co.mz';
$subject = 'Relatorio de Teste de Estado de Sistemas';

$message = "Relatorio de Teste de Estado de Sistemas\n\n";

$allSitesOK = true;
foreach ($urls as $url) {
    
    $statusCode = get_http_response_code($url);

    echo "URL: $url - Status: $statusCode\n";
    $message .= "URL: $url - Status: $statusCode\n";

    if ($statusCode !== false && $statusCode != 200) {
        $allSitesOK = false;
    }
}

echo "Todos os sites estao " . ($allSitesOK ? "OK" : "com problemas") . "\n";
$message .= "\nTodos os sites estao " . ($allSitesOK ? "OK" : "com problemas");

// Instanciando um objeto PHPMailer
$mail = new PHPMailer(true);

// Configurações básicas do PHPMailer
$mail->isSMTP();
$mail->Host = 'mail.entretechlda.com';
$mail->SMTPAuth = true;
$mail->Username = 'ematavele@entretechlda.com';
$mail->Password = 'matavele!2024';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

// Configurações específicas do email
$mail->setFrom('ematavele@entretechlda.com', 'ERP Status Checker');
$mail->addAddress($to);
$mail->Subject = $subject;
$mail->Body = $message;

// Enviar o email e verificar se há erros
if(!$mail->send()) {
    echo 'Erro ao enviar email: ' . $mail->ErrorInfo;
} else {
    echo 'Email enviado com sucesso!';
}

function get_http_response_code($url) {
    $headers = get_headers($url);
    if ($headers && isset($headers[0])) {
        return intval(substr($headers[0], 9, 3));
    }
    return false;
}
?>