<?php

namespace kalkulus\Comics;

class Comic {
	
	private $name;

	private $title;

	private $homepage;

	private $comicUrl;

	private $imgUrl;

	private $scraper;

	public function __construct($params){
		$this->$name		 = $params['name'];
		$this->$title		 = $params['title'];
		$this->$homepage	 = $params['homepage'];
		$this->$comicUrl	 = $params['comicUrl'];		
		$this->$scraper		 = $params['scraper'];		
	}

	public function scrape(){
		if (empty($this->imgUrl)){
			$this->scraper();
		}

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
    private function _setName($name)
    {
        $this->name = $name;

        return $this;
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
    private function _setTitle($title)
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
    private function _setHomepage($homepage)
    {
        $this->homepage = $homepage;

        return $this;
    }

    /**
     * Gets the value of comicUrl.
     *
     * @return mixed
     */
    public function getComicUrl()
    {
        return $this->comicUrl;
    }

    /**
     * Sets the value of comicUrl.
     *
     * @param mixed $comicUrl the comic url
     *
     * @return self
     */
    private function _setComicUrl($comicUrl)
    {
        $this->comicUrl = $comicUrl;

        return $this;
    }

    /**
     * Gets the value of imgUrl.
     *
     * @return mixed
     */
    public function getImgUrl()
    {
        return $this->imgUrl;
    }

    /**
     * Sets the value of imgUrl.
     *
     * @param mixed $imgUrl the img url
     *
     * @return self
     */
    private function _setImgUrl($imgUrl)
    {
        $this->imgUrl = $imgUrl;

        return $this;
    }

    /**
     * Sets the value of scraper.
     *
     * @param mixed $scraper the scraper
     *
     * @return self
     */
    private function _setScraper($scraper)
    {
        $this->scraper = $scraper;

        return $this;
    }
}