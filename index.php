<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <style>
        /* Resetando algumas configurações padrão */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Corpo da página */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Seção principal */
        .sessao {
            background-color: #fff;
            border-radius: 10px;
            padding: 40px;
            text-align: center;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 500px;
        }

        .sessao h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 30px;
            font-weight: bold;
        }

        /* Links estilizados */
        a {
            display: block;
            font-size: 18px;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            margin: 15px 0;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }

        /* Responsividade */
        @media (max-width: 600px) {
            .sessao {
                padding: 30px;
            }

            .sessao h1 {
                font-size: 28px;
            }

            a {
                font-size: 16px;
                padding: 10px 18px;
            }
        }
    </style>
</head>
<body>
    <section class="sessao">
        <h1>Tela Principal</h1>
        <a href="carro.php">Cadastro de Carro</a>
        <a href="cliente.php">Cadastro de Cliente</a>
    </section>    
</body>
</html>
