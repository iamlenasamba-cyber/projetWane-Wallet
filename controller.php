<?php

require "services.php";

function controler($choix){
    switch ($choix) {
        case 1:
            creerWalletService();
            break;

        case 2:
            depotService();
            break;

        case 3:
            retraitService();
            break;

        default:
            afficherMessage("Choix invalide");
    }
}
?>