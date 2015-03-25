<?php

namespace kalkulus\Comics;

use kalkulus\Scraper\Page;

class Comic extends Page {
	
	private $title;

	private $homepage;	

	public function __construct($params){
        parent::__construct($params);
		
        $this->$title		 = $params['title'];
		$this->$homepage	 = $params['homepage'];		
	}

    public function getImgUrl(){
        return $this->getData();
    }
}