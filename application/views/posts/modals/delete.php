<!-- Delete Modal -->
<div id="delete-<?= $post['id']; ?>" class="modal">
    <div class="modal-content modal-sm">
        <a href="#" class="close">&times;</a>
        <h2 class="text-xl font-bold mb-4">Delete Post</h2>
        <p>Are you sure you want to delete this post?</p>
        <div class="flex justify-end space-x-4 mt-6">
            <a href="#" class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300">Cancel</a>
            <a href="<?= site_url('posts/delete/' . $post['id']); ?>" class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700">Delete</a>
        </div>
    </div>
</div>