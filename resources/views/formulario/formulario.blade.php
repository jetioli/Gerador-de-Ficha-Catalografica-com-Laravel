<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Ficha Catalográfica</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 900px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
    </style>
    <script>
        function toggleFields() {
            let nome2Field = document.getElementById('nome2Field');
            let sobrenome2Field = document.getElementById('sobrenome2Field');
            let button = document.getElementById('toggleButton');

            if (nome2Field.style.display === "none") {
                nome2Field.style.display = "block";
                sobrenome2Field.style.display = "block";
                button.innerText = "Remover outro autor";
                button.classList.replace('btn-outline-secondary', 'btn-danger');
            } else {
                nome2Field.style.display = "none";
                sobrenome2Field.style.display = "none";
                button.innerText = "Adicionar outro autor";
                button.classList.replace('btn-danger', 'btn-outline-secondary');
            }
        }
    </script>
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center mb-4">Formulário de Ficha Catalográfica</h2>
    
    <form action="{{ route('recebeDados.store') }}" method="POST">
        @csrf 

        <div class="row">
            <div class="form-group col-md-4">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Exemplo: Assis">
            </div>

            <div class="form-group col-md-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Exemplo: Joaquim Machado de">
            </div>

            <div class="form-group col-md-12">
                <button type="button" id="toggleButton" class="btn btn-outline-secondary w-100" onclick="toggleFields()">Adicionar outro autor</button>
            </div>

            <div class="form-group col-md-4" id="sobrenome2Field" style="display:none;">
                <label for="sobrenome2">Sobrenome do outro autor</label>
                <input type="text" class="form-control" id="sobrenome2" name="sobrenome2">
            </div>

            <div class="form-group col-md-8" id="nome2Field" style="display:none;">
                <label for="nome2">Nome do outro autor</label>
                <input type="text" class="form-control" id="nome2" name="nome2">
            </div>

            <div class="form-group col-md-12">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo">
            </div>

            <div class="form-group col-md-12">
                <label for="subtitulo">Subtítulo</label>
                <input type="text" class="form-control" id="subtitulo" name="subtitulo">
            </div>

            <div class="form-group col-md-3">
                <label for="pagina">Número de páginas</label>
                <input type="text" class="form-control" id="pagina" name="pagina">
            </div>

            <div class="form-group col-md-2">
                <label for="ano">Ano</label>
                <input type="text" class="form-control" id="ano" name="ano">
            </div>

            <div class="form-group col-md-6">
                <label for="local">Local</label>
                <input type="text" class="form-control" id="local" name="local">
            </div>

            <div class="form-group col-md-6">
                <label for="sobrenomeorientador">Sobrenome do(a) orientador(a)</label>
                <input type="text" class="form-control" id="sobrenomeorientador" name="sobrenomeorientador">
            </div>

            <div class="form-group col-md-6">
                <label for="nomeorientador">Nome do(a) orientador(a)</label>
                <input type="text" class="form-control" id="nomeorientador" name="nomeorientador">
            </div>

            <div class="form-group col-md-6">
                <label for="tipo">Tipo de publicação</label>
                <select class="form-control" id="tipo" name="tipo">
                    <option value="Monografia">Monografia</option>
                    <option value="Projeto de Intervenção">Projeto de Intervenção</option>
                    <option value="Artigo Científico">Artigo Científico</option>
                    <option value="Guia Curricular">Guia Curricular</option>
                    <option value="outro">Outro</option>
                </select>
            </div>

            <div class="form-group col-md-12">
                <label for="titulacao">Curso</label>
                <select class="form-control" id="titulacao" name="titulacao">
                    <option value="Saúde Pública">Saúde Pública</option>
                    <option value="Direito Sanitário">Direito Sanitário</option>
                    <option value="Saúde Mental">Saúde Mental</option>
                </select>
            </div>

            <div class="col-md-12">
                <label>Palavras-chave</label>
                <div class="form-group d-flex flex-wrap">
                    <input type="text" class="form-control mb-2 col-md-4" name="palavra1" placeholder="Palavra-chave 1">
                    <input type="text" class="form-control mb-2 col-md-4" name="palavra2" placeholder="Palavra-chave 2">
                    <input type="text" class="form-control mb-2 col-md-4" name="palavra3" placeholder="Palavra-chave 3">
                    <input type="text" class="form-control mb-2 col-md-4" name="palavra4" placeholder="Palavra-chave 4">
                    <input type="text" class="form-control mb-2 col-md-4" name="palavra5" placeholder="Palavra-chave 5">
                </div>
            </div>

            <div class="form-group col-md-12">
                <button class="btn btn-primary btn-lg btn-block">Gerar Ficha</button>
            </div>
        </div>
    </form>
</div>

</body>
</html>

