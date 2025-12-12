<div class="max-w-4xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-4">Blogs</h1>

    <a href="<?= site_url('blogs/create'); ?>" class="text-3xl font-bold mb-4 text-gray-800"">Create New</a>

    <table class="w-full mt-4 border">
        <tr class="bg-gray-200">
            <th class="p-2">Title</th>
            <th class="p-2">Content</th>
            <th class="p-2">Actions</th>
        </tr>

        <?php foreach ($blogs as $p): ?>
        <tr class="border-t">
            <td class="p-2"><?= $p['title']; ?></td>
            <td class="p-2"><?= $p['content']; ?></td>
            <td class="p-2">
                <a href="<?= site_url('blogs/edit/'.$p['id']); ?>" class="text-blue-600">Edit</a> |
                <a href="<?= site_url('blogs/delete/'.$p['id']); ?>" class="text-red-600"
                onclick="return confirm('Delete this post?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
