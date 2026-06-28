<?php

require "repository.php";
require "validator.php";

function demanderSaisie($message){
    return readline($message);
}

function afficherMessage($message){
    echo $message . PHP_EOL;
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

function depotService(){
    global $wallets;

    $tel = demanderSaisie("Telephone : ");
    $i = trouverWallet($tel);

    while ($i == -1) {
        afficherMessage("Wallet inconnu");
        $tel = demanderSaisie("Telephone : ");
     $i = trouverWallet($tel);
    }

    $m = demanderSaisie("Montant : ");
    while (!montantValide($m)) {
        afficherMessage("Montant invalide");
      $m = demanderSaisie("Montant : ");
    }
    $wallets[$i]["solde"] += $m;
    afficherMessage("Depot OK");
}

function calculFrais($m){
    if ($m <= 10000) {
      return 200;
    }

    if ($m <= 100000) {
     return 500;
    }

    $f = $m * 0.01;

    if ($f > 5000) {
     $f = 5000;
    }

    return $f;
}

function retraitService(){
    global $wallets;

    $tel = demanderSaisie("Telephone : ");
    $i = trouverWallet($tel);

    while ($i == -1) {
        afficherMessage("Wallet inconnu");
        $tel = demanderSaisie("Telephone : ");
        $i = trouverWallet($tel);
    }

    $m = demanderSaisie("Montant : ");

    while (!montantValide($m)) {
        afficherMessage("Montant invalide");
        $m = demanderSaisie("Montant : ");
    }

    $f = calculFrais($m);
    $total = $m + $f;

    if ($wallets[$i]["solde"] < $total) {
        afficherMessage("Solde insuffisant");
        return;
    }

    $wallets[$i]["solde"] -= $total;
    afficherMessage("Retrait OK frais=$f");
}

?>