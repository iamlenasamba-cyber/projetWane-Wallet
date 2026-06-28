<?php

$wallets=[];
$transactions=[];

function trouverWallet($tel){
global $wallets;

foreach($wallets as $index=>$wallet){
if($wallet["telephone"]==$tel){
return $index;
}

}

return -1;
}

function ajouterWallet($wallet){


global $wallets;
$wallets[]=$wallet;
}


?>