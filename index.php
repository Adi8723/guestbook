<?php

require_once __DIR__ . '/inc/db-connect.php';
require_once __DIR__ . '/inc/functions.php';

$perPage = 3;
$currentPage = 1;
/*
if(isset($_GET['page'])) {
    $currentPage = @(int) $_GET['page'];
    if($currentPage<=0) {
        $currentPage = 1;
    }
    
}
*/

// $currentPage = max(1, @(int) ($_GET['page'] ?? 1));

$currentPage = @(int) ($_GET['page'] ?? 1);
if($currentPage<=0) {
    $currentPage = 1;
}


$stmtCount = $pdo->prepare('SELECT COUNT(*) AS  `count` FROM `entries`');
$stmtCount->execute();

$countTotal = $stmtCount->fetch(PDO::FETCH_ASSOC)['count'];


// Vorbereitete Anweisung erstellen und absteigend sortieren dass die neue immer oben kommen, limitieren mit wieviele einträge
$stmt = $pdo->prepare('SELECT * FROM `entries` ORDER BY `id` DESC LIMIT :offset, :perPage');
$stmt->bindValue('perPage', $perPage, PDO::PARAM_INT);
// seite Offset 0
// seite Offset perPage
// seite Offset perPage * 2

$stmt->bindValue('offset', ($currentPage -1)* $perPage, PDO::PARAM_INT);

// Parameter binden
$stmt->execute();
// Ergebnis abrufen
$entries = $stmt->fetchAll(PDO::FETCH_ASSOC);







require __DIR__ . '/views/index.view.php';
