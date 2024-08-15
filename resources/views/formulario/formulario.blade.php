<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Formulário de Solicitação de Ficha Catalográfica</title>
  </head>
  <body>
     
      <div class="mx-auto" style="width: 800px;">
        <h2>Formulário de Solicitação de Ficha Catalográfica</h2>
      </div>
      
      
      <form action= "{{ route('recebeDados.store') }}" method="POST">
        @csrf 
          
        <div class="form-row">
        <div class= "form-group col-md-3"> <label for="sobrenome">Sobrenome</label> <input type="text" class="form-control" id="sobrenome" name="sobrenome"></div>
        <div class= "form-group col-md-7"> <label for="nome">Nome</label> <input type="text" class="form-control" id="nome" name="nome"></div>
        <div class= "form-group col-md-12"> <label for="titulo">Título</label> <input type="text" class="form-control" id="titulo" name="titulo"></div>
        <div class= "form-group col-md-12"> <label for="subtitulo">Subtítulo</label> <input type="text" class="form-control" id="subtitulo" name="subtitulo"></div>  
        <div class= "form-group col-md-4"> <label for="pagina">Número de páginas</label> <input type="text" class="form-control" id="pagina" name="pagina"></div>  
        <div class= "form-group col-md-9"> <label for="local">Local</label> <input type="text" class="form-control" id="local" name="local"></div>       
        <div class= "form-group col-md-8"> <label for="ano">Ano</label> <input type="text" class="form-control" id="ano" name="ano"></div>            
       
        <div class= "form-group col-md-6"> <label for="sobrenomeorientador">Sobrenome do orientador</label> <input type="text" class="form-control" id="sobrenomeorientador" name="sobrenomeorientador"></div>                
                            
        <div class= "form-group col-md-6"> <label for="nomeorientador">Nome do orientador</label> <input type="text" class="form-control" id="nomeorientador" name="nomeorientador"></div>                       
                                  
         
        <div class= "form-group col-md-6"> <label for="tipo">Tipo de publicação</label> <select name="tipo" class="form-control" id="tipo" name="tipo">
            <option value="Monografia">Monografia</option>
            <option value="Projeto de Intervecao">Projeto de Intervenção</option>
            <option value="Artigo Cientifico">Artigo Científico</option>
            <option value="Guia Curricular">Guia Curricular</option>
            <option value="outro">Outro</option>

        </select>
    </div>



    <div class= "form-group col-md-8"> <label for="titulacao">Curso</label> <select name="titulacao" class="form-control" id="titulacao" name="titulacao">
      <option value="Saúde Pública">Saúde Pública</option>
      <option value="Direito Sanitário">Direito Sanitário</option>
      <option value="Saúde Mental">Saúde Mental</option>
     

  </select>
</div>
        
    <div class= "form-group col-md-12"> <label for="palavra1">Palavra-chave</label> <input type="text" class="form-control" id="palavra1" name="palavra1"></div>
    <div class= "form-group col-md-12"> <label for="palavra2">Palavra-chave</label> <input type="text" class="form-control" id="palavra2" name="palavra2"></div>
    <div class= "form-group col-md-12"> <label for="palavra3">Palavra-chave</label> <input type="text" class="form-control" id="palavra3" name="palavra3"></div>
    <div class= "form-group col-md-12"> <label for="palavra4">Palavra-chave</label> <input type="text" class="form-control" id="palavra4" name="palavra4"></div>
    <div class= "form-group col-md-12"> <label for="palavra5">Palavra-chave</label> <input type="text" class="form-control" id="palavra5" name="palavra5"></div>
    <button class="btn btn-primary">Gerar Ficha</button>
        </div>
  
  
      </form>
  </body>
  </html>
