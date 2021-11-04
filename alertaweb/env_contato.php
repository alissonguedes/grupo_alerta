<?php
require('lib/class.phpmailer.php');

$emailDominio = "comercial3@grupoalertasv.com.br";
$nomeDominio = "GRUPO ALERTA";
$assunto = "Orçamento pelo site GRUPO ALERTA";

$nomeContato = $_POST['nome'];
$emailContato = $_POST['email'];
$foneContato = $_POST['fone'];
$assuntoContato = $_POST['assunto'];
$mensagemContato = $_POST['mensagem'];
// echo $nomeContato.' - '.$emailContato.' - '.$foneContato.' - '.$endereçoContato.' - '.$cidadeContato.' - '.$uflContato.' - '.$servContato;
// die();

$servicos = '';
// COLOCA TODAS AS OPÇÕES EM UMA MESMA VARIÁVEL
// O '.=', VAI CONCATENANDO OS VALORES.
foreach ($servContato as $value) {
  $servicos .= $value . '<br>';
}

$mensagem = '
<html>
    <head>

    </head>
    <body>
        <strong><h2>Orçamento pelo Site Grupo Alerta</h2></strong>
        <br>
        <strong> Nome: </strong><br>  ' . $nomeContato . '<br><br>
        <strong> E-mail: </strong><br>  ' . $emailContato . '<br><br>
		<strong> Telefone: </strong><br>  ' . $foneContato . '<br><br>
        <strong> Assunto: </strong><br>  ' . $assuntoContato . '<br><br>
		<strong> Contato: </strong><br>  ' . $mensagemContato . '<br><br>
    </body>
</html>
';

// --------------- PHP MAIL() ---------------

// $header = "MIME-Version: 1.0\n";
// $header.= "Content-type:text/html; charset=iso-8859-1\n";
// $header.= "From: ".$emailContato."\n";

// if(mail($emailDominio, $assunto, $mensagem, $header)){
//     header("Location: contact.php?msg=mensagem_enviada");
// }else{
//     echo 'Erro ao enviar mensagem :<br> '.var_dump(mail($emailDominio, $assunto, $mensagem, $header));
// }

// --------------- PHP MAILER ---------------

$mail = new PHPMailer(true);

try {
     $mail->Host = $_SERVER['SERVER_NAME'];
     $mail->SMTPAuth   = true;
     $mail->Port       = 25;
     $mail->Username = 'usuário';
     $mail->Password = 'senha';

     $mail->SetFrom($emailContato, $nomeContato);
     $mail->Subject = $assunto;
     $mail->AddAddress($emailDominio, $nomeDominio);

     $mail->MsgHTML($mensagem);

     $mail->Send();
     header("Location: orcamento.php?msg=enviado");

    }catch (phpmailerException $e) {
      echo $e->errorMessage();
}
?>
