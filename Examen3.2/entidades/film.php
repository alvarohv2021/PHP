<?php

class film
{
    private $id, $title, $description, $releaseY, $language, $lenght, $rating,$actors="", $categories = "", $uerId;

    /**
     * @param $id
     * @param $title
     * @param $description
     * @param $releaseY
     * @param $language
     * @param $lenght
     * @param $rating
     * @param string $actors
     * @param string $categories
     * @param $uerId
     */
    public function __construct($id, $title, $description, $releaseY, $language, $lenght, $rating, $actors, $categories, $uerId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->releaseY = $releaseY;
        $this->language = $language;
        $this->lenght = $lenght;
        $this->rating = $rating;
        $this->actors = $actors;
        $this->categories = $categories;
        $this->uerId = $uerId;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getReleaseY()
    {
        return $this->releaseY;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return mixed
     */
    public function getLenght()
    {
        return $this->lenght;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @return string
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * @return string
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @return mixed
     */
    public function getUerId()
    {
        return $this->uerId;
    }


}