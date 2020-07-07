<?php

namespace App\Users;

use Core\DataHolder;

class User extends DataHolder
{
    protected function setUsername(string $value): void
    {
        $this->userName = $value;
    }

    protected function getUsername(): ?string
    {
        return $this->userName ?? null;
    }

    protected function setSurname(string $value): void
    {
        $this->surname = $value;
    }

    protected function getSurname(): ?string
    {
        return $this->surname ?? null;
    }

    protected function setPhone(string $value): void
    {
        $this->phone = $value;
    }

    protected function getPhone(): ?string
    {
        return $this->phone ?? null;
    }

    protected function setAddress(string $value): void
    {
        $this->address = $value;
    }

    protected function getAddress(): ?string
    {
        return $this->address ?? null;
    }

    protected function setEmail(string $value): void
    {
        $this->email = $value;
    }

    /**
     * @return string|null
     */
    protected function getEmail(): ?string
    {
        return $this->email ?? null;
    }

    protected function setPassword(string $value): void
    {
        $this->password = $value;
    }

    protected function getPassword(): ?string
    {
        return $this->password ?? null;
    }

    protected function getId()
    {
        return $this->id ?? null;
    }

    protected function setId(int $id)
    {
        $this->id = $id;
    }

}