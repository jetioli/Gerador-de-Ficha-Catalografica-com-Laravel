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


    ///////////////////////////////////////// início //////////////////////////////////////////////////

    public function storecutter(Request $request)
    {
        $sobrenome = $request->input('sobrenome');
        $resultados = [];
    
        // Processamento da lógica de Cutter conforme o seu código atual
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
    
   // Método que contém a lógica de Palavras
   public function Palavras($palavra1, $palavra2, $palavra3, $palavra4, $palavra5)
   {
       if (($palavra1 != NULL) && ($palavra2 != NULL) && ($palavra3 != NULL) && ($palavra4 != NULL) && ($palavra5 != NULL)) {
           $um = ' 1. '. $palavra1 .'.';
           $dois = ' .2. '. $palavra2 .'.';
           $tres = ' .3. '. $palavra3 .'.';
           $quatro = ' .4. '. $palavra4 .'.';
           $cinco = ' .5. '. $palavra5 .'.';
           return $um .$dois .$tres .$quatro .$cinco;
       } elseif (($palavra1 != NULL) && ($palavra2 != NULL) && ($palavra3 != NULL) && ($palavra4 != NULL)) {
           $um = ' 1. '. $palavra1;
           $dois = ' .2. '. $palavra2;
           $tres = ' .3. ' . $palavra3;
           $quatro = ' .4. '. $palavra4;
           return $um. $dois. $tres. $quatro;
       } elseif (($palavra1 != NULL) && ($palavra2 != NULL) && ($palavra3 != NULL)) {
           $um = ' 1. '. $palavra1;
           $dois = ' .2. '. $palavra2;
           $tres = ' .3. ' . $palavra3;
           return $um. $dois. $tres;
       } elseif (($palavra1 != NULL) && ($palavra2 != NULL)) {
           $um = ' 1. '. $palavra1;
           $dois = ' .2. '. $palavra2;
           return $um. $dois;
       } elseif ($palavra1 != NULL) {
           $um = ' 1. '. $palavra1;
           return $um;
       }
   }

   public function store(Request $request)
{
    // Obtendo os dados do formulário
    $data = $request->all();

    // Atribuindo os dados a variáveis
    $sobrenome = $data["sobrenome"];
    $nome = $data["nome"];
    $titulo = $data["titulo"];
    $subtitulo = $data["subtitulo"];
    $local = $data["local"];
    $ano = $data["ano"];
    $pagina = $data["pagina"];
    $sobrenomeorientador = $data["sobrenomeorientador"];
    $nomeorientador = $data["nomeorientador"];
    $cutter = $data["cutter"];
    $tipo = $data["tipo"];
    $titulacao = $data["titulacao"];
    $palavra1 = $data["palavra1"];
    $palavra2 = $data["palavra2"];
    $palavra3 = $data["palavra3"];
    $palavra4 = $data["palavra4"];
    $palavra5 = $data["palavra5"];

    // Chamar o método Palavras dentro do store
    $palavras = $this->Palavras($palavra1, $palavra2, $palavra3, $palavra4, $palavra5);

    // Lógica para calcular o cutter
    $resultados = [];

    // Loop para verificar diferentes substrings do sobrenome
    for ($i = 1; $i <= 15; $i++) {
        // Cria substring com o tamanho reduzido
        $substring = substr($sobrenome, 0, -$i);

        // Consulta no banco de dados usando Eloquent
        $cutterData = Cutter::select('letras', 'numeros')
            ->where('letras', 'like', $substring)
            ->get();

        // Armazenar os resultados no array
        foreach ($cutterData as $row) {
            $resultados[$i][] = $row->numeros; // Adiciona os números ao array de resultados
        }
    }

    // Flatten os resultados e encontrar o maior valor
    $CSfinal3 = array_merge(...$resultados); // Combina todos os arrays de resultados em um único
    $maior = max($CSfinal3); // Encontra o maior valor

    // Obter a primeira letra do sobrenome
    $primeiraLetra = substr($sobrenome, 0, 1);

    // Concatenar a primeira letra com o maior valor
    $resultadoFinal = $primeiraLetra . $maior;

    // Criando o texto para o PDF
    $texto = "$resultadoFinal  $sobrenome, $nome. <br/> 
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$titulo. /$nome $sobrenome. - Belo Horizonte: ESP-MG, $ano.<br/>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$pagina f. <br/>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Orientador(a):$nomeorientador $sobrenomeorientador.<br/>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$tipo (Especialização) em $titulacao.<br/>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inclui bibliografia.<br/>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $palavras. I. $sobrenomeorientador, $nomeorientador. II. Escola de Saúde Pública do Estado de Minas Gerais. III. Título";

    // Gerar tabela HTML para o PDF
     // Aqui foi criada a tabela

       //$tabela = '<table border="1">';//abre table
       
      // $tabela = '<table border="1" style="width: 100%; height: 100vh; align-items: flex-end; justify-content: center; ">'; // display: flex; justify-content: center; align-items: flex-end;">';
      $tabela = '<table border="1" style="width: 80%; height: 80vh; align-items: end; justify-content: center; ">';
      $tabela .='<tbody>' ; //abre corpo da tabela
      $tabela .= '<td>' . $texto . '</td>';
      $tabela .='</tbody>'; //fecha corpo
      $tabela .= '</table>';//fecha tabela


    // Gerar PDF
    $pdf = PDF::loadHTML($tabela);
    return $pdf->stream('tabela.pdf');
}

    

    ////////////////////////////////////// FINAL /////////////////////////////////////////////

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


