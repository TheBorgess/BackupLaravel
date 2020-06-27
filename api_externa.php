<?php

//OLD VERSION

$url  = "https://api.hgbrasil.com/finance"; //API EXTERNA

$data = file_get_contents($url);  

echo "<br> <b>&nbsp;&nbsp;Cotações de moedas</b>";

$data = json_decode($data);

$i = 0;
foreach($data->results->currencies as $registro):

   $i = 1 + $i++;
   if ($i != 1 ){
    
       echo "<br><br><b>&nbsp;&nbsp;" . $registro->name . " (buy): </b><a href='#' class='btn btn-sm btn-blue btn-icon rounded-pill shadow hover-translate-y-n3 btn-primary'>" . $registro->buy . "</a>";
       echo "<br><b>&nbsp;&nbsp;" . $registro->name . " (sell) : </b><a href='#' class='btn btn-sm btn-blue btn-icon rounded-pill shadow hover-translate-y-n3 btn-light'>"  . $registro->sell . "</a>";
   }

endforeach;

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    

            
