<?php

require "repository.php";
require "validator.php";

function demanderSaisie($message){
    return readline($message);
}

function afficherMessage($message){
    echo $message;
}

function afficherMenu(){
    echo "\n**MENU**\n";
    echo "\n1_Creer un Wallet";
    echo "\n2_ Faire un Depot";
    echo "\n3_Faire un Retrait";
    echo "\n4_Lister les Transactions";
    echo "\n0_Quitter\n";
}


function creerWalletService(){
    global $wallets;

    $client = demanderSaisie("Client : ");

    while ($client == "") {
        afficherMessage("Obligatoire");
        $client = demanderSaisie("Client : ");
    }

    $tel = demanderSaisie("Telephone : ");

    while (!telephoneValide($tel)) {
        afficherMessage("Telephone invalide");
        $tel = demanderSaisie("Telephone : ");
    }

    while (trouverWallet($tel) != -1) {
        afficherMessage("Telephone existe");
        $tel = demanderSaisie("Telephone : ");
    }

    $code = demanderSaisie("Code : ");

    while (!codeValide($code)) {
        afficherMessage("Code invalide");
        $code = demanderSaisie("Code : ");
    }

    $wallet = [
        "client" => $client,
        "telephone" => $tel,
        "code" => $code,
        "solde" => 0
    ];

    ajouterWallet($wallet);
    afficherMessage("Wallet créé");
}
