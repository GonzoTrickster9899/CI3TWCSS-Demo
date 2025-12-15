<!-- Edit Modal -->
<div id="edit-<?= $post['id']; ?>" class="modal">
    <div class="modal-content">
        <a href="#" class="close">&times;</a>
        <h2 class="text-xl font-bold mb-4">Edit Post</h2>
        <form action="<?= site_url('posts/edit/' . $post['id']); ?>" method="post">
            <div class="mb-4">
                <label for="title-<?= $post['id']; ?>" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title-<?= $post['id']; ?>" value="<?= htmlspecialchars($post['title']); ?>" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="content-<?= $post['id']; ?>" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" id="content-<?= $post['id']; ?>" rows="4" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"><?= htmlspecialchars($post['content']); ?></textarea>
            </div>
            <div class="flex justify-end space-x-4 mt-6">
                <a href="#" class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300">Cancel</a>
                <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</div>