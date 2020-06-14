<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Comandos para os testes
Após baixar o projeto, configurar conexão com o banco de dados e baixar as dependências com composer:

php artisan migrate
Cria as tabelas do bando de dados
- [{BASE_URL}/api/pets/]()

php artisan db:seed (opcional)
Popula as tabelas com dados de exemplo
- [{BASE_URL}/api/pets/]()

## Endpoints

### Pets

##### GET
busca todos pets
- [{BASE_URL}/api/pets/]()

busca pet por id
- [{BASE_URL}/api/pets/{ID_PET}]()

busca pets pelo nome ou ocorrencia do nome (Podendo ser o nome completo ou as letras iniciais do nome)
- [{BASE_URL}/api/pets/{NOME_PET}]()

##### POST
Cadastra um novo pet
- [{BASE_URL}/api/pets/]()

###### BODY
Exemplo de dados a serem enviados (Podendo cadastrar mais de um por vez)
[{"nome":"Marley","especie":"G"}]

##### DELETE
Remove pet
- [{BASE_URL}/api/pets/{ID_PET}]()

### Atendimento

##### GET
busca todos Atendimentos (Sem formatação)
- [{BASE_URL}/api/atendimento/]()

busca atendimento(s) pelo id do Pet
- [{BASE_URL}/api/atendimento/{ID_PET}]()

busca atendimento pelo nome do pet ou ocorrencia do nome do pet (Podendo ser o nome completo ou as letras iniciais do nome)
- [{BASE_URL}/api/atendimento/{NOME_PET}]()

##### POST
Cadastra um novo Atendimento
- [{BASE_URL}/api/atendimento/]()

###### BODY
Exemplo de dados a serem enviados (Podendo cadastrar mais de um por vez)
[{"id_pet":1,"descricao":"Banho e tosa","data_atendimento":"2020-06-10"}]

##### DELETE
Remove atendimento
- [{BASE_URL}/api/atendimento/{ID_ATENDIMENTO}]()