<div class="home-content container">
    <?php
    foreach ($tab_v as $v) {
        echo "<p>" . '<a href="./index.php?action=read&controller=utilisateur&login=' . rawurlencode($v->get('login')) . '">' . $v->get('login') . "</a></p>";
    }
    ?>
</div>