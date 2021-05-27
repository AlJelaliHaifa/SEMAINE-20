<?php 

function browse($folderName){
if($folder = opendir($folderName)){
    
    
        while(($file = readdir($dossier))){
            if ((is_dir ("$folderName"."/"."$file")) and ($file != ".") and  ($file != "..")){
               browse("$folderName"."/"."$file"); 
            }
            else {if (($file != ".") and  ($file != ".."))
                  echo "$folderName"."/"."$file"."</br>";}
        }
    
    }
    
else{
    echo "Dossier inconnu";
    }
}
browse("../../formulaire");


?>
