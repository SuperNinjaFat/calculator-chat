<?php
require_once "config.php";
try {
    $db = new PDO(DB_DATASOURCE, DB_USERNAME, DB_PASSWORD);
    header("Content-Type: application/json; charset=UTF-8");
    $obj = json_decode($_POST["params"], false);
    $stmt = $db->prepare("SELECT * FROM calculations ORDER BY calculations.timestamp DESC LIMIT ?");
//    $stmt->bindValue(1, $obj->sort, PDO::PARAM_STR);
    $stmt->bindValue(1, $obj->limit, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll();
    echo json_encode($result);
} catch (PDOException $e) {
    print "Sorry, Nothing: " . $e->getMessage();// test
}
//maximum result: 2147483647
//minimum result: -2147483648