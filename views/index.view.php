<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./styles/lib/montserrat/webfonts/Montserrat.css" />
    <link rel="stylesheet" type="text/css" href="./styles/main.css" />
    <title>Gästebuch</title>
</head>

<body>
    <div class="container">
        <h1 class="guestbook-heading">Gästebuch</h1>
        <form action="submit.php" method="post">

            <?php if (isset($errorMessage)) : ?>
                <p><?php echo e($errorMessage) ?></p>
            <?php endif; ?>
            <label class="guestbook-entry-label" for="name">Dein Name:</label>
            <input class="guestbook-entry-input" type="text" id="name" name="name" />

            <label class="guestbook-entry-label" for="title">Titel des Eintrags:</label>
            <input class="guestbook-entry-input" type="text" id="title" name="title" />

            <label class="guestbook-entry-label" for="content">Inhalt des Eintrags:</label>
            <textarea rows="4" class="guestbook-entry-input" type="text" id="content" name="content"></textarea>

            <div class="guestbook-form-buttons">
                <input class="button" type="reset" value="Zurücksetzen">
                <input class="button" type="submit" value="Absenden">
            </div>
        </form>

        <hr class="guestbook-separator" />


        <?php foreach ($entries as $entry) : ?>
            <?php
            $paragraphs = explode("\n", $entry['content']);
            $filteredParagraphs = [];
            foreach ($paragraphs as $p) { // Für jeden Absatz im Array
                $p = trim($p); // leere zeichen wird entfernt
                if (strlen($p) > 0) { // Überprüfen, ob der Absatz eine Länge größer als 0 hat (also nicht leer ist)
                    $filteredParagraphs[] = $p; // Den Absatz zum gefilterten Array hinzufügen

                }
            } ?>
            <div class="guestbook-entry">
                <div class="guestbook-entry-header">
                    <h3 class="guestbook-entry-title">
                        <?php echo e($entry['title']); ?>
                    </h3>
                    <span class="guestbook-entry-author">
                        <?php echo e($entry['name']); ?>
                    </span>
                </div>

                <div class="guestbook-entry-content">
                    <?php foreach ($filteredParagraphs as $p) : ?>
                        <p><?php echo e($p) ?></p>
                    <?php endforeach; ?>

                </div>
            </div>
        <?php endforeach; ?>



        <?php
        $numPages = ceil($countTotal / $perPage);
       
        ?>

        <?php if ($numPages > 1) : ?>
            <ul class="guestbook-pagination">
                <?php for ($i = 1; $i <= $numPages; $i++) : ?>
                    <li class="guestbook-pagination-li">
                        <a class="guestbook-pagination-a <?php if ($i === $currentPage) : ?>guestbook-pagination-active<?php endif; ?>" href="index.php?<?php echo http_build_query(['page' => $i]) ?>">

                            <?= e($i) ?>

                        </a>
                    </li>


                <?php endfor; ?>
            </ul>
        <?php endif; ?>

        <hr class="guestbook-separator" />

        <footer class="guestbook-footer">
            <p>Implementiert im PHP-Kurs</p>
        </footer>

    </div>
</body>

</html>