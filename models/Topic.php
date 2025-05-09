<?php

class Topic {
    private int $id;
    private string $name;
    private string $description;
    private int $createdBy;

    public function __construct(int $id = 0, string $name = '', string $description = null, int $createdBy = 0) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->createdBy = $createdBy;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getCreatedBy(): int {
        return $this->createdBy;
    }

    public function setCreatedBy(int $createdBy): void {
        $this->createdBy = $createdBy;
    }
}

?>
