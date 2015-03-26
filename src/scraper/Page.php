<?php

namespace kalkulus\Scraper;

class Page {

	protected $name = null;

	protected $url = null;

	protected $scraper = null;

	protected $data = null;

	public function __construct($params){        
		$this->name	= $params['name'];		
		$this->url	 	= $params['url'];		
		$this->scraper	= $params['scraper'];		
	}

	public function scrape(){
		if (is_null($this->scraper)){
			throw Exception('Scraper undefined');
		}
		
		$this->data = $this->scraper($this->getUrl());
	}


    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of url.
     *
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets the value of url.
     *
     * @param mixed $url the url
     *
     * @return self
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Gets the value of scraper.
     *
     * @return mixed
     */
    public function getScraper()
    {
        return $this->scraper;
    }

    /**
     * Sets the value of scraper.
     *
     * @param mixed $scraper the scraper
     *
     * @return self
     */
    public function setScraper($scraper)
    {
        $this->scraper = $scraper;

        return $this;
    }

    /**
     * Gets the value of data.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Sets the value of data.
     *
     * @param mixed $data the data
     *
     * @return self
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    public function __call($method, $args) {
     if(isset($this->$method) && is_callable($this->$method)) {
         return call_user_func_array(
             $this->$method, 
             $args
         );
     }
  }
}