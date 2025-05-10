<?php
// models/Article.php

class Article {
    private $artID;
    private $title;
    private $image;
    private $content;
    private $authorID;
    private $catID;
    private $lastModified;

    public function getArtID() { return $this->artID; }
    public function setArtID($artID) { $this->artID = $artID; }

    public function getTitle() { return $this->title; }
    public function setTitle($title) { $this->title = $title; }

    public function getImage() { return $this->image; }
    public function setImage($image) { $this->image = $image; }

    public function getContent() { return $this->content; }
    public function setContent($content) { $this->content = $content; }

    public function getAuthorID() { return $this->authorID; }
    public function setAuthorID($authorID) { $this->authorID = $authorID; }

    public function getCatID() { return $this->catID; }
    public function setCatID($catID) { $this->catID = $catID; }

    public function getLastModified() { return $this->lastModified; }
    public function setLastModified($lastModified) { $this->lastModified = $lastModified; }
}
