@extends('share.layout')

@section('content')
 
<div align="left">

<?php

      $url     = trim($_GET['urlapi']); //API EXTERNA
      $date    = str_replace('-','/',$_GET['datepicker']); //SELECTED DATE
      $tipoAPI = $_GET['tipoAPI'];

       //$url  = "https://api.hgbrasil.com/finance"; //API EXTERNA
      //$url = "https://api.hgbrasil.com/weather";

      ///////////TEST HOW TO INSERT DATE IN MYSQL (DATABASE)//////////////////////

         /* $data2 = $date;
          echo date('d-m-Y', strtotime($data2)) . "<br>";

          $data2 = date("Y-m-d",strtotime(str_replace('/','-',$data2)));  
          echo date('Y-m-d', strtotime($data2)); */

      ///////////////////////////////////////////////////////////////////////////
      
    if  ($tipoAPI == 1){

      $data = file_get_contents($url);  

      echo "<br> <b>&nbsp;&nbsp;Cotações de moedas -> </b>" . $date . "";

      $data = json_decode($data);

      $i = 0;
      foreach($data->results->currencies as $registro):

         $i = 1 + $i++;
         if ($i != 1 ){
          
             echo "<br><br><b>&nbsp;&nbsp;" . $registro->name . " (buy): </b><a href='#' class='btn btn-sm btn-blue btn-icon rounded-pill shadow hover-translate-y-n3 btn-primary'> R$ " . number_format($registro->buy, 2, ',', '.') . "</a>";
             echo "<br><b>&nbsp;&nbsp;" . $registro->name . " (sell) : </b><a href='#' class='btn btn-sm btn-blue btn-icon rounded-pill shadow hover-translate-y-n3 btn-light'> R$ "  . number_format($registro->sell, 2, ',', '.') . "</a>";
         }

      endforeach;
    }

    elseif($tipoAPI == 2){
       
       $data = file_get_contents($url);  

       echo "<br> <b>&nbsp;&nbsp;Previsão do tempo -> </b>" . $date . "";

       $data = json_decode($data);
      
       echo "<br><br><b>&nbsp;&nbsp;Cidade: </b><a href='#' class='btn btn-sm btn-blue btn-icon rounded-pill shadow hover-translate-y-n3 btn-primary'>" .  $data->results->city_name . "</a>";
       echo "<br><b>&nbsp;</b><a href='#' class='btn btn-sm btn-blue btn-icon rounded-pill shadow hover-translate-y-n3 btn-light'>" .  $data->results->temp . "° C , " . $data->results->description . "</a>";
?>
      <br><br><br>

      <div class="card uper" style="width: 27rem;" align="center">
          <iframe src="https://player.vimeo.com/video/53591520" width="535" height="300" frameborder="0" allow="autoplay; fullscreen"    allowfullscreen>
          </iframe>
      </div>

<?php
    }
?>

</div>

<br><br>

@endsection