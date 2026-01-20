<?php
session_start();

function getDbConnexion(): PDO {
    $host = 'php-oop-exercice-db';
    $db = 'blog';
    $user = 'root';
    $password = 'password';

    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

    return new PDO($dsn, $user, $password);
}

function isLoggedIn(): bool {
    return isset($_SESSION['user_id']);
}

function getPage(): int {
    return $_GET['page'] ?? 1;
}

function getLimit(): int {
    return $_GET['limit'] ?? 10;
}


function getPostsCount(): int {
    $sql = "SELECT COUNT(*) FROM posts";
    $stmt = getDbConnexion()->query($sql);
    $count = $stmt->fetchColumn();

    return $count;
}

function getPagination(): array {
    $postsCount = getPostsCount();
    $postsPerPage = getLimit();
    $pagesCount = ceil($postsCount / $postsPerPage);

    return [
        'pagesCount' => $pagesCount,
        'currentPage' => getPage(),
    ];
}


?>

<div class="flex flex-col min-h-full w-full items-center justify-start">
    <div class="flex flex-col w-11/12 items-center justify-start">
        <h1 class="text-4xl">Wonderful blog</h1>
        <div class="flex flex-col w-full items-center justify-start space-y-4">
            <?php foreach($posts as $post): ?>
                <div class="flex flex-col w-full items-center justify-start border border-gray-300 p-4">
                    <a href="/blogs/index.php?id=<?= $post->getId() ?>" class="text-2xl"><?= $post->getTitle() ?></a>
                    <a href="/users.php?id=<?= $post->getUserId() ?>" class="p">By <?= $post->getUserId() ?></a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="flex flex-row w-full items-center justify-center space-x-4">
            <?php for ($i = 1; $i <= getPagination()['pagesCount']; $i++): ?>
                <?php if($i !== getPage()): ?>
                    <a href="/?page=<?= $i ?>" class="text-xl underline text-gray"><?= $i ?></a>
                <?php else: ?>
                    <p class="text-2xl font-bold text-black"><?= $i ?></p>
                <? endif; ?>
            <?php endfor; ?>
        </div>
    </div>
</div>        