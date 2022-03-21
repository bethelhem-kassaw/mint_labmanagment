<?php
    include('db.php');

    $stmt=$conn->prepare("SELECT * FROM user");
    $stmt->execute();
   $stmt->setFetchMode(PDO::FETCH_ASSOC);


    return $stmt->fetchALL();
    // var_dump($result);die;
?>