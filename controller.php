<?php

require "services.php";

function controler($choix){
    switch ($choix) {
        case 1:
            creerWalletService();
            break;


        default:
            afficherMessage("Choix invalide");
    }
}
?>