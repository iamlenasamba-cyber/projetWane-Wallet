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

        case 4:
            transactionsService();
            break;

        default:
            afficherMessage("Choix invalide");
    }
}
?>