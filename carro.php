<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Carros</title>
    <style>
        section { text-align: center; }
    </style>
    <script>
        function enviarFormulario(botao) {
            const formData = new FormData();
            formData.append('id', document.getElementById("id").value);
            formData.append('modelo', document.getElementById("modelo").value);
            formData.append('valor', document.getElementById("valor").value);
            formData.append('botao', botao);

            fetch('carro_modify.php', { method: 'POST', body: formData })
                .then(response => response.json())
                .then(data => {
                    document.getElementById("mensagem").innerHTML = data.mensagem;

                    if (botao === 'consulta' && data.sucesso) {
                        document.getElementById("modelo").value = data.car_modelo;
                        document.getElementById("valor").value = data.car_valor;
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
    <h1>Cadastro de Carros</h1>
    <div>
        <label>Código:</label>
        <input type="text" id="id"><button onclick="enviarFormulario('consulta')">Buscar</button><br><br>
        <label>Modelo:</label>
        <input type="text" id="modelo"><br><br>
        <label>Valor:</label>
        <input type="text" id="valor"><br><br>
    </div>
    <button onclick="enviarFormulario('inserir')">Inserir</button>
    <button onclick="enviarFormulario('alterar')">Alterar</button>
    <button onclick="enviarFormulario('excluir')">Excluir</button><br><br>
    <p id="mensagem"></p>
    <a href="index.php"><button>Sair</button></a>
</section>
</body>
</html>
