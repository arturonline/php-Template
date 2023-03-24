<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <?php foreach ($posts as $post) : ?>
                <a href="/post?id=<?= $post['post_id'] ?>">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h2 class="text-2xl font-bold text-gray-800"><?= $post['post_id'] ?></h2>
                            <p class="text-gray-600"><?= htmlspecialchars($post['post_title']) ?></p>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        <p class="mt-6">
            <a href="/posts/create" class="text-blue-500 hover:underline">Create Post</a>
        </p>
        </div>
    </main>

<?php require base_path("views/partials/foot.php") ?>