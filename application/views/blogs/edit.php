<h1 class="text-2xl font-bold mb-4">Edit Post</h1>

<form method="post">
    <label class="block mb-2">Title</label>
    <input type="text" name="title" value="<?= $post['title']; ?>" class="border p-2 w-full mb-4" required>

    <label class="block mb-2">Content</label>
    <textarea name="content" class="border p-2 w-full mb-4" required><?= $post['content']; ?></textarea>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>
