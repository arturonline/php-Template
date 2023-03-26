<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p><a href="/posts" class="text-blue-500 underline mb-6">Go back</a></p>
            <h3><?= htmlspecialchars($post['post_title']) ?></h3>
            <p><?= htmlspecialchars($post['post_body']) ?></p>

            <footer class="mt-6">
                <a href="/posts/edit?id=<?= $post['post_id'] ?>" class="text-gray-500 bordeer border-current px-3 py-1 rounded">Edit</a>
            </footer>

            <form class="mt-6" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $post['post_id'] ?>">
                <button class="text-sm text-red-500 hover:text-red-700 underline">Delete</button>
            </form>
        </div>

    </main>

<?php require base_path("views/partials/foot.php") ?>