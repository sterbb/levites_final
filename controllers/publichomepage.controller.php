<?php
require_once "../models/publichomepage.model.php";

$query = $_POST["query"];
$model = new ChurchModel();
$results = $model->searchChurches($query);

echo json_encode($results);
?>
