<?php
include("vues/v_sommaireComptable.php");
$action = $_REQUEST['action'];
$idComptable = $_SESSION['idComptable'];

switch($action){
	
    
    case 'fichePaie':{
		$Fiches = $pdo->getFicheFraisModifEtat();
 		/*var_dump($Fiches);
 		die();*/
	    include("vues/v_fichesValide.php");
	    break;
	}

    case 'validerVA':{
       if (isset($_POST["checkbox"])){
           	
           	foreach ($_POST["checkbox"] as $value){
	   			$arrayInfo	= explode(";", $value);
	   			$idVisiteur = $arrayInfo[0];
	   			$mois 		= $arrayInfo[1] ;
	   			$etat 		= $arrayInfo[2];
	   
	   			echo $idVisiteur."<br/>" ;
	   			echo $mois;
   
         		if ( $etat == 'VA' ){

   					$pdo->majEtatFicheFrais($idVisiteur,$mois,'RB');
   					echo "<br>Fiche(s) à l'Etat remboursée (RB)";
   					$Fiches = $pdo->getFicheFraisModifEtatRB();
   					include("vues/v_fichesRembourse.php");
   					
         		}
            } 
        } else {
        	echo "Vous visionnez les fiches à l'Etat remboursée (RB)";
        	$Fiches = $pdo->getFicheFraisModifEtatRB();
   			include("vues/v_fichesRembourse.php");
        }
    	break;
    } 

	case 'validerMajFraisForfait':{
		$lesFrais = $_REQUEST['lesFrais'];
		if(lesQteFraisValides($lesFrais)){
	  	 	$pdo->majFraisForfait($idVisiteur,$mois,$lesFrais);
		}
		else{
			ajouterErreur("Les valeurs des frais doivent être numériques");
			include("vues/v_erreurs.php");
		}
	  	break;
	}
	case 'supprimerFrais':{
		$idFrais = $_REQUEST['idFrais'];
	    $pdo->supprimerFraisHorsForfait($idFrais);
		break;
	}
        
    case 'pdfFiche': {
	    $visiteur = $_REQUEST["visiteur"];
	    $mois 	  = $_REQUEST["mois"];
	    
	    $fraisforfait     = $pdo->getLesFraisForfait($visiteur, $mois);
	    $fraishorsforfait = $pdo->getLesFraisHorsForfait($visiteur, $mois);

	    $pdo->PDFVisiteur($visiteur);
	    break;
	}        
}

?>