<?php

class Comment {
    private int $id;
    private int $articleId;
    private int $userId;
    private string $content;
    private string $timestamp;

    public function __construct(int $id = 0, int $articleId = 0, int $userId = 0, string $content = null, string $timestamp = '') {
        $this->id = $id;
        $this->articleId = $articleId;
        $this->userId = $userId;
        $this->content = $content;
        $this->timestamp = $timestamp;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getArticleId(): int {
        return $this->articleId;
    }

    public function setArticleId(int $articleId): void {
        $this->articleId = $articleId;
    }

    public function getUserId(): int {
        return $this->userId;
    }

    public function setUserId(int $userId): void {
        $this->userId = $userId;
    }

    public function getContent(): ?string {
        return $this->content;
    }

    public function setContent(?string $content): void {
        $this->content = $content;
    }

    public function getTimestamp(): string {
        return $this->timestamp;
    }

    public function setTimestamp(string $timestamp): void {
        $this->timestamp = $timestamp;
    }
}

?>
