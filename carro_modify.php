<?php
include 'conecta.php';

$id = $_POST['id'] ?? null;
$modelo = $_POST['modelo'] ?? null;
$valor = $_POST['valor'] ?? null;
$botao = $_POST['botao'] ?? null;

$response = ["sucesso" => false, "mensagem" => ""];

switch ($botao) {
    case 'consulta':
        if ($id) {
            $sql = "SELECT * FROM carro WHERE car_codigo = '$id'";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $response = [
                    "sucesso" => true,
                    "car_modelo" => $row['car_modelo'],
                    "car_valor" => $row['car_valor'],
                    "mensagem" => "Carro encontrado."
                ];
            } else {
                $response["mensagem"] = "Carro não encontrado.";
            }
        } else {
            $response["mensagem"] = "Código do carro não informado.";
        }
        break;

    case 'inserir':
        if ($modelo && $valor) {
            $sql = "INSERT INTO carro (car_modelo, car_valor) VALUES ('$modelo', '$valor')";
            $response["mensagem"] = mysqli_query($conn, $sql) ? "Gravado com sucesso!" : "Erro ao gravar: " . mysqli_error($conn);
            $response["sucesso"] = true;
        } else {
            $response["mensagem"] = "Preencha todos os campos!";
        }
        break;

    case 'alterar':
        if ($id && $modelo && $valor) {
            $sql = "UPDATE carro SET car_modelo = '$modelo', car_valor = '$valor' WHERE car_codigo = '$id'";
            $response["mensagem"] = mysqli_query($conn, $sql) ? "Atualizado com sucesso!" : "Erro ao atualizar: " . mysqli_error($conn);
            $response["sucesso"] = true;
        } else {
            $response["mensagem"] = "Preencha todos os campos!";
        }
        break;

    case 'excluir':
        if ($id) {
            $sql = "DELETE FROM carro WHERE car_codigo = '$id'";
            $response["mensagem"] = mysqli_query($conn, $sql) ? "Excluído com sucesso!" : "Erro ao excluir: " . mysqli_error($conn);
            $response["sucesso"] = true;
        } else {
            $response["mensagem"] = "Código do carro não informado.";
        }
        break;

    default:
        $response["mensagem"] = "Ação inválida.";
}

mysqli_close($conn);
echo json_encode($response);
?>
