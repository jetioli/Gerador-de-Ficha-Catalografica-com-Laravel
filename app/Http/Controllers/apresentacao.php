<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Cutter;

class apresentacao extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
       
        
        $cutter = Cutter::get();

        dd($cutter);
       


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("formulario.formulario");
    }


    public function createcutter()
    {
        //
        return view("formulario.formularioCutter");



        
    }


    public function storecutter(Request $request)
    {
      
       

    // Obter o sobrenome do request
    $sobrenome = $request->input('sobrenome');

    // Criar um array para armazenar os resultados
    $resultados = [];

    // Loop para verificar diferentes substrings do sobrenome
    for ($i = 1; $i <= 15; $i++) {
        $substring = substr($sobrenome, 0, -$i); // Cria substring com o tamanho reduzido

        // Consulta usando Eloquent
        $cutter = Cutter::select('letras', 'numeros')
            ->where('letras', 'like', $substring)
            ->get();

        // Armazena os resultados no array
        foreach ($cutter as $row) {
            $resultados[$i][] = $row->numeros; // Adiciona os números ao array de resultados
        }
    }

    // Flatten the results and get the maximum value
    $CSfinal3 = array_merge(...$resultados); // Combina todos os arrays de resultados em um único
    $maior = max($CSfinal3); // Encontra o maior valor

    // Obter a primeira letra de $sobrenome
    $primeiraLetra = substr($sobrenome, 0, 1);

    // Concatenar a primeira letra com o maior valor
    $resultadoFinal = $primeiraLetra . $maior;

    // Exibir o resultado final
    print_r($resultadoFinal); // Imprime algo como "S123", se a primeira letra for "S" e o maior valor for 123


        
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Aqui foram criadas as variáveis vindas do formulário

        $data = $request->all();
       

      
      
        $nome = $data["nome"]; 
        $sobrenome = $data["sobrenome"]; 
        $titulo = $data["titulo"];
        $subtitulo = $data["subtitulo"]; 
        $local =$data["local"]; 
        $ano = $data["ano"]; 
        $pagina = $data["pagina"]; 
        $sobrenomeorientador = $data["sobrenomeorientador"]; 
        $nomeorientador = $data["nomeorientador"]; 
        $cutter = $data ["cutter"];
        $tipo = $data["tipo"]; 
        $titulacao = $data["titulacao"];
        $palavra1 = $data["palavra1"]; 
        $palavra2 = $data["palavra2"]; 
        $palavra3 = $data["palavra3"]; 
        $palavra4 = $data["palavra4"]; 
        $palavra5 = $data["palavra5"]; 





        function Palavras($palavra1,$palavra2,$palavra3,$palavra4,$palavra5){


            if (($palavra1 != NULL) and ($palavra2 != NULL) and ($palavra3 != NULL) and ($palavra4 != NULL)and ($palavra5 != NULL)) {
                $um = ' 1. '. $palavra1.'.';
                $dois = ' .2. '. $palavra2.'.';
                $tres = ' .3. ' . $palavra3.'.';
                $quatro = ' .4. '. $palavra4.'.';
                $cinco = ' .5. '. $palavra5.'.';
                return $um .$dois .$tres .$quatro .$cinco;
          
            }
        
        elseif (($palavra1 != NULL) and ($palavra2 != NULL) and ($palavra3 != NULL) and ($palavra4 != NULL)) {
            $um = ' 1. '. $palavra1;
            $dois = ' .2. '. $palavra2;
            $tres = ' .3. ' . $palavra3;
            $quatro = ' .4. '. $palavra4;
            return $um. $dois. $tres. $quatro;
          }
        
        elseif (($palavra1 != NULL) and ($palavra2 != NULL) and ($palavra3 != NULL)) {
            $um = ' 1. '. $palavra1;
            $dois = ' .2. '. $palavra2;
            $tres = ' .3. ' . $palavra3;
            return $um. $dois. $tres;
          }
        
        elseif (($palavra1 != NULL) and ($palavra2 != NULL)) {
            $um = ' 1. '. $palavra1;
            $dois = ' .2. '. $palavra2;
            
            return $um. $dois;
        
        }
        
        
        elseif ($palavra1 != NULL) {
        
           $um = ' 1. '. $palavra1;
           return $um;
          }
        
          
        
         
        
        }

      
       $palavras = Palavras($palavra1,$palavra2,$palavra3,$palavra4,$palavra5);
      
      
       // Foi criada a variável $texto para receber os dados.

        $texto = "$cutter  $sobrenome, $nome. <br/> 
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$titulo. /$nome $sobrenome. - Belo Horizonte: ESP-MG, $ano.<br/>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$pagina f. <br/>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Orientador(a):$nomeorientador $sobrenomeorientador.<br/>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$tipo (Especialização) em $titulacao.<br/>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inclui bibliografia.<br/>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $palavras. I. $sobrenomeorientador, $nomeorientador. II. Escola de Saúde Pública do Estado de Minas Gerais. III. Título";




      // Aqui foi criada a tabela

       //$tabela = '<table border="1">';//abre table
       
      // $tabela = '<table border="1" style="width: 100%; height: 100vh; align-items: flex-end; justify-content: center; ">'; // display: flex; justify-content: center; align-items: flex-end;">';
       $tabela = '<table border="1" style="width: 80%; height: 80vh; align-items: end; justify-content: center; ">';
       $tabela .='<tbody>' ; //abre corpo da tabela
       $tabela .= '<td>' . $texto . '</td>';
       $tabela .='</tbody>'; //fecha corpo
       $tabela .= '</table>';//fecha tabela
   
        // imprime a tabela em html
        //echo $tabela;


      // imprimindo a tabela em pdf:

       $pdf = PDF::loadHTML($tabela);
       return $pdf->stream('tabela.pdf');
       return redirect()->route('cutter.index'); // sugestão do chattgpt para enviar para rota index.
      

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
        
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



   



}


