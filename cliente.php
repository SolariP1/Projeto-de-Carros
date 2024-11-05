<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <style>
        section { text-align: center; }
    </style>
    <script>
        function enviarFormulario(botao) {
            const formData = new FormData();
            formData.append('id', document.getElementById("id").value);
            formData.append('nome', document.getElementById("nome").value);
            formData.append('endereco', document.getElementById("endereco").value);
            formData.append('cpf', document.getElementById("cpf").value);
            formData.append('car_codigo', document.getElementById("car_codigo").value); 
            formData.append('botao', botao);

            fetch('cliente_modify.php', { method: 'POST', body: formData })
                .then(response => response.json())
                .then(data => {
                    document.getElementById("mensagem").innerHTML = data.mensagem;

                    if (botao === 'consulta' && data.sucesso) {
                        document.getElementById("nome").value = data.cli_nome;
                        document.getElementById("endereco").value = data.cli_endereco;
                        document.getElementById("cpf").value = data.cli_cpf;
                        document.getElementById("car_codigo").value = data.car_codigo; 
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                    document.getElementById("mensagem").innerHTML = "Erro ao realizar a operação.";
                });
        }
    </script>
</head>
<body>
<section>
    <h1>Cadastro de Clientes</h1>
    <div>
        <label>Código:</label>
        <input type="text" id="id"><button onclick="enviarFormulario('consulta')">Buscar</button><br><br>
        <label>Nome:</label>  
        <input type="text" id="nome"><br><br>
        <label>Endereço:</label>
        <input type="text" id="endereco"><br><br>
        <label>CPF:</label>
        <input type="text" id="cpf"><br><br>
        
        <label>Carro:</label>
        <select id="car_codigo">
            <option value="">Selecione um Carro</option>
            <?php
            include 'conecta.php';
            $sql = "SELECT car_codigo, car_modelo FROM carro";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['car_codigo']}'>{$row['car_modelo']}</option>";
            }
            mysqli_close($conn);
            ?>
        </select><br><br>
    </div>
    <button onclick="enviarFormulario('inserir')">Inserir</button>
    <button onclick="enviarFormulario('alterar')">Alterar</button>
    <button onclick="enviarFormulario('excluir')">Excluir</button><br><br>
    <p id="mensagem"></p>
    <a href="index.php"><button>Sair</button></a>
</section>
</body>
</html>
