<!-- Edit Modal -->
<div id="edit-<?= $post['id']; ?>" class="modal">
    <div class="modal-content">
        <a href="#" class="close">&times;</a>
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Post</h2>
        <form method="post" action="<?= site_url('posts/edit/'.$post['id']); ?>" class="space-y-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
                <input type="text" name="title" value="<?= htmlspecialchars($post['title']); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Content</label>
                <textarea name="content" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all resize-none" required><?= htmlspecialchars($post['content']); ?></textarea>
            </div>
            <div class="flex justify-end space-x-3 pt-4">
                <a href="#" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors duration-150 font-medium">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-150 font-medium shadow-md">Update Post</button>
            </div>
        </form>
    </div>
</div>