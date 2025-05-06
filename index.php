<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
$items = [
    ["id" => 1, "name" => "Sami Ali", "email" => "sami22@gmail.com", "age" => 20, "image"=> "https://i.pravatar.cc/151"],
    ["id" => 2, "name" => "Mazen","email" => "mazento202@gmail.com", "age" => 15, "image"=> "https://i.pravatar.cc/152"],
    ["id" => 3, "name" => "Ahmad","email" => "ahmadto20@gmail.com", "age" => 35, "image"=> "https://i.pravatar.cc/153"],
    ["id" => 4, "name" => "Mohammd","email" => "mohammadto20@gmail.com", "age" => 21, "image"=> "https://i.pravatar.cc/154"],
    ["id" => 5, "name" => "Alaa","email" => "alaato20@gmail.com","age" => 22, "image"=> "https://i.pravatar.cc/155"],
    ["id" => 6, "name" => "Najib","email" => "najibto20@gmail.com", "age" => 23, "image"=> "https://i.pravatar.cc/156"],
    ];
    echo json_encode($items);


?>

