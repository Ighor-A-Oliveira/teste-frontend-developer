<?php

//security, if the user manually tries to access this page without sending a post request the file will send them back to the index page
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    // Checks if the JSON is valid
    if (!$data) {
        http_response_code(400);
        echo "Erro: JSON inválido.";
        exit();
    }

    // assigning the vars
    $name = ucfirst(strtolower($data['name'])) ?? '';
    $email = strtolower($data['email']) ?? '';
    $phone = $data['phone'] ?? '';
    $msg = $data['msg'] ?? '';

    // checking if they are empty
    if (empty($name) || empty($email) || empty($phone) || empty($msg)) {
        http_response_code(400);
        echo "Erro: Preencha todos os campos.";
        exit();
    }

    // checking if the phone number is numeric
    if (!ctype_digit($phone)) {
        http_response_code(400);
        echo "Erro: O telefone deve conter apenas números.";
        exit();
    }

    

    try {
        //db connection
        require_once "dbh.inc.php";

        //raw query
        $query = "INSERT INTO contato_clientes (cliente_nome, cliente_email, cliente_fone, contato_mensagem) VALUES (:nome, :email, :phone, :msg)";
        //prepared statement to avoid SQL injection
        $stmt = $pdo->prepare($query);
        //binding the name to the var
        $stmt-> bindParam(":nome",$name);
        $stmt-> bindParam(":email", $email);
        $stmt-> bindParam(":phone", $phone);
        $stmt-> bindParam(":msg", $msg);
        //adding the data to the prepared statement and executing the query
        $stmt-> execute();

        //stop the db connection and query to free resources
        $pdo = null;
        $stmt = null;

        echo "success";
        die();
    } catch (PDOException $e) {
        http_response_code(500);
        echo "Erro: 1" . $e->getMessage();
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo "Método não permitido.";
    exit();
}