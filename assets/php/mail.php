<?php
// Receber os dados do formulário
$nome = $_POST['fullname'];
$email = $_POST['email'];
$assunto = $_POST['Assunto'];
$mensagem = $_POST['message'];

// Validar se os campos estão preenchidos
if (empty($nome) || empty($email) || empty($assunto) || empty($mensagem)) {
    echo "Por favor, preencha todos os campos.";
    exit;
}

// Validar se o email é válido
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Por favor, digite um email válido.";
    exit;
}

// Definir o destinatário do email
$destinatario = "tarcistt@gmail.com";

// Definir o cabeçalho do email
$headers = "From: $nome <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Enviar o email com a função mail()
if (mail($destinatario, $assunto, $mensagem, $headers)) {
    echo "Email enviado com sucesso!";
} else {
    echo "Ocorreu um erro ao enviar o email.";
}
?>
