<main>
    <?php foreach ($vars as $value) { ?>
        <section class="article">
            <h2>
                <a class="anchorArt" name="<?php echo $value['anchor']; ?>"><?php echo $value['title']; ?> </a>
            </h2>
            <p>
                <?php echo $value['content']; ?>
            </p>
        </section>
        <hr>
    <?php } ?>
</main>