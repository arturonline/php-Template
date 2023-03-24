<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl my-6 py-8 sm:px-6 lg:px-8 bg-slate-50">
            <form method="POST">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive
                            mail.</p>

                        <div class="mt-10 grid grid-cols-1 gap-y-8 gap-x-6 sm:grid-cols-4">
                            <div class="sm:col-span-4">
                                <label for="title"
                                       class="block text-sm font-medium leading-6 text-gray-900">Titulo</label>
                                <div class="mt-2">
                                    <input type="text" name="title" id="title"
                                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                           value="<?= $_POST['title'] ?? '' ?>">
                                    <?php if (isset($errors['title'])): ?>
                                        <p class="text-red-500 text-xs italic mt-2">
                                            <?= $errors['title'] ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Descripción</label>
                                <div class="mt-2">
                                    <input id="description" name="description" type="text"
                                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                           value="<?= $_POST['description'] ?? '' ?>">
                                    <?php if (isset($errors['description'])): ?>
                                        <p class="text-red-500 text-xs italic mt-2">
                                            <?= $errors['description'] ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-span-4">
                                <label for="body"
                                       class="block text-sm font-medium leading-6 text-gray-900">Contenido</label>
                                <div class="mt-2">
                                    <textarea id="body" name="body" rows="16"
                                              class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"
                                    >
                                        <?= $_POST['body'] ?? '' ?>
                                    </textarea>
                                    <?php if (isset($errors['body'])): ?>
                                        <p class="text-red-500 text-xs italic mt-2">
                                            <?= $errors['body'] ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-span-4 mt-6 flex items-center justify-end gap-x-6">
                                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel
                                </button>
                                <button type="submit"
                                        class="rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            </form>

        </div>
    </main>

<?php require base_path("views/partials/foot.php") ?>