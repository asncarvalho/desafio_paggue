# Desafio Paggue

>Status : Concluído. ✔️

## Os campos do modelo principal (Usuário) são:

+ name
+ cpf 
+ email
+ role_id


## Tecnologias Usadas

<table>
    <tr>
        <td>PHP</td>
        <td>Laravel</td>
        <td>Composer</td>
        <td>MySQL(MariaDB)</td>
    </tr>
    <tr>
        <td>8.*</td>
        <td>^9.11</td>
        <td>2.0</td>
        <td>10.8.3</td>
    </tr>
</table>

Como rodar a aplicação?

1) na linha de comando: composer install
2) crie um banco de dados chamado 'desafio_paggue'
3) configurar as variáveis de desenvolvimento no .env
- Para envio de emails, configure no .env 
    ```
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    ```
Adicione o email e senha utilizado para enviar, se faz necessário também habilitar no gmail o uso de apps terceiros.
4) rode o comando : php artisan migrate
5) rode o comando : php artisan db:seed --class=RolesSeeder
6) rode o comando : php artisan serve
7) rode o comando : php artisan queue:work --tries 3 (abra outra instância de terminal) 

Para utilizar, cadastre na rota /users um novo usuário, ele deve ter o role_id de acordo com o papel necessário para fazer transferências/saques
As rotas ('/users', '/payments' e '/companies') tem CRUD util, podendo realizar todas as ações necessárias. 
A rota ('/roles') só permite a criação e leitura de todos as roles disponíveis no banco

Para fazer um pagamento, certifique-se que o usuário possui a role de Administrador. E que a conta receptora seja uma conta verificada.
Se o .env foi configurado de forma correta, a aplicação processará o pagamento e logo envia uma notificação para o email do usuário que fez a transferência de que ela foi concluida com sucesso

Até onde eu sei, o laravel não tem um DTO(data transfer object), irei passar os DTOS em forma de JSON, utilize o insomnia ou outra aplicação HTTP Client.

dados fictícios!

DTO Users

(/users ou /users/{id}) - POST/PATCH = 
```
{
	"name": "Teste",
    "cpf": "8888888883",
	"role_id": 1,
	"email": "hello@example.com",
	"password": "12345678"
}
```

(/users/{id}) - GET, DELETE


DTO Companies

(/companies ou /companies/{id}) - POST/PATCH = 
```
{
	"cnpj" : "35.918.296/0001-09",
	"razao_social" : "BetoPetch Revendas LTDA",
	"nome_fantasia" : "BetoPetch",
	"telefone" : "888888881",
	"email" : "betopetch2@revendas.com",
	"value": 2000
}
```
(/companies/{id}) - GET, DELETE

DTO Payments

(/payments ou /payments/{id}) - POST/PATCH = 
```
{
	"user_id": 2,
	"company_sender_id": 1,
	"company_reciever_id": 4,
	"transfer_value" : 200
}
```
(/payments/{id}) - GET, DELETE



