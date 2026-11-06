<?php
require_once __DIR__."/../Models/Model.php";
$model = new Model();

$id = isset($_GET['id'])? $_GET['id']:NULL;
$delete = $model->activate($id);

sleep(1);
header("location:listItems.php");

?>