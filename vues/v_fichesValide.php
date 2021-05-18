<table>
  	   <h3>Valider les fiches VA</h3>
              <tr> 
                <th> Visiteur          </th> 
                <th> Mois              </th> 
                <th> Date Modification </th>
                <th> Montant           </th> 
		            <th> Etat              </th>             
                <th> Valider           </th>      
              </tr>
             
             
      <form method="POST"action="index.php?uc=suiviePaiement&action=validerVA">
        
                 
          
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
                <td> <input type="checkbox" name="checkbox[]" value=<?php echo $visiteur.";".$mois.";".$idEtat ?> /><td>
            </tr>
	<?php		   
      }
	?>
      </div>  
        <input type="submit" value="Valide"/>   
      </form>
    </table>
