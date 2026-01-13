<h1><?php echo $titre;?></h1><br />
<?php
if (isset($news)){
echo $news->actu_id;
echo(" -- ");
echo $news->actu_titre;
}
else {
echo ("Pas d'actualité !");
}
?>