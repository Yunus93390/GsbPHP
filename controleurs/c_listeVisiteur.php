<?php  
include("vues/v_sommaireComptable.php");

$action      = $_REQUEST['action'];
$idComptable = $_SESSION['idComptable'];
switch($action){
	
	case 'afficherVisiteur':{
		$lesVisiteurs          = $pdo->getListeVisiteurs($idComptable);
		$lesCles               = array_keys( $lesVisiteurs );
	    $visiteurASelectionner = $lesCles[0];
		include("vues/v_listeVisiteurs.php");
		break;
	}
	case 'afficherMois':{
		$unVisiteur = $_REQUEST['unVisiteur'];
		$lesMois    = $pdo->getLesMoisDisponiblesComptable($unVisiteur);
		include("vues/v_listeMoisVisiteurs.php");
		break;
	}
	case 'afficherFrais':{
		
		$idVisiteur = $_REQUEST['visiteur']; 

        echo "ID : " . $idVisiteur ."<br>" ;

        $leMois     = $_REQUEST['unMois']; 

        echo "Mois : " . $leMois ;

        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
        $lesFraisForfait     = $pdo->getLesFraisForfait($idVisiteur,$leMois);
        $lesInfosFicheFrais  = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);

        $numAnnee =substr( $leMois,0,4);
        $numMois  =substr( $leMois,4,2);

        $libEtat         = $lesInfosFicheFrais['libEtat'];
        $montantValide   = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
        $dateModif       = $lesInfosFicheFrais['dateModif'];
        $dateModif       = dateAnglaisVersFrancais($dateModif);	
		include("vues/v_ficheFraisComptable.php");
		break;
	}

	case 'actualiserFrais' : {
            
          $idVisiteur      = $_REQUEST['idVisiteur'];
          $leMois          = $_REQUEST['mois'];
          $numAnnee        = substr( $leMois,0,4);
		  $numMois         = substr( $leMois,4,2);
          $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur,$leMois);  
       //verifier si yunus a la meme
        include("vues/v_listeFraisForfait.php");  
        break;    
    }

    case 'validerFicheFrais' : {
       //recup id et mois puis appel a la fonction pour valider   
       $idVisiteur = $_REQUEST['idVisiteur'] ;
       $mois       = $_REQUEST['mois'] ;
       $pdo->majEtatFicheFrais($idVisiteur,$mois,'VA')	;
        break;
    }

    case 'validerFicheFraisRB' : {
       //recup id et mois puis appel a la fonction pour valider   
       $idVisiteur = $_REQUEST['idVisiteur'] ;
       $mois       = $_REQUEST['mois'] ;
       $pdo->majEtatFicheFrais($idVisiteur,$mois,'RB')	;
        break;
    }
}
?>