<?php

namespace App\Structural\DataMapper;


class UserMapper
{

    public function __construct(private readonly string $fileName)
    {
    }

    public function findById($id): ?User
    {
        $users = $this->loadUsers();
        foreach ($users as $user) {
            if ($user['id'] === $id) {
                return $this->createUserObject($user);
            }
        }

        return null;
    }

    public function save(User $user): void
    {
        $users = $this->loadUsers();
        $lastUserId = end($users)['id'];
        $userArray = $this->convertUserToArray($user, $lastUserId + 1);
        $users[] = $userArray;
        $this->saveUsers($users);
    }

    private function loadUsers()
    {
        if (!file_exists($this->fileName)) {
            echo "File doesn't exist";
            return [];
        }

        $usersData = file_get_contents($this->fileName);
        return unserialize($usersData);
    }

    private function saveUsers($users): void
    {
        file_put_contents($this->fileName, serialize($users));
    }

    private function createUserObject($userArray): User
    {
        $user = new User();
        $user->setId($userArray['id']);
        $user->setName($userArray['name']);
        $user->setEmail($userArray['email']);

        return $user;
    }

    private function convertUserToArray(User $user, $id): array
    {
        return [
            'id' => $id,
            'name' => $user->getName(),
            'email' => $user->getEmail()
        ];
    }
}