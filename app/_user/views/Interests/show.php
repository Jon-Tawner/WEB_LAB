<main>
    <?php
    if ($vars)
        foreach ($vars as $value) : ?>
        <section class="article">
            <h2>
                <a class="anchorArt" name="<?= $value->anchor; ?>"> <?= $value->title; ?> </a>
            </h2>
            <p>
                <?= $value->content; ?>
            </p>
        </section>
        <hr>
    <?php endforeach ?>
</main>