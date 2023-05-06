<?php
  function DBconnect($hostserver, $dbname, $username, $password) {
    try {
      $pdo = new PDO("mysql:host=$hostserver;dbname=$dbname", $username, $password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      die();
    }
  }

  function queryHandling($pdoConn, $query, $args) {
    if ($args) {
      $stmt = $pdoConn->prepare($query);
      $stmt->execute($args); 
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
      $stmt = $pdoConn->query($query);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
  }

  function terminatePDO($connObj) {
    $connObj = NULL;
    return $connObj;
  }
?>