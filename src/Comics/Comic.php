<?php

namespace kalkulus\Comics;

use kalkulus\Scraper\Page;

class Comic extends Page {
	
	protected $title;

	protected $homepage;	

	public function __construct($params){
        parent::__construct($params);
		
        $this->title		 = $params['title'];
		$this->homepage	 = $params['homepage'];		
	}

    public function getImgUrl(){
    	return $this->getData();
    }

    /**
     * Gets the value of title.
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the value of title.
     *
     * @param mixed $title the title
     *
     * @return self
     */
    protected function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Gets the value of homepage.
     *
     * @return mixed
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * Sets the value of homepage.
     *
     * @param mixed $homepage the homepage
     *
     * @return self
     */
    protected function setHomepage($homepage)
    {
        $this->homepage = $homepage;

        return $this;
    }
}