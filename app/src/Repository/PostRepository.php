<?php

namespace App\Repository;

use App\Lib\Abstract\AbstractRepository;
use App\Entity\Post;

class PostRepository extends AbstractRepository {

	public function find(int $id) {
		return $this->readOne(Post::class, [ 'id' => $id ]);
	}

}