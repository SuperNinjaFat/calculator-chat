<?php
require_once "config.php";
try {
    $db = new PDO(DB_DATASOURCE, DB_USERNAME, DB_PASSWORD);
    header("Content-Type: application/json; charset=UTF-8");
    $obj = json_decode($_POST["params"], false);
    $stmt = $db->prepare("SELECT * FROM calculations LIMIT ? ?");
    $stmt->bind_param(1, $obj->limit);
    $stmt->bind_param(2, $obj->sort);
    $stmt->execute();
    $result = $stmt->fetchAll(MYSQLI_ASSOC);
    echo json_encode($result);
} catch (PDOException $e) {
    print_r("Sorry, Nothing");// test
}
//maximum result: 2147483647
//minimum result: -2147483648