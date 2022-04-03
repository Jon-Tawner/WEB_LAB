<div id="album">
    <div id="BackGround-BigPhoto">
        <img id="BigPhoto">
    </div>

    <?php $i = 0;
    foreach ($vars  as $value) : ?>
        <div class="photo"><img class="img" id=<?= $i++ ?> src=<?= "/website/public/img/" . $value->file; ?> alt=<?= $value->alt ?>></div>

    <?php endforeach ?>


    <script type="text/javascript" src="/website/public/js/photoAlbum.js"></script>