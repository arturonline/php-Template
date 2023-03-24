<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p><a href="/posts" class="text-blue-500 underline mb-6">Go back</a></p>
            <h3><?= htmlspecialchars($post['post_title']) ?></h3>
            <p><?= htmlspecialchars($post['post_body']) ?></p>
        </div>
    </main>

<?php require base_path("views/partials/foot.php") ?>