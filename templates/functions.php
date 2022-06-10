<?php

    function getTemplate($template, $folder='templates/'){
        $tempFile = $folder.$template;

        if(is_file($tempFile))
            $content = file_get_contents($tempFile);
        return $content;
    }

    function parseTemplate($template, $arr){
        foreach($arr as $key=>$value){
            $template = str_replace('{'.$key.'}', $value, $template);
        }
        return $template;
    }

?>