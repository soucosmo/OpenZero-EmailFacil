# OpenZero-EmailFacil
Essa Classe em PHP simplifica o envio de emails de forma segura, com ela você pode enviar emails SMTP e comum,
com poucas linhas de código.


Para usar a classe em seu sistema siga estes passos
1 - Copiar os arquivos para a pasta do seu projeto

Você pode usar o git se desejar: https://github.com/cosmo9able/OpenZero-EmailFacil
ou você pode simplesmente fazer o download de uma cópia em zip

<br><br><br><br><br><br><br><br><br><br>


2 - Faça a inclusão da do autoload no arquivo do seu projeto

include = 'PastaDaClasse/autoload.php';







3 - Instancie a classe

$email = new EmailFacil(true);
observe que se você desejar usar SMTP você deve passar o valor TRUE como parametros, para enviar emails normais use apenas $email = new Email; (esta modalidade não é muito recomendada)


<br><br><br><br><br><br><br><br><br><br>



4 - Se o email que você vai enviar tiver código HTML use a função HTML() ficando assim:

$email->HTML();
os emails por padrão são enviados como texto, use essa função somente se quiser enviar código HTML
caso o contrário ela não precisa ser chamada.





<br><br><br><br><br><br><br><br><br><br>






5 - Se você for enviar email usando SMTP esse passo deve ser seguido, caso contrário, basta ignorar.

$email->Servidor('Coloque aqui o HOST informado nos seus dados SMTP');

$email->Usuario('Coloquei aqui o Username informado nos seus dados SMTP');

$email>Senha('Coloque aqui a sua senha informada dos dados SMTP');

A porta padrão é 587, caso a sua seja difernte você pode mudar usando a função a seguir:
$email->Porta('Coloque aqui a sua porta sem usar aspas, os numeros devem ser inteitros e não string');

aqui finalizamos a configuração de conexão SMTP, vamos agora enviar nosso email..





<br><br><br><br><br><br><br><br><br><br>





6 - Este passo é o mais simples e serve para emails comum e SMTP, vamos configurar o remetente, destinario, assunto e mensagem ;)
<br><br>
Remetente sem nome:<br>
$email->De('coloque aqui o seu email como remetente');


Remetente com nome:<br>
$email->De('coloque aqui o seu email como remetente', 'Coloque aqui o nome do seu email');

<br><br><br><br><br><br><br><br><br><br>

Destinatario sem nome:<br>
$email->Para('coloque aqui o email da pessoa que vai receber');
<br><br>

Destinatario com nome:<br>
$email->Para('coloque aqui o email da pessoa que vai receber', 'Coloque aqui o nome da pessoa que vai receber');
<br><br>


Agora vamos colocar o assunto o email:<br>  
$email->Assunto('Coloque aqui o assunto do email');
<br><br>


Agora vamos colocar a mensagem:<br>
$email->Mensagem('Coloque aqui a sua mensagem');
<br><br>


Se você quiser ou precisar enviar algum arquivo basta usar a função a seguir:

arquivo sem nome:<br>
$email->Arquivo('Coloque aqui o link local ou remoto do arquivo');
<br><br>


arquivo com nome:<br>
$email->Arquivo('Coloque aqui o link local ou remoto do arquivo', 'Coloque aqui o nome o seu arquivo');
<br><br>
Terminando isso, falta agora o passo mais importante de todos.. Vamos confirmar o envio!

<br><br><br><br><br><br><br><br><br><br><br>














7 - Confirmando o Envio da Mensagem:<br><br>
$email->Enviar();<br><br>
para saber se o seu email foi enviado ou não, basta fazer isso echo $email->Enviar();<br><br>
se o email for feito com sucesso, vai aparecer TRUE ou 1 para envio de email comum e uma mensagem de SUCESSO para email SMTP


<br><br>












Dúvidas? visite: www.openzero.com.br
