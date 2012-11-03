<?php

    require_once(realpath(dirname(__FILE__).'../configs/config.php'));

    function renderBaseLayoutWithConten($contentFile,$variables = array())
    {
        $contenFileFullPath = TEMPLATE_PATH.'/'.$contentFile;

        if (count($variables)>0){
            foreach($variables as $key => $value){
                if(strlen($key)>0){
                   ${$key} = $value;
                }
            }
        }

        require_once(TEMPLATE_PATH.'/header.php');

        if (file_exists($contentFileFullPath))
        {
            require_once($contentFileFullPath);
        }
        else{

            require_once(TEMPLATE_PATH.'/error.php');
            
        }

        require_once(TEMPLATE_PATH.'/footer.php');
    }
?>
