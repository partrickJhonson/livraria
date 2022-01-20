Criar a tabela no Banco de dados:

```sql
create table acervo(
     id integer primary key AUTO_INCREMENT,
    autor varchar(60) not null,
    titulo varchar(100) not null,
    ano integer not null,
    preco double not null,
    editora integer not null,
    quantidade integer not null,
    tipo integer not null
);create table Editora(
    id integer primary key AUTO_INCREMENT,
    nome varchar(200) not null
)

Configurar o arquivo Conexao.php dentro da pasta 'app/conexao': <br>

Adicione o codigo abaixo dentro da função getConexão(), caso seu banco seja Mysql ja está como padrão.<br>
Lembre-se de alterar os dados(dbname,user,password) na conexão de acordo com seu banco.


