<form method="POST" action="index.php?uc=listeVisiteur&action=afficherMois">
	<label>Liste des Visiteurs : </label>

	<select  id="unVisiteur" name="unVisiteur">
		<?php
			foreach ($lesVisiteurs as $unVisiteur) { 
		

	   echo "<option value='" .$unVisiteur['id']."'>" ;

	    
	    	echo $unVisiteur['nom']." ".$unVisiteur['prenom']; 
	    
	    	
	  echo  "</option>" ;

	 	
	 	
	 	}

	 	?>
	 <br>
	<input type="submit" value="Valider">	
	</select>

	
</form>