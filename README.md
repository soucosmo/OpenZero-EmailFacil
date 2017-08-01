# OpenZero-EmailFacil
Essa Classe em PHP simplifica o envio de emails de forma segura, com ela você pode enviar emails SMTP e comum,
com poucas linhas de código.


Para usar a classe em seu sistema siga estes passos
1 - Copiar os arquivos para a pasta do seu projeto

Você pode usar o git se desejar: https://github.com/cosmo9able/OpenZero-EmailFacil
ou você pode simplesmente fazer o download de uma cópia em zip




2 - Faça a inclusão da do autoload no arquivo do seu projeto

include = 'PastaDaClasse/autoload.php';



3 - Instancie a classe

$email = new EmailFacil(true);
observe que se você desejar usar SMTP você deve passar o valor TRUE como parametro
caso você queira usar os emails normais, use apenas $email = new Email; (esta modalidade não é muito recomenda)


4 - Se o email que você vai enviar tiver código HTML use a função HTML() ficando assim:

$email->HTML();
os emails por padrão são enviados como texto, use essa função somente se quiser enviar código HTML
caso o contrário ela não precisa ser chamada.


5 - Se você for enviar email usando SMTP esse passo deve ser seguido, caso contrário, basta ignorar.

$email->Servidor('Coloque aqui o HOST informado nos seus dados SMTP');

$email->Usuario('Coloquei aqui o Username informado nos seus dados SMTP');

$email>Senha('Coloque aqui a sua senha informada dos dados SMTP');

A porta padrão é 587, caso a sua seja difernte você pode mudar usando a função a seguir:
$email->Porta('Coloque aqui a sua porta sem usar aspas, os numeros devem ser inteitros e não string');

aqui finalizamos a configuração de conexão SMTP, vamos agora enviar nosso email..



6 - Este passo é o mais simples e serve para emails comum e SMTP, vamos configurar o remetente, destinario, assunto e mensagem ;)

Remetente sem nome:
$email->De('coloque aqui o seu email como remetente');

Remetente com nome
$email->De('coloque aqui o seu email como remetente', 'Coloque aqui o nome do seu email');



Destinatario sem nome:
$email->Para('coloque aqui o email da pessoa que vai receber');

Destinatario com nome:
$email->Para('coloque aqui o email da pessoa que vai receber', 'Coloque aqui o nome da pessoa que vai receber');

Agora vamos colocar o assunto o email:
$email->Assunto('Coloque aqui o assunto do email');

Agora vamos colocar a mensagem:
$email->Mensagem('Coloque aqui a sua mensagem');

Se você quiser ou precisar enviar algum arquivo basta usar a função a seguir:

arquivo sem nome
$email->Arquivo('Coloque aqui o link local ou remoto do arquivo');

arquivo com nome
$email->Arquivo('Coloque aqui o link local ou remoto do arquivo', 'Coloque aqui o nome o seu arquivo');

Terminando isso, falta agora o passo mais importante de todos.. Vamos confirmar o envio!

7 - Confirmando o Envio da Mensagem:
$email->Enviar();
para saber se o seu email foi enviado ou não, basta fazer isso echo $email->Enviar();
se o email for feito com sucesso, vai aparecer TRUE ou 1 para envio de email comum e uma mensagem de SUCESSO para email SMTP

Dúvidas? visite: www.openzero.com.br
