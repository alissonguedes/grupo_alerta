<?php
date_default_timezone_set('America/Sao_Paulo');

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$nome = isset($_POST['nome']) ? $_POST['nome'] : 'Não Informado';
$email = isset($_POST['email']) ? $_POST['email'] : 'Não Informado';
$phone = isset($_POST['phone']) ? $_POST['phone'] : 'Não Informado';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : 'Não Informado';
$setor = isset($_POST['setor']) ? $_POST['setor'] : 'Não Informado';
$msg = isset($_POST['msg']) ? $_POST['msg'] : 'Não Informado';
$data = date('d/m/Y H:i:s');

$mail = new PHPMailer();



  	$mail->isSMTP();
  	$mail->Host = 'smtp.gmail.com';
  	$mail->SMTPAuth = true;
  	$mail->Username = 'tacticwebcg@gmail.com';
  	$mail->Password = 'fstrong123';
  	$mail->Port = 587;

  	$mail->setFrom('tacticwebcg@gmail.com');
  	$mail->addAddress('tacticwebcg@gmail.com');
  	$mail->addAddress('tacticwebcg@gmail.com');

  	$mail->isHTML(true);
  	$mail->Subject = $setor;
  	$mail->Body = "Nome: <strong>{$nome}</strong><br>
                    E-mail: <strong>{$email}</strong><br>
                    Telefone: <strong>{$phone}</strong><br>
                    cidade: <strong>{$cidade}</strong><br>
                    setor: <strong>{$setor}</strong><br>
                    msg: <strong>{$msg}</strong><br>
                    data: <strong>{$data}</strong>";


  	if($mail->send()) {
  		echo 'Email enviado com sucesso';
  	} else {
  		echo 'Email nao enviado';
  	}
