<div class="home-content container">
    <?php
    require_once File::build_path(Array("lib", "Session.php"));
    ;
    echo "<p> login user: " . htmlspecialchars($user->get('login')) . "</p>";
    echo "<p> nom: " . htmlspecialchars($user->get('nom')) . "</p>";
    echo "<p> prénom: " . htmlspecialchars($user->get('prenom')) . "</p>";
    echo "<p> email: " . htmlspecialchars($user->get('email')) . "</p>";

    if (Session::is_user($user->get('login')) == true || Session::is_admin() == TRUE) {
        echo '<a href="./index.php?action=delete&controller=utilisateur&login=' . htmlspecialchars($user->get('login')) . '">Supprimer</a>';
        echo '<a > </a>';
        echo '<a href="./index.php?action=update&controller=utilisateur&login=' . htmlspecialchars($user->get('login')) . '">Modifier</a>';
    }
    ?>
</div>