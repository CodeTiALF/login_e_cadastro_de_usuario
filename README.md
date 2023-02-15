# login_e_cadstro_de_usuario
Um simples formulário em PHP + CSS + HTML para login e cadastrar usuário, utilizando de alguns métodos de segurança.

- Esse é um código em PHP que realiza o cadastro e autenticação de usuários em um banco de dados MySQL.
- A primeira parte do código é responsável por conectar o banco de dados MySQL, utilizando as informações do servidor, nome de usuário e senha definidos na parte superior do código.
- Em seguida, o código verifica se o formulário de cadastro foi submetido e insere o usuário e senha criptografados no banco de dados.
- Depois, é definida uma consulta SQL para selecionar um usuário com base no nome de usuário e senha fornecidos. A consulta é preparada e executada utilizando os valores do formulário de login.
- Em seguida, o código verifica se o formulário de login foi submetido e se a consulta SQL retornou um resultado. Se a autenticação for bem-sucedida, uma mensagem de sucesso é exibida. Caso contrário, uma mensagem de erro é exibida.
- Por fim, o código define o estilo do formulário de login e exibe o formulário com campos para inserir nome de usuário e senha. A mensagem de feedback é exibida logo abaixo do formulário, dependendo do resultado da autenticação.
