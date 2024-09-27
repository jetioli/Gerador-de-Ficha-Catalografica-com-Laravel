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
        $cutter = Cutter::get()->all();
        dd($cutter);
        //return view("cutter.index", ["cutter" => $cutter]); //não sei. acho que tem que criar esta view. Se sim, pegar do cutter antigo. 
        $conexao = novaConexao();

$sobrenome = $_POST ["sobrenome"]; 


$a= substr($sobrenome, 0, -1);
$b= substr($sobrenome, 0, -2);
$c= substr($sobrenome, 0, -3);
$d= substr($sobrenome, 0, -4);
$e= substr($sobrenome, 0, -5);
$f= substr($sobrenome, 0, -6);
$g= substr($sobrenome, 0, -7);
$h= substr($sobrenome, 0, -8);
$i= substr($sobrenome, 0, -9);
$j= substr($sobrenome, 0, -10);
$k= substr($sobrenome, 0, -11);
$l= substr($sobrenome, 0, -12);
$m= substr($sobrenome, 0, -13);
$n= substr($sobrenome, 0, -14);
$o= substr($sobrenome, 0, -15);


// aqui era FROM tcutter
$sql = "SELECT letras, numeros FROM cutter WHERE LETRAS like '$sobrenome'";
$resultado= $conexao->query($sql);
$cutter = $resultado->fetch(); 





$sql1 = "SELECT letras, numeros FROM cutter WHERE LETRAS like '$a'";
$resultado1= $conexao->query($sql1);
$cutter1 = $resultado1->fetch();
foreach ($conexao->query($sql1) as $row1){
$cs1 = $row1 ['letras'];
$ncs1 = $row1 ['numeros'];
}




$sql2 = "SELECT letras, numeros FROM cutter WHERE LETRAS like '$b'";
$resultado2= $conexao->query($sql2);
$cutter2 = $resultado2->fetch();
foreach ($conexao->query($sql2) as $row2) {
$cs2 = $row2 ['letras'];
$ncs2 = $row2 ['numeros'];
}


$sql3 = "SELECT letras, numeros FROM cutter WHERE LETRAS like '$c'";
$resultado3= $conexao->query($sql3);
$cutter3 = $resultado3->fetch();
foreach ($conexao->query($sql3) as $row3) {
$cs3 = $row3 ['letras'];
$ncs3 = $row3['numeros'];
}
    

$sql4 = "SELECT letras, numeros FROM cutter WHERE LETRAS like '$d'";
$resultado4= $conexao->query($sql4);
$cutter4 = $resultado4->fetch();
foreach ($conexao->query($sql4) as $row4){
$cs4 = $row4 ['letras'];
$ncs4 = $row4 ['numeros'];
}
                




$sql5 = "SELECT letras, numeros FROM cutter WHERE LETRAS like '$e'";
$resultado5= $conexao->query($sql5);
$cutter5 = $resultado5->fetch();
foreach ($conexao->query($sql5) as $row5) {
$cs5 = $row5 ['letras'];
$ncs5 = $row5 ['numeros'];
}
                    



       

$sql6 = "SELECT letras, numeros FROM cutter WHERE LETRAS like '$f'";
$resultado6= $conexao->query($sql6);
$cutter6 = $resultado6->fetch();
foreach ($conexao->query($sql6) as $row6){
$cs6 = $row6 ['letras'];
$ncs6= $row6 ['numeros'];
}
                        

                        
$sql7 = "SELECT letras, numeros FROM cutter WHERE LETRAS like '$g'";
$resultado7= $conexao->query($sql7);
$cutter7 = $resultado7->fetch();
foreach ($conexao->query($sql7) as $row7){
$cs7 = $row7 ['letras'];
$ncs7 = $row7 ['numeros'];

}
                        
$sql8 = "SELECT letras, numeros FROM cutter WHERE LETRAS like '$h'";
$resultado8= $conexao->query($sql8);
$cutter8 = $resultado8->fetch();
foreach ($conexao->query($sql8) as $row8){
$cs8 = $row8 ['letras'];
$ncs8 = $row8 ['numeros'];

}


$sql9 = "SELECT letras, numeros FROM cutter WHERE LETRAS like '$i'";
$resultado9= $conexao->query($sql9);
$cutter9 = $resultado9->fetch();
foreach ($conexao->query($sql9) as $row9){
$cs9 = $row9 ['letras'];
$ncs9 = $row9 ['numeros'];

}


   $sql10 = "SELECT letras, numeros FROM cutter WHERE LETRAS like '$j'";
$resultado10= $conexao->query($sql10);
$cutter10 = $resultado10->fetch();
foreach ($conexao->query($sql10) as $row10){
$cs10 = $row10 ['letras'];
$ncs10 = $row10 ['numeros'];
}



$sql10 = "SELECT letras, numeros FROM cutter WHERE LETRAS like '$j'";
$resultado10= $conexao->query($sql10);
$cutter10 = $resultado10->fetch();
foreach ($conexao->query($sql10) as $row10){
$cs10 = $row10 ['letras'];
$ncs10 = $row10 ['numeros'];
}




$sql11 = "SELECT letras, numeros FROM cutter WHERE LETRAS like '$k'";
$resultado11= $conexao->query($sql11);
$cutter11 = $resultado11->fetch();
foreach ($conexao->query($sql11) as $row11){
$cs11 = $row11 ['letras'];
$ncs11 = $row11 ['numeros'];
}



$sql12 = "SELECT letras, numeros FROM cutter WHERE LETRAS like '$l'";
$resultado12= $conexao->query($sql12);
$cutter12 = $resultado12->fetch();
foreach ($conexao->query($sql12) as $row12){
$cs12 = $row12 ['letras'];
$ncs12 = $row12 ['numeros'];
}


$sql13 = "SELECT letras, numeros FROM cutter WHERE LETRAS like '$m'";
$resultado13= $conexao->query($sql13);
$cutter13 = $resultado13->fetch();
foreach ($conexao->query($sql13) as $row13){
$cs13 = $row13 ['letras'];
$ncs13 = $row13 ['numeros'];
}


$sql14 = "SELECT letras, numeros FROM cutter WHERE LETRAS like '$n'";
$resultado14= $conexao->query($sql14);
$cutter14 = $resultado14->fetch();
foreach ($conexao->query($sql14) as $row14){
$cs14 = $row14 ['letras'];
$ncs14 = $row14 ['numeros'];
}



$sql15 = "SELECT letras, numeros FROM cutter WHERE LETRAS like '$o'";
$resultado15= $conexao->query($sql15);
$cutter15 = $resultado15->fetch();
foreach ($conexao->query($sql15) as $row15){
$cs15 = $row15 ['letras'];
$ncs15 = $row15 ['numeros'];
}









   $CSfinal3 = array (
    1 => "$ncs1",
    2=> "$ncs2",
    3=> "$ncs3",
    4=> "$ncs4",
    5=> "$ncs5",
    6=> "$ncs6",
    7=> "$ncs7",
    8=> "$ncs8", 
    9=> "$ncs9", 
    10=> "$ncs10", 
    11=> "$ncs11", 
    12=> "$ncs12", 
    13=> "$ncs13", 
    14=> "$ncs14", 
    15=> "$ncs15" 
       
   );
   
  // print_r ($CSfinal3);


  $maior = max($CSfinal3);



   print_r($maior);






    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("formulario.formulario");
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
                $dois = ' 2. '. $palavra2.'.';
                $tres = ' 3. ' . $palavra3.'.';
                $quatro = ' 4. '. $palavra4.'.';
                $cinco = ' 5. '. $palavra5.'.';
                return $um .$dois .$tres .$quatro .$cinco;
          
            }
        
        elseif (($palavra1 != NULL) and ($palavra2 != NULL) and ($palavra3 != NULL) and ($palavra4 != NULL)) {
            $um = ' 1. '. $palavra1;
            $dois = ' 2. '. $palavra2;
            $tres = ' 3. ' . $palavra3;
            $quatro = ' 4. '. $palavra4;
            return $um. $dois. $tres. $quatro;
          }
        
        elseif (($palavra1 != NULL) and ($palavra2 != NULL) and ($palavra3 != NULL)) {
            $um = ' 1. '. $palavra1;
            $dois = ' 2. '. $palavra2;
            $tres = ' 3. ' . $palavra3;
            return $um. $dois. $tres;
          }
        
        elseif (($palavra1 != NULL) and ($palavra2 != NULL)) {
            $um = ' 1. '. $palavra1;
            $dois = ' 2. '. $palavra2;
            
            return $um. $dois;
        
        }
        
        
        elseif ($palavra1 != NULL) {
        
           $um = ' 1. '. $palavra1;
           return $um;
          }
        
          
        
         
        
        }

      
       $palavras = Palavras($palavra1,$palavra2,$palavra3,$palavra4,$palavra5);
      
      
       // Foi criada a variável $texto para receber os dados.

        $texto = "$sobrenome, $nome. <br/> 
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$titulo. /$nome $sobrenome. - Belo Horizonte: ESP-MG, $ano.<br/>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$pagina f. <br/>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Orientador(a):$nomeorientador $sobrenomeorientador.<br/>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$tipo (Especialização) em $titulacao.<br/>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inclui bibliografia.<br/>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $palavras. I. $sobrenomeorientador, $nomeorientador. II. Escola de Saúde Pública do Estado de Minas Gerais. III. Título";




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


