<!--
Auteur: Ferreira Bryan / Lucas Chavanne
Date: 19.10.2022
Description: Projet personnel BLMshop
-->
<?php
function logout() {
    // Annuler la définition de toutes les variables de session
    $_SESSION = array();

    // Si vous souhaitez tuer la session, supprimez également le cookie de session
    // Remarque: Cela détruira la session, et pas seulement les données de session!
    if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                            $params["path"], $params["domain"],
                            $params["secure"], $params["httponly"]);
    }

    session_destroy();
}
logout();
echo '<meta http-equiv="refresh" content="0;url=index.php?url=index.php?url=accueil">';

