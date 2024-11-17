<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cutter</title>

</head>

<body>
   


<form action= "{{ route('geraCutter.store') }}" method="POST">
 @csrf 
            <div class="form-row"> 
            <div class= "form-group col-md-3"> <label for="sobrenome">Sobrenome </label> 
                <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Digite aqui seu Sobrenome"> 
            </div>

            <button class="btn btn-primary">Gerar Cutter</button>

        </form>




    </div>
</body>

</html>