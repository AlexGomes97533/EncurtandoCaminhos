<?php
// Configurações do banco de dados
$servername = "localhost"; // Endereço do servidor MySQL (geralmente localhost)
$username = "root"; // Nome de usuário do banco de dados
$password = ""; // Senha do banco de dados
$database = "db_apl_caminhos"; // Nome do banco de dados a ser utilizado

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $database);
