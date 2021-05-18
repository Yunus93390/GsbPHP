<form method="POST" action="index.php?uc=listeVisiteur&action=afficherFrais">
   <input type="hidden" name="visiteur" value="<?php echo $unVisiteur; ?>">
   
     <label for="unMois" accesskey="n">Mois : </label>
      <select id="unMois" name="unMois" >
            <?php
			foreach ($lesMois as $unMois)
			{
			    $mois = $unMois['mois'];
				$numAnnee =  $unMois['numAnnee'];
				$numMois =  $unMois['numMois'];
				if($mois == $moisASelectionner){
				?>
				<option selected value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
				<?php 
				}
				else{ 
				?>
				<option value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
				<?php 
				}
			
			}
           
		   ?>    
            
       </select>
       <input id="ok" type="submit" value="Valider" />
</form>