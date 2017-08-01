<?php
include 'autoload.php';

$email = new EmailFacil(true);

$email->HTML();

$email->Servidor('seu servidor');

$email->Usuario('seu usuário');

$email->Senha('sua senha');

$email->De('seu email', 'Nome do seu email');

$email->Para('email da pessoa que vai receber');

$email->Assunto('Assunto do email');

$email->Mensagem('Mensagem do email');

$email->Enviar();

//este é um exempro simples de envio de email usando SMTP
//para explorar ainda mais a classe, leia a documentação
//Documentação: https://github.com/cosmo9able/OpenZero-EmailFacil