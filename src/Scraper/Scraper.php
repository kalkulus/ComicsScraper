<?php

namespace kalkulus\Scraper;

class Scraper {
	
	private $pages;

	/**
	 * Batch process pages
	 */
	private $batch = false;

	/**
	 * Render pages function
	 */
	private $render;

    /**
     * Parameters
     */
    private $params;

	public function __construct(){		
	}

	public function addPage(Page $page){
		$this->pages[$page->getName()] = $page;

		if (!$this->batch){
			$page->scrape($this->params);
		}
	}

	public function removePage($pageName){
		
	}

	public function show(){		
		if ($this->batch){
			$this->scrape();
		}

		$this->render($this->getPages());
	}

	private function scrape(){
		if ($this->batch){
			foreach ($pages as $name => $page) {
				$page->scrape($this->params);
			}
		}
	}

    /**
     * Gets the value of pages.
     *
     * @return mixed
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Gets the value of batch.
     *
     * @return mixed
     */
    public function getBatch()
    {
        return $this->batch;
    }

    /**
     * Sets the value of batch.
     *
     * @param mixed $batch the batch
     *
     * @return self
     */
    public function setBatch($batch)
    {
        $this->batch = $batch;

        return $this;
    }

    /**
     * Sets the value of render.
     *
     * @param mixed $render the render
     *
     * @return self
     */
    public function setRender($render)
    {
        $this->render = $render;

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

    /**
     * Gets the Params.
     *
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Sets the Params.
     *
     * @param mixed $params the params
     *
     * @return self
     */
    public function setParams($params)
    {
        $this->params = $params;

        return $this;
    }
}