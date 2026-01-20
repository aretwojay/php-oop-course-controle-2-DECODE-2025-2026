<?php

namespace App\Entity;

class Post {

    const TABLE_NAME = 'posts';

	private ?int $id;
	private ?string $title;
	private ?string $content;
	private ?int $user_id;
	private ?string $created_at;

	public function getId(): ?int {
		return $this->id;
	}

	public function getTitle(): ?string {
		return $this->title;
	}

	public function getContent(): ?string {
		return $this->content;
	}

	public function getUserId(): ?int {
		return $this->user_id;
	}

	public function getCreatedAt(): ?string {
		return $this->created_at;
	}

	public function setTitle(?string $title): void {
		$this->title = $title;
	}

	public function setDescription(?string $description): void {
		$this->description = $description;
	}

	public function setUserId(?int $user_id): void {
		$this->user_id = $user_id;
	}

	public function setCreatedAt(?string $created_at): void {
		$this->created_at = $created_at;
	}

	public function setContent(?string $content): void {
		$this->content = $content;
	}

}