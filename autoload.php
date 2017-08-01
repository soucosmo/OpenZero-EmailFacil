<?php

    Class EmailFacil {

        private $smtp;
        private $servidor;
        private $usuario;
        private $senha;
        private $porta;
        private $de;
        private $nomeDe;
        private $para;
        private $nomePara;
        private $assunto;
        private $mensagem;
        private $html;
        private $arquivo;
        private $nomeArquivo;

        public function __construct($smtp = null) {

            if (!empty($smtp)) {
                $this->smtp = true;
            }
        }

        public function Servidor($servidor) {
            $this->servidor = trim($servidor);
        }

        public function Usuario($usuario) {
            $this->usuario = trim($usuario);
        }

        public function Porta($porta) {
            $this->porta = trim(int($porta));
        }

        public function HTML() {
            $this->html = true;
        }

        public function Senha($senha) {
            $this->senha = trim($senha);
        }

        public function De($de, $nome = null) {
            $this->de = trim($de);
            $this->nomeDe = utf8_decode(trim($nome));
        }

        public function Para($para, $nome = null) {
            $this->para = trim($para);
            $this->nomePara = utf8_decode(trim($nome));
        }

        public function Assunto($assunto) {
            $this->assunto = utf8_decode(trim($assunto));
        }

        public function Mensagem($mensagem) {
            $this->mensagem = utf8_decode(trim($mensagem));
        }

        public function Arquivo($arquivo, $nomeArquivo = null) {
            $this->arquivo = trim($arquivo);
            $this->nomeArquivo = trim($nomeArquivo);
        }

        public function Enviar() {

                if (empty($this->smtp)) {
                    if (empty($this->html)) {
                        $tipo = "text/plain";
                    } else {
                        $tipo =  "text/html";
                    }

                    $cabecalho = "MIME-Version: 1.1" . "\r\n" .
                     "From: " . $this->de . "\r\n" .
                      "Reply-to: " . $this->de . "\r\n" .
                       "Return-Path: " . $this->de . "\r\n" .
                        "X-Priority: 3 \r\n" .
                         "Content-type: " . $tipo . "; charset=UTF-8 \r\n" .
                          "Date: " . date("r (T)") . "\r\n" .
                           "X-Mailer: PHP/" . phpversion();

                    return mail($this->para, $this->assunto, $this->mensagem, $cabecalho);

                } else {

                    require 'includes/PHPMailerAutoload.php';

                    $mail = new PHPMailer;

                    $mail->isSMTP();

                    $mail->Host = $this->servidor;

                    $mail->SMTPAuth = true;

                    $mail->Username = $this->usuario;

                    $mail->Password = $this->senha;

                    if (empty($this->porta)) {
                        $mail->Port = 587;
                    } else {
                        $mail->Port = $this->porta;
                    }

                    if (empty($this->nomeDe)) {
                        $mail->setFrom($this->de);
                        $mail->addReplyTo($this->de);
                    } else {
                        $mail->setFrom($this->de, $this->nomeDe);
                        $mail->addReplyTo($this->de, $this->nomeDe);
                    }

                    if (empty($this->nomePara)) {
                        $mail->addAddress($this->para);
                    } else {
                        $mail->addAddress($this->para, $this->nomePara);
                    }

                    if (!empty($this->arquivo)) {
                        if (empty($this->nomeArquivo)) {
                            $mail->addAttachment($this->arquivo);
                        } else {
                            $mail->addAttachment($this->arquivo, $this->nomeArquivo);
                        }
                    }

                    $mail->Subject = $this->assunto;

                    $mail->AltBody = $this->mensagem;
                    $mail->Body    = $this->mensagem;



                    if(!$mail->send()) {
                        return 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
                    } else {
                        return 'Message has been sent';
                    }


                }


        }
    }