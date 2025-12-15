<!-- Delete Confirmation Modal -->
<div id="delete-<?= $blog['id']; ?>" class="modal">
    <div class="modal-content modal-sm">
        <a href="#" class="close">&times;</a>
        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-100 mb-4">
                <svg class="h-10 w-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Delete blog</h2>
            <p class="text-gray-600 mb-6">Are you sure you want to delete "<strong><?= htmlspecialchars($blog['title']); ?></strong>"? This action cannot be undone.</p>
            <div class="flex justify-center space-x-3">
                <a href="#" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors duration-150 font-medium">Cancel</a>
                <a href="<?= site_url('blogs/delete/'.$blog['id']); ?>" class="px-6 py-2 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg hover:from-red-700 hover:to-red-800 transition-all duration-150 font-medium shadow-md">Delete blog</a>
            </div>
        </div>
    </div>
</div>