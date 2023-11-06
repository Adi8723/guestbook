<?php
require_once __DIR__ . '/inc/db-connect.php';
require_once __DIR__ . '/inc/functions.php';

if (!empty($_POST)) {

    /*
    $title = '';
    if (isset($_POST['title'])) {
        $title = @(string) $_POST['title'];
    }
    $name = '';
    if (isset($_POST['name'])) {
        $name = @(string) $_POST['name'];
    }

    $content = '';
    if (isset($_POST['content'])) {
        $content = @(string) $_POST['content'];
    }
*/

$title   = @(string) ($_POST['title'] ?? '');
$name    = @(string) ($_POST['name'] ?? '');
$content = @(string) ($_POST['content'] ?? '');

    if (!empty($title) && !empty($content) && !empty($name)) {
        $stmt = $pdo->prepare('INSERT INTO entries (`name`, `title`, `content`) VALUES (:name, :title, :content)');
        $stmt->bindParam('name', $name);
        $stmt->bindParam('title', $title);
        $stmt->bindParam('content', $content);
        $stmt->execute();

        header('Location: index.php?success=1');
        die();
        // echo '<a href="index.php">Zürück zur seite </a>';
        // die();
    }
}

$errorMessage = 'es ist ein fehler aufgetreten';

require __DIR__ . '/index.php';

    // if (isset($_POST['name']) && isset($_POST['title']) && isset($_POST['content'])) {
    //     $name = $_POST['name'];
    //     $title = $_POST['title'];
    //     $content = $_POST['content'];

    //     $stmt = $pdo->prepare('INSERT INTO entries (`name`, `title`, `content`) VALUES (:name, :title, :content)');
    //     $stmt->bindParam('name', $name);
    //     $stmt->bindParam('title', $title);
    //     $stmt->bindParam('content', $content);
    //     $stmt->execute();

    //     echo '<a href="index.php">Zürück zur seite </a>';
    // }
