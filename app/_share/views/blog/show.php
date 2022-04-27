<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

echo $vars['page'] . '<br>';
echo '<button type="button" onclick="location=\'/website/Blog/show?page=' . ($vars["page"] - 1) . '\'">Prev</button>';
echo '<button type="button" onclick="location=\'/website/Blog/show?page=' . ($vars["page"] + 1) . '\'">Next</button>';

if (isset($vars['reсords'])) :
    foreach ($vars['reсords'] as $value) : ?>
        <div class="block" id="blog<?= $value->id ?>">
            <p><?= $value->date ?></p>
            <p><?= $value->title ?></p>
            <? if (!empty($value->img))
                echo  "<div class='photo'> <img class='img' style='height: 200px' src='/website/public/blog/img/" . $value->img . "'></div>";
            ?>
            <p><?= $value->content ?></p>
        </div>
        <? if (isset($_SESSION['user']['isAdmin'])) : ?>
            <button type="button" onclick="changeBlog(this)" class="btn" name="<?= $value->id ?>">Изменить блог</button>
        <? endif ?>
        <button type="button" onclick="showComments(this)" name="<?= $value->id ?>">Show comments</button>
        <button type="button" onclick="hideComments(this)" name="<?= $value->id ?>">Hide comments</button>
        <div class="comments<?= $value->id ?>">

        </div>
        <? if (isset($_SESSION['user'])) : ?>
            <button type="button" onclick="openModal(this)" class="btn" name="<?= $value->id ?>">Врите comment</button>
        <? endif ?>
    <? endforeach ?>

    <div id="modal">
        <div id="modal-content">
            <span id="close"></span>
            <textarea name="text" id="Modalcontent" cols="50" rows="10"></textarea>
            <button type="button" onclick="sendComment()">Send comment</button>
        </div>
    </div>

<? endif ?>



<script type="text/javascript" src="/website/public/js/getDataBlog.js"></script>
<script type="text/javascript" src="/website/public/js/showComments.js"></script>
<script type="text/javascript" src="/website/public/js/WriteComment.js"></script>