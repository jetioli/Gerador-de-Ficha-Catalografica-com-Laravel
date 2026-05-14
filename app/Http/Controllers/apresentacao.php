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
        return view("formulario.formulario");
    }

    public function createcutter()
    {
        return view("formulario.formularioCutter");
    }

    ///////////////////////////////////////// início //////////////////////////////////////////////////

    public function storecutter(Request $request)
    {
        $sobrenome = $request->input('sobrenome');
        $resultados = [];

        for ($i = 1; $i <= 15; $i++) {
            $substring = substr($sobrenome, 0, -$i); 

            $cutter = Cutter::select('letras', 'numeros')
                ->where('letras', 'like', $substring)
                ->get();

            foreach ($cutter as $row) {
                $resultados[$i][] = $row->numeros;
            }
        }

        $CSfinal3 = array_merge(...$resultados); 
        $maior = max($CSfinal3); 

        $primeiraLetra = substr($sobrenome, 0, 1);
        $resultadoFinal = $primeiraLetra . $maior;

        print_r($resultadoFinal);
    }
    
    // Método que contém a lógica de Palavras
    public function Palavras($palavra1, $palavra2, $palavra3, $palavra4, $palavra5)
    {
        if (($palavra1 != NULL) && ($palavra2 != NULL) && ($palavra3 != NULL) && ($palavra4 != NULL) && ($palavra5 != NULL)) {
            $um = ' 1. '. $palavra1;
            $dois = '. 2. '. $palavra2 ;
            $tres = '. 3. '. $palavra3 ;
            $quatro = '. 4. '. $palavra4;
            $cinco = '. 5. '. $palavra5;
            return $um .$dois .$tres .$quatro .$cinco;
        } elseif (($palavra1 != NULL) && ($palavra2 != NULL) && ($palavra3 != NULL) && ($palavra4 != NULL)) {
            $um = ' 1. '. $palavra1;
            $dois = '. 2. '. $palavra2;
            $tres = '. 3. ' . $palavra3;
            $quatro = '. 4. '. $palavra4;
            return $um. $dois. $tres. $quatro;
        } elseif (($palavra1 != NULL) && ($palavra2 != NULL) && ($palavra3 != NULL)) {
            $um = ' 1. '. $palavra1;
            $dois = '. 2. '. $palavra2;
            $tres = '. 3 . ' . $palavra3;
            return $um. $dois. $tres;
        } elseif (($palavra1 != NULL) && ($palavra2 != NULL)) {
            $um = ' 1. '. $palavra1;
            $dois = '. 2. '. $palavra2;
            return $um. $dois;
        } elseif ($palavra1 != NULL) {
            $um = ' 1. '. $palavra1;
            return $um;
        }
    }


    // Método que gera a NLM


    private function GeraNLM($titulacao) {
        
    switch ($titulacao) {
        case 'Saúde Pública':
            $NLM = "WA 100";
            break;

        case 'Saúde Pública - Saúde no Sistema Prisional':
            $NLM = "WA 300";
            break;

        case 'Direito Sanitário':
            $NLM = "WA 32";
            break;

        case 'Políticas de Saúde Mental e Atenção Psicossocial':
            $NLM = "WM 100";
            break;

        case 'Gestão do SUS':
            $NLM = "WA 525";
            break;

        case 'Vigilância em Saúde':
            $NLM = "WA 900";
            break;

        case 'Comunicação em Saúde':
            $NLM = "WA 590";
            break;

        case 'Atenção a Usuários de Drogas no SUS':
            $NLM = "WM 100";
            break;

        case 'Gestão Hospitalar':
            $NLM = "WX 150";
            break;

        default:
            $NLM = "WA 100";
            break;
    }

    return $NLM;
}


    // Definindo o método para gerar as remissivas
    public function gerarRemissiva($palavras, $sobrenomeorientador, $nomeorientador, $titulo, $nome2 = null, $sobrenome2 = null)
    {
        if (empty($nome2) || empty($sobrenome2)) {
            return $palavras . ".  I. " . $sobrenomeorientador . ", " . $nomeorientador . ". II. Escola de Saúde Pública do Estado de Minas Gerais. III. " . "Título";
        } else {
            return $palavras . ". I. " . $sobrenome2 . ", " . $nome2 . ". II. " . $sobrenomeorientador . ", " . $nomeorientador . ". III. Escola de Saúde Pública do Estado de Minas Gerais. IV. " . "Título";
        }
    }

    // Função store
    public function store(Request $request)

   
   
    {
       
        $request->validate([
            'sobrenome' => 'required',
        ], [
            'sobrenome.required' => 'Por favor, preencha o campo sobrenome.'
        ]);
        
        // Obtendo os dados do formulário
        $data = $request->all();

        // Atribuindo os dados a variáveis
        $sobrenome = $data["sobrenome"];
        $nome = $data["nome"];
        $nome2 = !empty($data["nome2"]) ? '; ' . $data["nome2"] : ''; // caso o trabalho possua mais de um autor
        $sobrenome2 = $data["sobrenome2"]; // caso o trabalho possua mais de um autor
        $nome3 = $data["nome2"]; // que irá aparecer caso tenha mais de um autor na impressão da ficha sem o ";"
        $titulo = $data["titulo"];
        $subtitulo = !empty($data["subtitulo"]) ? ': ' . $data["subtitulo"] : '';
        $local = $data["local"];
        $ano = $data["ano"];
        $pagina = $data["pagina"];
        $sobrenomeorientador = $data["sobrenomeorientador"];
        $nomeorientador = $data["nomeorientador"];
       // $cutter = $data["cutter"];
        $tipo = $data["tipo"];
        $titulacao = $data["titulacao"];
        $palavra1 = $data["palavra1"];
        $palavra2 = $data["palavra2"];
        $palavra3 = $data["palavra3"];
        $palavra4 = $data["palavra4"];
        $palavra5 = $data["palavra5"];

        // Processar o título removendo stopwords e gerar cutterTitulo
        $vetitulo = explode(" ", trim($titulo));
        $stopwords = array("o", "a", "os", "as", "um", "uns", "uma", "umas", "de", "do", "da", "dos", "das", "no", "na", "nos", "nas", "ao", "aos", "à", "às", "pelo", "pela", "pelos", "pelas", "duma", "dumas", "dum", "duns", "num", "numa", "nuns", "numas", "com", "por", "em");

        if (isset($vetitulo[1]) && in_array(strtolower($vetitulo[0]), $stopwords)) {
            $cutterTitulo = strtolower(substr($vetitulo[1], 0, 1));
        } else {
            $cutterTitulo = strtolower(substr($vetitulo[0], 0, 1));
        }

        // Chamar o método Palavras dentro do store
        $palavras = $this->Palavras($palavra1, $palavra2, $palavra3, $palavra4, $palavra5);

        // Chamando a função para gerar remissivas
        $remissivas = $this->gerarRemissiva($palavras, $sobrenomeorientador, $nomeorientador, $titulo, $nome3, $sobrenome2);

       


        // Lógica para calcular o cutter
        $resultados = [];

        for ($i = 1; $i <= 15; $i++) {
            $substring = substr($sobrenome, 0, -$i);

            $cutterData = Cutter::select('letras', 'numeros')
                ->where('letras', 'like', $substring)
                ->get();

            foreach ($cutterData as $row) {
                $resultados[$i][] = $row->numeros;
            }
        }

        $CSfinal3 = array_merge(...$resultados); 
        $maior = max($CSfinal3); 

        $primeiraLetra = substr($sobrenome, 0, 1);
        $resultadoFinal = $primeiraLetra . $maior . $cutterTitulo;

       // Chama o método que gera a NLM 
       // Obtém o NLM com base na titulação
        $NLM = $this->GeraNLM($titulacao);


        // Criando o texto para o PDF
        $texto = "$resultadoFinal
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$sobrenome, $nome. <br/> 
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$titulo$subtitulo. /$nome $sobrenome$nome2 $sobrenome2. - Belo Horizonte: ESP-MG, $ano.<br/>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$pagina f. <br/>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$tipo (Especialização) em $titulacao.<br/>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Orientador(a):&nbsp;$nomeorientador $sobrenomeorientador.<br/>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inclui bibliografia.<br/>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$remissivas.
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NLM&nbsp;$NLM";

        
        // Gerar tabela HTML para o PDF
       
      
        $tabela = '<div style="
        width: 80%;
         display: flex; 
        justify-content: center; 
        position: absolute; 
        bottom: 0; 
        left: 50%; 
        transform: translateX(-50%);
    ">
        <table border="1" style="
            width: 100%; /* A tabela ocupará todo o espaço do container */
            height: 100px; /* Altura fixa */
            table-layout: fixed; /* Mantém as colunas dentro do tamanho da tabela */
            border-collapse: collapse; 
            
            font-family: Arial, sans-serif;
        ">
            <tbody>
                <tr>
                    <td style="
                        padding: 15px; 
                        overflow: hidden; 
                        text-overflow: ellipsis;
                        white-space: normal; 
                        word-wrap: break-word;
                        
                    ">
                    <div style="
                            padding-left: 55px;  /* <-- Ajuste aqui o alinhamento */
                            text-indent: -70px;  /* <-- Garante que quebras fiquem alinhadas */
                            text-align: justify;
                        "> ' . $texto . '</td>
                </tr>
            </tbody>
        </table>









<!-- 🔻 Rodapé fixo -->
<div class="rodape" style="text-align: center;">
    Ficha gerada automaticamente com os dados fornecidos pelo(a) autor(a).
</div>';

     


 
        // Gerar PDF
        $pdf = PDF::loadHTML($tabela);
        return $pdf->stream('tabela.pdf');
    }
}



   






