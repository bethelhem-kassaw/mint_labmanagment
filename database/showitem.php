<?php
    include('db.php');

    $stmt=$conn->prepare('SELECT * FROM item
                            LEFT JOIN item_stock ON item.id = item_stock.id
                            ');
    $stmt->execute();
   $stmt->setFetchMode(PDO::FETCH_ASSOC);


    return $stmt->fetchALL();
    //  var_dump($result);die;
?>