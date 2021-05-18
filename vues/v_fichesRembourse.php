<table>
  	   <h3>Les fiches RB</h3>
             <tr> 
                <th>Visiteur</th> 
                <th>Mois</th> 
                <th>Date Modification</th>
                <th>Montant</th> 
		            <th>Etat</th>             
                <th>PDF</th>  
             </tr>
             
             
      <form method="POST"action="index.php?uc=suiviePaiement&action=validerFicheFraisRB">
        
                 
          
    <?php    
	    foreach($Fiches as $uneFiche){
			    $visiteur        = $uneFiche['idVisiteur'] ;
          $mois            = $uneFiche['mois'] ;
         //$nbJustificatifs = $uneFiche['nbJustificatifs'];
			    $montantValide   = $uneFiche['montantValide'];
			    $dateModif       = $uneFiche['dateModif'];
          $idEtat          = $uneFiche['idEtat'];
	?>		
            <tr>
                <td> <?php echo $visiteur ?>      </td>
                <td> <?php echo $mois ?>          </td>
                <td> <?php echo $dateModif ?>     </td>
                <td> <?php echo $montantValide ?> </td>
                <td> <?php echo $idEtat ?>        </td>
                <td> <a target="_blank" href=index.php?uc=suiviePaiement&action=pdfFiche&visiteur=<?php echo $visiteur ?>&mois=<?php echo $mois ?>><img src='images/pdf.jpg' height="30" width="30"></a> </td>
            </tr>
	<?php		   
      }
	?>
      </div>   
      </form>
    </table>
