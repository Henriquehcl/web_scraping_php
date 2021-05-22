<?php

require_once "simple_html_dom.php";

  $site = 'https://www.sold.com.br/';
  $html = file_get_html($site);
  $captura = array();

  libxml_use_internal_errors(true);

  if(!empty($html)) {
   
   $i = 0;

  foreach ($html->find(".bloco-leilao") as $element) {
    

      foreach($element -> find(".data")as $data){
        $captura[$i]["Data"] = trim($data->plaintext); 
        
        }
      foreach($element -> find(".leilao-tipo-bem")as $tipoBem){
        $captura[$i]["Bem"] = trim($tipoBem->plaintext);
       
        }
      foreach($element -> find(".tipo")as $tipo){      
        $captura[$i]["Tipo"] = trim($tipo->plaintext);
        
        }
      foreach($element -> find(".leilao-descricao")as $descricao){      
        $captura[$i]["Descricao"] = trim($descricao->plaintext);
        
        }
      foreach($element -> find('a')as $link){      
        $captura[$i]["Link"] = trim($link->href);
            
        }

        $i++;
    } 
  
}

//opção para exibir pleo var_dump ou print_r
//var_dump($captura);

print_r($captura); exit;

?>