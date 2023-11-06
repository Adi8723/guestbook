<?php

require __DIR__ ."/inc/functions.php";

//$content = "Hallo Welt\n Hallo Mars";

$content = "Ich habe nur ein absatz";
// echo nl2br(e($content));
// $p = explode("\n", $content);

// echo '<p>' . implode('<p></p>', $p) . '</p>';

// Den Inhalt in Absätze aufteilen und in ein Array speichern
$paragraphs = explode("\n", $content);

// Ein leeres Array erstellen, um die gefilterten Absätze zu speichern
$filteredParagraph = [];

foreach ($paragraphs as $p) {// Für jeden Absatz im Array
    $p = trim($p);// leere zeichen wird entfernt
    if(strlen($p) > 0) {// Überprüfen, ob der Absatz eine Länge größer als 0 hat (also nicht leer ist)
        $filteredParagraph[] = $p; // Den Absatz zum gefilterten Array hinzufügen
    
    }
}

print_r($filteredParagraph);
?>

<?php foreach ($filteredParagraph as $p): ?>
<p><?php echo e($p) ?></p>
<?php endforeach; ?>