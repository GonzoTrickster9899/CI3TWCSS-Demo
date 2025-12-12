<!-- Create Modal -->
<div id="create" class="modal">
    <div class="modal-content">
        <a href="#" class="close">&times;</a>
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Create New Post</h2>
        <form method="post" action="<?= site_url('posts/create'); ?>" class="space-y-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
                <input type="text" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all" placeholder="Enter post title" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Content</label>
                <textarea name="content" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all resize-none" placeholder="Enter post content" required></textarea>
            </div>
            <div class="flex justify-end space-x-3 pt-4">
                <a href="#" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors duration-150 font-medium">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-lg hover:from-green-700 hover:to-green-800 transition-all duration-150 font-medium shadow-md">Save Post</button>
            </div>
        </form>
    </div>
</div>