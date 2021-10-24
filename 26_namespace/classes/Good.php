<?php

namespace Guestbook\classes;

final class Good extends Model
{
    private string $table = 'goods';

    /**
     * @return array
     */
    public function getAll(): array
    {
        $stmt = $this->connection->prepare("SELECT * FROM $this->table");
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
