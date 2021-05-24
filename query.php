<?php
function queryAll($query, $all)
{
    global $pdo;
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    if ($all) {
        $row = $stmt->fetchAll();
    } else {
        $row = $stmt->fetch();
    }
    return $row;

}
