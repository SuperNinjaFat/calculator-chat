<?php
require_once "config.php";
try {
    $db = new PDO(DB_DATASOURCE, DB_USERNAME, DB_PASSWORD);
//    header("Content-Type: application/json; charset=UTF-8");
    $obj = json_decode($_POST["params"], false);
    $stmt = $db->prepare("INSERT INTO calculations (num_first, sign, num_second, result) VALUES (?, ?, ?, ?)");
    $stmt->bindValue(1, $obj->num_first);
    $stmt->bindValue(2, $obj->sign);
    $stmt->bindValue(3, $obj->num_second);
    $stmt->bindValue(4, $obj->result);
    $stmt->execute();
} catch (PDOException $e) {
    print "Sorry, Nothing: " . $e->getMessage();// test
    print_r($e->getMessage());
}