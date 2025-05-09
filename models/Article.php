<?php

class Article {
    private int $id;
    private string $title;
    private string $content;
    private int $topicId;
    private int $authorId;

    public function __construct(int $id = 0, string $title = '', string $content = null, int $topicId = 0, int $authorId = 0) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->topicId = $topicId;
        $this->authorId = $authorId;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function getContent(): string {
        return $this->content;
    }

    public function setContent(string $content): void {
        $this->content = $content;
    }

    public function getTopicId(): int {
        return $this->topicId;
    }

    public function setTopicId(int $topicId): void {
        $this->topicId = $topicId;
    }

    public function getAuthorId(): int {
        return $this->authorId;
    }

    public function setAuthorId(int $authorId): void {
        $this->authorId = $authorId;
    }
}

?>
