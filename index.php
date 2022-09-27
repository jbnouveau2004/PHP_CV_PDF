<?php
$competence_nb=1;
$experience_nb=1;
$diplome_nb=1;
$interet_nb=1;


// ----------------------------------------ajouter une ligne supplémentaire------------------------
if(isset($_GET['competence_ajout'])){
    $competence_nb=($_GET['competence_nb'])+1;
    $experience_nb=($_GET['experience_nb']);
    $diplome_nb=($_GET['diplome_nb']);
    $interet_nb=($_GET['interet_nb']);
}
if(isset($_GET['experience_ajout'])){
    $competence_nb=($_GET['competence_nb']);
    $experience_nb=($_GET['experience_nb'])+1;
    $diplome_nb=($_GET['diplome_nb']);
    $interet_nb=($_GET['interet_nb']);
}
if(isset($_GET['diplome_ajout'])){
    $competence_nb=($_GET['competence_nb']);
    $experience_nb=($_GET['experience_nb']);
    $diplome_nb=($_GET['diplome_nb'])+1;
    $interet_nb=($_GET['interet_nb']);
}
if(isset($_GET['interet_ajout'])){
    $competence_nb=($_GET['competence_nb']);
    $experience_nb=($_GET['experience_nb']);
    $diplome_nb=($_GET['diplome_nb']);
    $interet_nb=($_GET['interet_nb'])+1;
}


// ------------------------------------supprimer la dernière ligne-------------------------------
if(isset($_GET['competence_retirer'])){
    $competence_nb=($_GET['competence_nb'])-1;
    $experience_nb=($_GET['experience_nb']);
    $diplome_nb=($_GET['diplome_nb']);
    $interet_nb=($_GET['interet_nb']);
}
if(isset($_GET['experience_retirer'])){
    $competence_nb=($_GET['competence_nb']);
    $experience_nb=($_GET['experience_nb'])-1;
    $diplome_nb=($_GET['diplome_nb']);
    $interet_nb=($_GET['interet_nb']);
}
if(isset($_GET['diplome_retirer'])){
    $competence_nb=($_GET['competence_nb']);
    $experience_nb=($_GET['experience_nb']);
    $diplome_nb=($_GET['diplome_nb'])-1;
    $interet_nb=($_GET['interet_nb']);
}
if(isset($_GET['interet_retirer'])){
    $competence_nb=($_GET['competence_nb']);
    $experience_nb=($_GET['experience_nb']);
    $diplome_nb=($_GET['diplome_nb']);
    $interet_nb=($_GET['interet_nb'])-1;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>


<?php //--------------------------------le formulaire--------------------------------------------
if(!isset($_GET['convertir'])):
?>

<h1>Générateur de CV</h1>


<form action="index.php" type="GET">
    <label for="civilite"><b>Civilité:</b></label><br>
    <input type="text" name="nom" placeholder="Nom Prénom" value="<?php if(isset($_GET['nom'])){echo $_GET['nom'];}?>"><br>
    <input type="text" name="adresse" placeholder="Adresse" value="<?php if(isset($_GET['adresse'])){echo $_GET['adresse'];}?>"><br>
    <input type="text" name="ville" placeholder="Code postale, Commune" value="<?php if(isset($_GET['ville'])){echo $_GET['ville'];}?>"><br>
    <input type="text" name="tel" placeholder="Numéro de téléphone" value="<?php if(isset($_GET['tel'])){echo $_GET['tel'];}?>"><br>
    <input type="text" name="mail" placeholder="Adresse mail" value="<?php if(isset($_GET['mail'])){echo $_GET['mail'];}?>"><br>

    <hr>

    <label for="competences"><b>Compétences:</b></label><br>
    <?php for($i=0;$i<$competence_nb;$i++):?>
    <div>Compétence n°<?=$i+1?></div>
    <input type="text" name="competence<?=$i+1?>" placeholder="Compétence" value="<?php if(isset($_GET['competence'.($i+1)])){echo $_GET['competence'.($i+1)];}?>"><br>
    <?php endfor ?>
    <input type="hidden" name="competence_nb" value="<?=$competence_nb?>">
    <button name="competence_ajout">Ajouter une compétence</button><br>
    <?php if($competence_nb>1):?><button name="competence_retirer">Retirer une compétence</button><br><?php endif ?>

    <hr>

    <label for="experiences"><b>Expériences:</b></label><br>
    <?php for($i=0;$i<$experience_nb;$i++):?>
    <div>Expérience n°<?=$i+1?></div>
    <input type="text" name="experience<?=$i+1?>_dates" placeholder="Dates" value="<?php if(isset($_GET['experience'.($i+1).'_dates'])){echo $_GET['experience'.($i+1).'_dates'];}?>"><br>
    <input type="text" name="experience<?=$i+1?>_boite" placeholder="Nom de la société" value="<?php if(isset($_GET['experience'.($i+1).'_boite'])){echo $_GET['experience'.($i+1).'_boite'];}?>"><br>
    <input type="text" name="experience<?=$i+1?>_poste" placeholder="Intitulé du poste" value="<?php if(isset($_GET['experience'.($i+1).'_poste'])){echo $_GET['experience'.($i+1).'_poste'];}?>"><br>
    <?php endfor ?>
    <input type="hidden" name="experience_nb" value="<?=$experience_nb?>">
    <button name="experience_ajout">Ajouter une expérience</button><br>
    <?php if($experience_nb>1):?><button name="experience_retirer">Retirer une expérience</button><br><?php endif ?>
    <hr>

    <label for="diplomes"><b>Diplômes:</b></label><br>
    <?php for($i=0;$i<$diplome_nb;$i++):?>
    <div>Diplôme n°<?=$i+1?></div>
    <input type="text" name="diplome<?=$i+1?>_date" placeholder="Année d'obtention" value="<?php if(isset($_GET['diplome'.($i+1).'_date'])){echo $_GET['diplome'.($i+1).'_date'];}?>"><br>
    <input type="text" name="diplome<?=$i+1?>_nom" placeholder="Intitulé du diplôme" value="<?php if(isset($_GET['diplome'.($i+1).'_nom'])){echo $_GET['diplome'.($i+1).'_nom'];}?>"><br>
    <?php endfor ?>
    <input type="hidden" name="diplome_nb" value="<?=$diplome_nb?>">
    <button name="diplome_ajout">Ajouter un diplôme</button><br>
    <?php if($diplome_nb>1):?><button name="diplome_retirer">Retirer un diplôme</button><br><?php endif ?>
    <hr>

    <label for="interets"><b>Intérêts:</b></label><br>
    <?php for($i=0;$i<$interet_nb;$i++):?>
    <div>Intérêt n°<?=$i+1?></div>
    <input type="text" name="interet<?=$i+1?>" placeholder="Intérêt" value="<?php if(isset($_GET['interet'.($i+1)])){echo $_GET['interet'.($i+1)];}?>"><br>
    <?php endfor ?>
    <input type="hidden" name="interet_nb" value="<?=$interet_nb?>">
    <button name="interet_ajout">Ajouter une compétence</button><br>
    <?php if($interet_nb>1):?><button name="interet_retirer">Retirer un intérêt</button><br><?php endif ?>
    <hr>

    <br><br><INPUT type="submit" name="convertir" value="Convertir">

</form>



<?php // -----------------------------------affiche le résultat----------------------------------------
else:
?>
<div class="fenetre">
<div class="resultat">

<?php
$competence_nb=($_GET['competence_nb']);
$experience_nb=($_GET['experience_nb']);
$diplome_nb=($_GET['diplome_nb']);
$interet_nb=($_GET['interet_nb']);
?>

<h1 class="nom"><?=$_GET['nom']?></h1>
<div class="entete">
<div class="civ"><img src="position.png"><?=$_GET['adresse']." ".$_GET['ville']?></div>
<div class="civ"><img src="tel.png"><?=$_GET['tel']?></div>
<div class="civ"><img src="mail.png"><?=$_GET['mail']?></div>
</div>
<br><br>


<h1>Compétences:</h1>
<ul>
<?php
for($i=0;$i<$competence_nb;$i++){
    echo "<li>" . $_GET['competence'.($i+1)] . "</li><br>";
}
?>
</ul>



<h1>Expériences:</h1>
<ul>
<?php
for($i=0;$i<$experience_nb;$i++){
    echo "<li>";
    echo "<b>" . $_GET['experience'.($i+1).'_dates'] . "</b> ";
    echo $_GET['experience'.($i+1).'_boite'] . "<br>";
    echo "---&gt; " . $_GET['experience'.($i+1).'_poste'];
    echo "</li><br>";
}
?>
</ul>



<h1>Diplômes:</h1>
<ul>
<?php
for($i=0;$i<$diplome_nb;$i++){
    echo "<li>";
    echo "<b>" . $_GET['diplome'.($i+1).'_date'] . "</b><br>";
    echo $_GET['diplome'.($i+1).'_nom'];
    echo "</li><br>";
}
?>
</ul>



<h1>Intérêts:</h1>
<ul>
<?php
for($i=0;$i<$interet_nb;$i++){
    echo "<li>" . $_GET['interet'.($i+1)] . "</li><br>";
}
?>
</ul>


</div>
</div>

<?php
//----------------------------deuxième formulaire pour PDF--------------------
?>
<form action="pdf.php" type="GET">

<input type="hidden" name="nom" placeholder="Nom Prénom" value="<?php echo $_GET['nom'];?>">
    <input type="hidden" name="adresse" value="<?php echo $_GET['adresse'];?>">
    <input type="hidden" name="ville" value="<?php echo $_GET['ville'];?>">
    <input type="hidden" name="tel" value="<?php echo $_GET['tel'];?>">
    <input type="hidden" name="mail" value="<?php echo $_GET['mail'];?>">


<input type="hidden" name="competence_nb" value="<?=$competence_nb?>">
<?php for($i=0;$i<$competence_nb;$i++):?>
    <input type="hidden" name="competence<?=$i+1?>" value=" <?php echo $_GET['competence'.($i+1)];?> ">
    <?php endfor ?>


<input type="hidden" name="experience_nb" value="<?=$experience_nb?>">
<?php for($i=0;$i<$experience_nb;$i++):?>
    <input type="hidden" name="experience<?=$i+1?>_dates" value=" <?php echo $_GET['experience'.($i+1).'_dates']; ?> ">
    <input type="hidden" name="experience<?=$i+1?>_boite" value="<?php echo $_GET['experience'.($i+1).'_boite']; ?> ">
    <input type="hidden" name="experience<?=$i+1?>_poste" value="<?php echo $_GET['experience'.($i+1).'_poste']; ?> ">
    <?php endfor ?>


<input type="hidden" name="diplome_nb" value="<?=$diplome_nb?>">
<?php for($i=0;$i<$diplome_nb;$i++):?>
    <input type="hidden" name="diplome<?=$i+1?>_date" value="<?php echo $_GET['diplome'.($i+1).'_date']; ?> ">
    <input type="hidden" name="diplome<?=$i+1?>_nom" value="<?php echo $_GET['diplome'.($i+1).'_nom']; ?> ">
    <?php endfor ?>


<input type="hidden" name="interet_nb" value="<?=$interet_nb?>">
<?php for($i=0;$i<$interet_nb;$i++):?>
    <input type="hidden" name="interet<?=$i+1?>" value=" <?php echo $_GET['interet'.($i+1)]?> ">
    <?php endfor ?>


<br><br><INPUT type="submit" name="convertir" value="Exporter en PDF">
</form>


<?php
endif
?>


</body>
</html>