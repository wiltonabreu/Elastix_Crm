<?php
$host= "PABX";
$ramal = $_POST['ramal-consulta'];
$ramalColaborador = NULL;
$idColaborador = NULL;
$tempoMinimo = 0;


$ramalColaborador = verificaRamal($ramal);
$idColaborador = verificaIdUsuarioComercial($ramal);

 
$dataConsulta = $_POST['data-consulta'];
$tempoMinimo = $_POST['tempo-consulta'];

$sql = new Sql($host);

$lista[] = $sql->select("SELECT calldate, duration  FROM cdr WHERE calldate BETWEEN '$dataConsulta' ' 00:00:00' AND '$dataConsulta' ' 23:59:59' AND src= $ramalColaborador AND duration > $tempoMinimo;");

$array8 = array();
$array9 = array();
$array10 = array();
$array11 = array();
$array12 = array();
$array13 = array();
$array14 = array();
$array15 = array();
$array16 = array();
$array17 = array();
$array18 = array();
$array19 = array();
    
$oito=0;
$nove=0;
$dez=0;
$onze=0;
$doze=0;
$treze=0;
$quatorze=0;
$quinze=0;
$dezessei=0;
$dezessete=0;
$dezoito=0;
$dezenove=0;

foreach ($lista as $key) {
    foreach ($key as $value) {

        $date = explode(" ",$value['calldate']);
        $data = explode(":",$date[1]); 
          
            
       if($data[0] == "08"){
                $array8[$oito] = $date[1];
                $oito++;
                
       }

       if($data[0] == "09"){
                $array9[$nove] = $date[1];
                $nove++;
       }

       if($data[0] == "10"){
                $array10[$dez] = $date[1];
                $dez++;
       }

       if($data[0] == "11"){
                $array11[$onze] = $date[1];
                $onze++;
       }
       if($data[0] == "12"){
                $array12[$doze] = $date[1];
                $doze++;
       }
       if($data[0] == "13"){
                $array13[$treze] = $date[1];
                $treze++;
       }
       if($data[0] == "14"){
                $array14[$quatorze] = $date[1];
                $quatorze++;
       }
       if($data[0] == "15"){
                $array15[$quinze] = $date[1];
                $quinze++;
       }
       if($data[0] == "16"){
                $array16[$dezessete] = $date[1];
                $dezessete++;
       }
       if($data[0] == "17"){
                $array17[$dezessete] = $date[1];
                $dezessete++;
       }
       if($data[0] == "18"){
                $array18[$dezoito] = $date[1];
                $dezoito++;
       }
       if($data[0] == "19"){
                $array19[$dezenove] = $date[1];
                $dezenove++;
       }

    }
  
}




$novo = array();
$i=8;
$novo[$i]['numero_de_ligacoes'] = sizeof($array8);
$novo[$i]['calldate'] = $i.':00:00';
$i++;
$novo[$i]['numero_de_ligacoes'] = sizeof($array9);
$novo[$i]['calldate'] = $i.':00:00';
$i++;
$novo[$i]['numero_de_ligacoes'] = sizeof($array10);
$novo[$i]['calldate'] = $i.':00:00';
$i++;
$novo[$i]['numero_de_ligacoes'] = sizeof($array11);
$novo[$i]['calldate'] = $i.':00:00';
$i++;
$novo[$i]['numero_de_ligacoes'] = sizeof($array12);
$novo[$i]['calldate'] = $i.':00:00';
$i++;
$novo[$i]['numero_de_ligacoes'] = sizeof($array13);
$novo[$i]['calldate'] = $i.':00:00';
$i++;
$novo[$i]['numero_de_ligacoes']= sizeof($array14);
$novo[$i]['calldate'] = $i.':00:00';
$i++;
$novo[$i]['numero_de_ligacoes']= sizeof($array15);
$novo[$i]['calldate'] = $i.':00:00';
$i++;
$novo[$i]['numero_de_ligacoes']= sizeof($array16);
$novo[$i]['calldate'] = $i.':00:00';
$i++;
$novo[$i]['numero_de_ligacoes']= sizeof($array17);
$novo[$i]['calldate'] = $i.':00:00';
$i++;
$novo[$i]['numero_de_ligacoes']= sizeof($array18);
$novo[$i]['calldate'] = $i.':00:00';
$i++;
$novo[$i]['numero_de_ligacoes']= sizeof($array19);
$novo[$i]['calldate'] = $i.':00:00';





//print_r($novo);

//exit;
//Refazer soma

$i=0;
$n_l_Pabx = 0;
foreach($lista as $conteudo)
{
    foreach($conteudo as $value)
    {
        $novoArray[$i] = $value;
        $n_l_Pabx = $n_l_Pabx + $novo[$i]['numero_de_ligacoes'];
        $i++;
    }   
}


//=========Inicio de Ligações Realizadas=========

$hostCRM= "CRM";

$sql = new Sql($hostCRM);


$listaCRM[] = $sql->select("SELECT date_entered  AS data FROM calls WHERE date_entered BETWEEN '$dataConsulta' ' 00:00:00' AND '$dataConsulta' ' 23:59:59' AND assigned_user_id= '$idColaborador' AND status='Held'");

$array8 = array();
$array9 = array();
$array10 = array();
$array11 = array();
$array12 = array();
$array13 = array();
$array14 = array();
$array15 = array();
$array16 = array();
$array17 = array();
$array18 = array();
$array19 = array();
    
$oito=0;
$nove=0;
$dez=0;
$onze=0;
$doze=0;
$treze=0;
$quatorze=0;
$quinze=0;
$dezessei=0;
$dezessete=0;
$dezoito=0;
$dezenove=0;

foreach ($listaCRM as $key) {

    foreach ($key as $value) {

        $a = explode(" ",$value['data']);

        $b = explode(":",$a[1]);

        $c = $b[0]-2;


        $datacrm = $c;

        
       

       if($datacrm == "8"){
                $array8[$oito] = $a[1];
                $oito++;
                
       }

       if($datacrm == "9"){
                $array9[$nove] = $a[1];
                $nove++;
       }

       if($datacrm == "10"){
                $array10[$dez] = $a[1];
                $dez++;
       }

       if($datacrm == "11"){
                $array11[$onze] = $a[1];
                $onze++;
       }
       if($datacrm == "12"){
                $array12[$doze] = $a[1];
                $doze++;
       }
       if($datacrm == "13"){
                $array13[$treze] = $a[1];
                $treze++;
       }
       if($datacrm == "14"){
                $array14[$quatorze] = $a[1];
                $quatorze++;
       }
       if($datacrm == "15"){
                $array15[$quinze] = $a[1];
                $quinze++;
       }
       if($datacrm == "16"){
                $array16[$dezessete] = $a[1];
                $dezessete++;
       }
       if($datacrm == "17"){
                $array17[$dezessete] = $a[1];
                $dezessete++;
       }
       if($datacrm == "18"){
                $array18[$dezoito] = $a[1];
                $dezoito++;
       }
       if($datacrm == "19"){
                $array19[$dezenove] = $a[1];
                $dezenove++;
       }
    }
}

$novoArrayCRM = array();
$i=8;
$novoArrayCRM[$i]['numero_de_ligacoes'] = sizeof($array8);
$novoArrayCRM[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM[$i]['numero_de_ligacoes'] = sizeof($array9);
$novoArrayCRM[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM[$i]['numero_de_ligacoes'] = sizeof($array10);
$novoArrayCRM[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM[$i]['numero_de_ligacoes'] = sizeof($array11);
$novoArrayCRM[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM[$i]['numero_de_ligacoes'] = sizeof($array12);
$novoArrayCRM[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM[$i]['numero_de_ligacoes'] = sizeof($array13);
$novoArrayCRM[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM[$i]['numero_de_ligacoes']= sizeof($array14);
$novoArrayCRM[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM[$i]['numero_de_ligacoes']= sizeof($array15);
$novoArrayCRM[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM[$i]['numero_de_ligacoes']= sizeof($array16);
$novoArrayCRM[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM[$i]['numero_de_ligacoes']= sizeof($array17);
$novoArrayCRM[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM[$i]['numero_de_ligacoes']= sizeof($array18);
$novoArrayCRM[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM[$i]['numero_de_ligacoes']= sizeof($array19);
$novoArrayCRM[$i]['calldate'] = $i.':00:00';




$n_l_CRM_Realizadas = 0;

foreach($novoArrayCRM as $conteudo){

    $n_l_CRM_Realizadas = $n_l_CRM_Realizadas + $conteudo['numero_de_ligacoes'];   
       
}


 //echo "Aquiii " . $n_l_CRM_Realizadas; exit;

//=========Inicio de Ligações N Realizadas=========

$hostCRM= "CRM";

$sql = new Sql($hostCRM);


    
    $listaCRM_N_R[] = $sql->select("SELECT date_entered AS data FROM calls WHERE date_entered BETWEEN '$dataConsulta' ' 00:00:00' AND '$dataConsulta' ' 23:59:59' AND assigned_user_id= '$idColaborador' AND status='Not Held'");    
    
   
$array8 = array();
$array9 = array();
$array10 = array();
$array11 = array();
$array12 = array();
$array13 = array();
$array14 = array();
$array15 = array();
$array16 = array();
$array17 = array();
$array18 = array();
$array19 = array();
    
$oito=0;
$nove=0;
$dez=0;
$onze=0;
$doze=0;
$treze=0;
$quatorze=0;
$quinze=0;
$dezessei=0;
$dezessete=0;
$dezoito=0;
$dezenove=0;

$a = "";
$b = "";
$c = "";
$datacrm = "";


foreach ($listaCRM_N_R as $key) {
    foreach ($key as $value) {
        $a = explode(" ",$value['data']);

        $b = explode(":",$a[1]);

        $c = $b[0]-2;

        $datacrm = $c;

        
        
       if($datacrm == "8"){
                $array8[$oito] = $a[1];
                $oito++;
                
       }

       if($datacrm == "9"){
                $array9[$nove] = $a[1];
                $nove++;
       }

       if($datacrm == "10"){
                $array10[$dez] = $a[1];
                $dez++;
       }

       if($datacrm == "11"){
                $array11[$onze] = $a[1];
                $onze++;
       }
       if($datacrm == "12"){
                $array12[$doze] = $a[1];
                $doze++;
       }
       if($datacrm == "13"){
                $array13[$treze] = $a[1];
                $treze++;
       }
       if($datacrm == "14"){
                $array14[$quatorze] = $a[1];
                $quatorze++;
       }
       if($datacrm == "15"){
                $array15[$quinze] = $a[1];
                $quinze++;
       }
       if($datacrm == "16"){
                $array16[$dezessete] = $a[1];
                $dezessete++;
       }
       if($datacrm == "17"){
                $array17[$dezessete] = $a[1];
                $dezessete++;
       }
       if($datacrm == "18"){
                $array18[$dezoito] = $a[1];
                $dezoito++;
       }
       if($datacrm == "19"){
                $array19[$dezenove] = $a[1];
                $dezenove++;
       }
    }
}

$novoArrayCRM_N_R = array();
$i=8;
$novoArrayCRM_N_R[$i]['numero_de_ligacoes'] = sizeof($array8);
$novoArrayCRM_N_R[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_N_R[$i]['numero_de_ligacoes'] = sizeof($array9);
$novoArrayCRM_N_R[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_N_R[$i]['numero_de_ligacoes'] = sizeof($array10);
$novoArrayCRM_N_R[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_N_R[$i]['numero_de_ligacoes'] = sizeof($array11);
$novoArrayCRM_N_R[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_N_R[$i]['numero_de_ligacoes'] = sizeof($array12);
$novoArrayCRM_N_R[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_N_R[$i]['numero_de_ligacoes'] = sizeof($array13);
$novoArrayCRM_N_R[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_N_R[$i]['numero_de_ligacoes']= sizeof($array14);
$novoArrayCRM_N_R[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_N_R[$i]['numero_de_ligacoes']= sizeof($array15);
$novoArrayCRM_N_R[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_N_R[$i]['numero_de_ligacoes']= sizeof($array16);
$novoArrayCRM_N_R[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_N_R[$i]['numero_de_ligacoes']= sizeof($array17);
$novoArrayCRM_N_R[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_N_R[$i]['numero_de_ligacoes']= sizeof($array18);
$novoArrayCRM_N_R[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_N_R[$i]['numero_de_ligacoes']= sizeof($array19);
$novoArrayCRM_N_R[$i]['calldate'] = $i.':00:00';


$n_l_CRM_N_Realizadas = 0;

foreach($novoArrayCRM_N_R as $conteudo){

    $n_l_CRM_N_Realizadas = $n_l_CRM_N_Realizadas + $conteudo['numero_de_ligacoes'];    
       
}

//=========Inicio de Ligações Reagendadas=========

$hostCRM= "CRM";

$sql = new Sql($hostCRM);


    
    $listaCRM_Reagendadas[] = $sql->select("SELECT date_entered  AS data FROM calls_reschedule WHERE date_entered BETWEEN '$dataConsulta' ' 00:00:00' AND '$dataConsulta' ' 23:59:59' AND created_by = '$idColaborador'");    

$array8 = array();
$array9 = array();
$array10 = array();
$array11 = array();
$array12 = array();
$array13 = array();
$array14 = array();
$array15 = array();
$array16 = array();
$array17 = array();
$array18 = array();
$array19 = array();
    
$oito=0;
$nove=0;
$dez=0;
$onze=0;
$doze=0;
$treze=0;
$quatorze=0;
$quinze=0;
$dezessei=0;
$dezessete=0;
$dezoito=0;
$dezenove=0;

foreach ($listaCRM_Reagendadas as $key) {
    foreach ($key as $value) {


        $a = explode(" ",$value['data']);

        $b = explode(":",$a[1]);

        $c = $b[0]-2;

        $datacrm = $c;

        
        
       if($datacrm == "8"){
                $array8[$oito] = $a[1];
                $oito++;
                
       }

       if($datacrm == "9"){
                $array9[$nove] = $a[1];
                $nove++;
       }

       if($datacrm == "10"){
                $array10[$dez] = $a[1];
                $dez++;
       }

       if($datacrm == "11"){
                $array11[$onze] = $a[1];
                $onze++;
       }
       if($datacrm == "12"){
                $array12[$doze] = $a[1];
                $doze++;
       }
       if($datacrm == "13"){
                $array13[$treze] = $a[1];
                $treze++;
       }
       if($datacrm == "14"){
                $array14[$quatorze] = $a[1];
                $quatorze++;
       }
       if($datacrm == "15"){
                $array15[$quinze] = $a[1];
                $quinze++;
       }
       if($datacrm == "16"){
                $array16[$dezessete] = $a[1];
                $dezessete++;
       }
       if($datacrm == "17"){
                $array17[$dezessete] = $a[1];
                $dezessete++;
       }
       if($datacrm == "18"){
                $array18[$dezoito] = $a[1];
                $dezoito++;
       }
       if($datacrm == "19"){
                $array19[$dezenove] = $a[1];
                $dezenove++;
       }
    }
}

$novoArrayCRM_Reagendadas = array();
$i=8;
$novoArrayCRM_Reagendadas[$i]['numero_de_ligacoes'] = sizeof($array8);
$novoArrayCRM_Reagendadas[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_Reagendadas[$i]['numero_de_ligacoes'] = sizeof($array9);
$novoArrayCRM_Reagendadas[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_Reagendadas[$i]['numero_de_ligacoes'] = sizeof($array10);
$novoArrayCRM_Reagendadas[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_Reagendadas[$i]['numero_de_ligacoes'] = sizeof($array11);
$novoArrayCRM_Reagendadas[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_Reagendadas[$i]['numero_de_ligacoes'] = sizeof($array12);
$novoArrayCRM_Reagendadas[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_Reagendadas[$i]['numero_de_ligacoes'] = sizeof($array13);
$novoArrayCRM_Reagendadas[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_Reagendadas[$i]['numero_de_ligacoes']= sizeof($array14);
$novoArrayCRM_Reagendadas[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_Reagendadas[$i]['numero_de_ligacoes']= sizeof($array15);
$novoArrayCRM_Reagendadas[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_Reagendadas[$i]['numero_de_ligacoes']= sizeof($array16);
$novoArrayCRM_Reagendadas[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_Reagendadas[$i]['numero_de_ligacoes']= sizeof($array17);
$novoArrayCRM_Reagendadas[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_Reagendadas[$i]['numero_de_ligacoes']= sizeof($array18);
$novoArrayCRM_Reagendadas[$i]['calldate'] = $i.':00:00';
$i++;
$novoArrayCRM_Reagendadas[$i]['numero_de_ligacoes']= sizeof($array19);
$novoArrayCRM_Reagendadas[$i]['calldate'] = $i.':00:00'; 



$n_l_CRM_Reagendadas = 0;

foreach($novoArrayCRM_Reagendadas as $conteudo){

    $n_l_CRM_Reagendadas = $n_l_CRM_Reagendadas + $conteudo['numero_de_ligacoes'];
    $i++;
       
}

?>