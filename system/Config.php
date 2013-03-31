<?php

/**
 * Config - [Add a short description of what this file does]
 *
 * This handles the config.xml, whatever is in there, it is processed here
 * 
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class Config {
    
    private $configFile;
    
    private $items = array();
    
    public function __construct($file) {
        $this->configFile = $file;
        $this->parse();
    }
    
    function __get($id) {
        return $this->items[$id];
        
    }
    
    function parse() {
        $doc = new DOMDocument();
        $doc->load($this->configFile);
        $cn = $doc->getElementsByTagName('config');
        $nodes = $cn->item(0)->getElementsByTagName('*');
        foreach ($nodes as $node) {
            $this->items[$node->nodeName] = $node->nodeValue;
        }
    }
}

/* End of file Config.php */

// I will finish this off soon, so configuration would be in .ini file
// reference -> IBM
//                                                  - Joey Hipolito