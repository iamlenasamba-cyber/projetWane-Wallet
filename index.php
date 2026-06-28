<?php

require "controller.php";

while (true) {
    afficherMenu();

    $c = demanderSaisie("Que souhaitez-vous faire: ");

    if ($c == 0) {
        break;
    }

    controler($c);
}
?>