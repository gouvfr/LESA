<div class="dossier clear_sans ul_style_none">
					<ul>
<?php

function listing($repertoire){

	$fichier = array();

	if (is_dir($repertoire)){

		$dir = opendir($repertoire);                      
		while(false!==($file = readdir($dir))){                        

			if(!in_array($file, array('.','..'))){            

				$page = $file;                           
				$page = explode('.', $page);
				$nb = count($page);
				$nom_fichier = $page[0];
				for ($i = 1; $i < $nb-1; $i++){
					$nom_fichier .= '.'.$page[$i];
				}
				if(isset($page[1])){
					$ext_fichier = $page[$nb-1];
					if(!is_file($file)) { $file = '/'.$file; }
				}
				else {
					if(!is_file($file)) { $file = '/'.$file; }          
					$ext_fichier = '';
				}
				
				if($ext_fichier != 'php' and $ext_fichier != 'html' and $ext_fichier != 'txt' ) {        //exclure certains types de fichiers à ne pas lister
					array_push($fichier, $file);
				}
			}
		}
	}
	
	natcasesort($fichier);                    
	
	foreach($fichier as $value) {
			echo '<li><a href="'.rawurlencode($repertoire).'/'.rawurlencode(str_replace ('/', '', $value)).'">'.$value.'</a></li>';
				
	}

}
?>
<?php listing('.');?>
</ul>
</div>