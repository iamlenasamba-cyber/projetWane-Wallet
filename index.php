<?php

require "controller.php";


while(true){


echo "\n1 Wallet";
echo "\n2 Depot";
echo "\n3 Retrait";
echo "\n4 Transactions";
echo "\n0 Quitter\n";


$c=readline("Choix : ");



if($c==0){

break;

}


controler($c);


}

?>