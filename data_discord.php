<?php
error_reporting(0);
include 'class_discord.php';

if (isset($_GET["id"])){
    if ($_GET["id"] != ""){

      header('Content-type: application/json');

      $Discord = new Discord($_GET["id"]);
      $Discord->fetch();

      $data->status = $Discord->getServerStatus();
      $data->id = $_GET["id"];
      $data->online = $Discord->getMemberCount();

      $json_object = json_encode($data);
      echo $json_object;
    }
    else echo "Sorgulamak için discord sunucu kimliğini girmelisiniz.";
  }
  else echo "Geçersiz parametre kullandınız.";
  ?>