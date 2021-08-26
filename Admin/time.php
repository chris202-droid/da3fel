<?php
/*---------------------------------------------------------------*/
/*
    Titre : Compte &agrave; rebours en JavaScript et PHP                                                                  
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=493
    Auteur           : KOogar                                                                                             
    Date édition     : 01 Fév 2009                                                                                        
    Date mise à jour : 19 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/
/*******************************************************************************
    * Url DEMO avec les memes parametres ci dessous
    ***************************************************************************/

/*       https://phpsources.net/codes/php/demo/compte-a-rebours             */

/*******************************************************************************
    * A parametrer
    ***************************************************************************/

$heures   = 0;  // les heures < 24
$minutes  = 0;   // les minutes  < 60
$secondes = 2;  // les secondes  < 60

$annee = date("Y");  // par defaut cette année
$mois  = date("m");  // par defaut ce mois
$jour  = date("d");  // par defaut aujourd'hui

// quand le compteur arrive à 0
// -> redirection
$redirection = 'https://phpsources.net/code_s.php?id=493';

/*******************************************************************************
    * calcul des secondes
    ***************************************************************************/

$secondes = mktime(date("H") + $heures,
                            date("i") + $minutes,
                            date("s") + $secondes,
                            $mois,
                            $jour,
                            $annee
                            ) - time();
?>

<script type="text/javascript">
var temps = <?php echo $secondes;?>;
var timer =setInterval('CompteaRebour()',1000);
function CompteaRebour(){

  temps-- ;
  j = parseInt(temps) ;
  h = parseInt(temps/3600) ;
  m = parseInt((temps%3600)/60) ;
  s = parseInt((temps%3600)%60) ;
  
if ((s == 0 && m ==0 && h ==0)) {
  //ici faire un traite;ent
  document.write("Bonjour");
  temps = 3;
  
}
}

</script>


<body onload="timer">
<?php
// la condition est que le nombre de seconde soit etre superieur a 24 heures
if ($secondes <= 3600*24) {
?>
<span style="font-size: 36px;">Il vous reste comme temps</span>
<div id="minutes" style="font-size: 36px;"></div></span>
<?php
 }
?>
