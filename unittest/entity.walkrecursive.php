<?php

namespace Entity;

class WalkRecursive
{
    public static $type;
    public static $included = array();
    
    public static function crawl($path)
    {
        if ($dh = opendir($path)) 
        {
            while (($file = readdir($dh)) !== FALSE) 
            {
                if($file === '.' OR $file === '..' OR $file === 'tmp' OR (stripos($file, self::$type) === FALSE AND filetype($path . $file) !== 'dir') ) continue;
                
                if(filetype($path . $file) === 'dir') { self::crawl($path . $file . DS); }
                else { self::$included [$file] = $path.$file; }
                
                unset($file);
            }
            
            closedir($dh);
            unset($dh, $path, $file);
        }
    }
}
