<?php
/**
 * Created by PhpStorm.
 * User: Jordan
 * Date: 28/09/2015
 * Time: 04:34
 */
<?php foreach ($billets as $billet):?>
    <article>
        <header>
            <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
                <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
            </a>
            <time><?= $billet['date'] ?></time>
        </header>
        <p><?= $billet['contenu'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>