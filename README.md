<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Comandos para os testes
Após baixar o projeto, configurar conexão com o banco de dados e baixar as dependências com composer:

Cria as tabelas do bando de dados
- [php artisan migrate]()

Popula as tabelas com dados de exemplo
- [php artisan db:seed (opcional)]()



## Endpoints

### Pets

##### GET
busca todos pets (Limite de 10 por Página)
- [{BASE_URL}/api/pets/]()

Busca por página específica
- [{BASE_URL}/api/pets/?page=2]()

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
busca todos Atendimentos (Sem formatação e limite de 15 por Página)
- [{BASE_URL}/api/atendimento/]()

busca por página específica
- [{BASE_URL}/api/atendimento?page=2]()

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