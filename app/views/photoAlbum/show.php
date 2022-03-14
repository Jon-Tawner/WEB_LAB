<div id="album">
    <div id="BackGround-BigPhoto">
        <img id="BigPhoto">
    </div>

    <?php $i = 0;
    foreach ($vars  as $value) {
    ?>
        <div class="photo"><img class="img" id=<?php echo $i++ ?> src=<?php echo "/website/public/img/" . $value['file']; ?> alt=<?php echo $value['alt'] ?>></div>

    <?php } ?>


    <script type="text/javascript" src="/website/public/js/photoAlbum.js"></script>