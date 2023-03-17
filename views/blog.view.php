<?php require("partials/head.php") ?>
<?php require("partials/nav.php") ?>
<?php require("partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <?php foreach ($posts as $post) : ?>
                <a href="/post?id=<?= $post['Id'] ?> ">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h2 class="text-2xl font-bold text-gray-800"><?= $post['Id'] ?></h2>
                            <p class="text-gray-600"><?= $post['Title'] ?></p>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </main>

<?php require("partials/foot.php") ?>