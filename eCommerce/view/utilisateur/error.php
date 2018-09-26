<div class="home-content container">
    <?php
    
    if (!empty($user) && $user == false) {
        echo '<p>utilisateur inexistant</p>';
    } else {
        echo 'erreur système ';
        echo $pagetitle;
    }
    ?>
</div>