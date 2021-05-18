<h3>Fiche à valider </h3>
    <div class="encadre">
                                                       <!--fiche non cloturé-->
  	   <caption>Fiche non cloturé</caption>
        
        <table>
          <tr>
            <th>Date</th>
            <th>Libelle</th> 
            <th>Montant</th>
            <th>Report</th> 
            <th>Supression</th>
          </tr>    
         
        <?php 
          foreach ( $lesFraisHorsForfait as $unFraisHorsForfait ) {
              $date         = $unFraisHorsForfait['date'];
              $libelle      = $unFraisHorsForfait['libelle'];
              $montant      = $unFraisHorsForfait['montant'];
              $idFicheFrais = $unFraisHorsForfait['id'];
        ?>
        <tr>
            <td> <?php echo $date;    ?> </td>
            <td> <?php echo $libelle; ?> </td>
            <td> <?php echo $montant; ?> </td>
            <td><a href="index.php?uc=validerFrais&action=reporterFraisHorsForfait&idFrais=<?php echo $idFicheFrais ?>&idVisiteur=<?php echo $idVisiteur ?>&mois=<?php echo $leMois ?>&date=<?php echo $date ?>&libelle=<?php echo $libelle ?>&montant=<?php echo $montant ?>">Reporter fiche frais</a></td> 
            <td> <a href="index.php?uc=listeVisiteur&action=supprimerFicheFrais&fraisSup=<?php echo $idFicheFrais ?>&idVisiteur=<?php echo $idVisiteur ?>&mois=<?php echo $leMois ?>">Supprimer fiche frais</a></td> 
        </tr>
        <?php  
          }
        ?>
   
        </table>     
                                                       <!--fiche forfaitisé -->
      <caption>Fiche forfaitisé </caption>
         <div class="encadre">
    
        Visiteur :  <?php echo $idVisiteur; ?>
              
                     
        <table>    
          <tr>
            <?php 
            //Foreach pour le libelle
             foreach ($lesFraisForfait as $unFraisForfait){
              $libelle = $unFraisForfait['libelle'];
            ?>  
              <th> <?php echo $libelle; ?> </th>
            <?php
              }
            ?>
          </tr>
          <tr>
            <?php
              foreach ($lesFraisForfait as $unFraisForfait){
                $quantite = $unFraisForfait['quantite'];
            ?>
                <td><?php echo $quantite; ?> </td>
            <?php
              }
            ?>        
                <td><a href="index.php?uc=listeVisiteur&action=actualiserFrais&idVisiteur=<?php echo $idVisiteur ?>&mois=<?php echo $leMois ?>">Actualiser les fiches</a></td>
          </tr>
                           
     
  
  </div>
  </div>
  <a href="index.php?uc=listeVisiteur&action=validerFicheFrais&idVisiteur=<?php echo $idVisiteur ?>&mois=<?php echo $leMois ?>">Valider fiche frais</a>