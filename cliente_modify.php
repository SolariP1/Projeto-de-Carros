<?php
include 'conecta.php';

$id = $_POST['id'] ?? null;
$nome = $_POST['nome'] ?? null;
$endereco = $_POST['endereco'] ?? null;
$cpf = $_POST['cpf'] ?? null;
$car_codigo = $_POST['car_codigo'] ?? null; 
$botao = $_POST['botao'] ?? null;

$response = ["sucesso" => false, "mensagem" => ""];

switch ($botao) {
    case 'consulta':
        if ($id) {
            $sql = "SELECT * FROM cliente WHERE cli_codigo = '$id'";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $response = [
                    "sucesso" => true,
                    "cli_nome" => $row['cli_nome'],
                    "cli_endereco" => $row['cli_endereco'],
                    "cli_cpf" => $row['cli_cpf'],
                    "car_codigo" => $row['car_codigo'], 
                    "mensagem" => "Cliente encontrado."
                ];
            } else {
                $response["mensagem"] = "Cliente não encontrado.";
            }
        } else {
            $response["mensagem"] = "Código do cliente não informado.";
        }
        break;

    case 'inserir':
        if ($nome && $endereco && $cpf) {
            $sql = "INSERT INTO cliente (cli_nome, cli_endereco, cli_cpf, car_codigo) VALUES ('$nome', '$endereco', '$cpf', '$car_codigo')";
            $response["mensagem"] = mysqli_query($conn, $sql) ? "Gravado com sucesso!" : "Erro ao gravar: " . mysqli_error($conn);
            $response["sucesso"] = true;
        } else {
            $response["mensagem"] = "Preencha todos os campos!";
        }
        break;

    case 'alterar':
        if ($id && $nome && $endereco && $cpf) {
            $sql = "UPDATE cliente SET cli_nome = '$nome', cli_endereco = '$endereco', cli_cpf = '$cpf', car_codigo = '$car_codigo' WHERE cli_codigo = '$id'";
            $response["mensagem"] = mysqli_query($conn, $sql) ? "Atualizado com sucesso!" : "Erro ao atualizar: " . mysqli_error($conn);
            $response["sucesso"] = true;
        } else {
            $response["mensagem"] = "Preencha todos os campos!";
        }
        break;

    case 'excluir':
        if ($id) {
            $sql = "DELETE FROM cliente WHERE cli_codigo = '$id'";
            $response["mensagem"] = mysqli_query($conn, $sql) ? "Excluído com sucesso!" : "Erro ao excluir: " . mysqli_error($conn);
            $response["sucesso"] = true;
        } else {
            $response["mensagem"] = "Código do cliente não informado.";
        }
        break;

    default:
        $response["mensagem"] = "Ação inválida.";
}

mysqli_close($conn);
echo json_encode($response);
?>
