<?php 


class Fichier
{

  function traitement_fichier($nom_fichier,$repertoire,$nom_final){

$return_arr = array();

if (!empty($_FILES[$nom_fichier]["name"])) {
  # code...

    $size = 20971520;// la taille du fichier par défaut
    $taille = filesize($_FILES[$nom_fichier]['tmp_name']);
  //$target = dirname(__DIR__)."/uploads/lesson/"; // le repertoire par défaut ou tu veux envoyer le fichier ici c'est à la racine du server

   $target =  "$repertoire"; // le repertoire par défaut ou tu veux envoyer le fichier
  // an array of allowed extensions
  $allowedExts = array("gif", "jpeg", "jpg", "png","GIF","JPEG","JPG","PNG"); // les extensions que tu autorises
  $elementsChemin = pathinfo($_FILES[$nom_fichier]["name"]);
  $extension = $elementsChemin['extension'];
  $piece_jointe = $nom_final;
  $temp = explode(".", $_FILES[$nom_fichier]["name"]);
  $extension = end($temp);

  if (($taille <= $size ) && in_array($extension, $allowedExts) ) {
    # code...

   if ($_FILES[$nom_fichier]["error"] > 0) {
    # code...

    $return_arr[] = array('reports' => 0,
                       'statut' => "error");
  

    return $return_arr;

   }else{

     //$lesson_image = round(microtime(true)) . '.' . end($temp);
     move_uploaded_file($_FILES[$nom_fichier]["tmp_name"], $target . $piece_jointe);
     
      $return_arr[] = array('reports' => 1,
         'statut' => $piece_jointe);
  return $return_arr;
   }

  }else{

      $return_arr[] = array('reports' => -1,
                       'statut' => "p_extension");
  
  return $return_arr;


  }

}else{

    $return_arr[] = array('reports' => -2,
                       'statut' => "vide");
  return $return_arr;
}



}


	function Extension($codelecon,$nom_fichier)
	{
	  if (!empty($_FILES[$nom_fichier]["name"]))
	  {
	    $elementsChemin = pathinfo($_FILES[$nom_fichier]["name"]);
	    $extension = $elementsChemin['extension'];
	    return $codelecon.'.'.$extension;
	  }
	  
	}

}

$file = new Fichier();

$nom_final = rand(1, 100000);//$_POST['telephone'];
$nom_fichier2 = 'email';//$_POST['email'];

$path = "OwnFaceAPI/img/$nom_final";
echo $path;
if(!is_dir($path))
{
	mkdir($path,0777,true);
	$nom_fichier = $file->Extension($nom_final,'avatar');
	echo $nom_fichier;
	$tab = $file->traitement_fichier('avatar',$path.'/',$nom_fichier);
	var_dump($tab);
	echo system('cd c:\wamp64\www\master\ownfaceapi');
	$python_result = exec('python c:\wamp64\www\master\ownfaceapi\Verifie_face.py img\tmp\15.jpg');
	var_dump($python_result);
	/*if($python_result[0]==1)
	{	
		$image1 = $path."/".$nom_fichier;
		$compare = exec("python Capture_compare_face.py $path/ $image1 $nom_fichier2");

	}
	else{
		echo "Fichier pas claire";
	}*/
}else{echo "Repertoire existant";}

?>