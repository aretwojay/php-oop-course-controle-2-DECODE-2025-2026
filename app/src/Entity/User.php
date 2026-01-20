<?php

namespace App\Entity;

class User {

    const TABLE_NAME = 'users';

    private ?int $id;
    private ?string $name;
    private ?string $email;
    private ?string $password;
    private ?string $created_at;

    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function getPassword(): ?string {
        return $this->password;
    }

    public function getCreatedAt(): ?string {
        return $this->created_at;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }
}
