<?php

namespace App\Repository;

use App\Lib\Abstract\AbstractRepository;
use App\Entity\Post;

class PostRepository extends AbstractRepository {

	public function find(int $id) {
		return $this->readOne(Post::class, [ 'id' => $id ]);
	}

    public function findMany(array $filters = [], array $order = [], int $limit = 10, int $offset = 0, array $joins = [
          ['table' => 'users', 'condition' => 'users.id = posts.user_id']
    ]): array {
        return $this->readMany(Post::class, $filters, $order, $limit, $offset, $joins);
    }
     

}