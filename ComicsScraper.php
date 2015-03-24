<?php

namespace kalkulus\Comics;

use kalkulus\Comics\Comic;

class ComicsScraper {
	
	private $comics;

	/**
	 * Batch process comics
	 */
	private $batch = false;

	/**
	 * Render comics function
	 */
	private $render;

	public function __construct($batch, $render){
		$this->batch = $batch;
		$this->render = $render;
	}

	public function addComic(Comic $comic){
		$comics[$comic->getName()] = $comic;

		if (!$batch){
			$comic->scrape($comic);
		}
	}

	public function removeComic($comicName){
		
	}

	public function show(){		
		if ($batch){
			$this->scrape();
		}

		$this->render($this->getComics());
	}

	private function scrape(){
		if ($batch){
			foreach ($comics as $name => $comic) {
				$comic->scrape();
			}
		}
	}

    /**
     * Gets the value of comics.
     *
     * @return mixed
     */
    public function getComics()
    {
        return $this->comics;
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
    private function _setBatch($batch)
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
    private function _setRender($render)
    {
        $this->render = $render;

        return $this;
    }
}