<?php


// require_once __DIR__."/../Models/Model.php";

if($_SERVER['REQUEST_METHOD'] == "GET"){

    $move = isset($_GET['move'])? $_GET['move']: NULL;

    switch ($move) {
        case 'register':
            moveToindex($move);
            break;
        case 'Update':
            moveToDelete($move);
            break;
        case 'delete':
            moveToDelete($move);
            break;
        case 'activate':
            moveToDelete($move);
            break;
        default:
            return "page not found";
            break;
    }

    }


function moveToPage($move){
    return header("location: $move.php");
}

function moveToDelete($move){
    return header("location: $move.php?id=".$_GET['id']);
}

function moveToindex($move){
    return header("location: ../../index.php");
}


?>