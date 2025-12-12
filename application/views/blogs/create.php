<h1 class="text-2xl font-bold mb-4">Create Post</h1>

<form method="post">
    <label class="block mb-2">Title</label>
    <input type="text" name="title" class="border p-2 w-full mb-4" required>

    <label class="block mb-2">Content</label>
    <textarea name="content" class="border p-2 w-full mb-4" required></textarea>

    <button class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
</form>

<?php if (isset($_GET['success'])): ?>
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
    <?= htmlspecialchars($_GET['success']); ?>
</div>
<?php endif; ?>
