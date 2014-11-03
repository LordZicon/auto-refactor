<?php

include_once "../includes/connect.php";

$sql = "SELECT *
          FROM admins
                                    WHERE email = ?
                                    LIMIT 1";
                                    
$stmt = $pdo->prepare($sql);
$stmt->execute(array($_POST['email']));

$result = $stmt->fetch();

echo $result;