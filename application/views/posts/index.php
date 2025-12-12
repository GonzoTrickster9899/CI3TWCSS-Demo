<div class="container mx-auto px-4 py-8 max-w-6xl">
    <!-- Header Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">Posts App</h1>
            <a href="#create" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-lg shadow-md hover:from-blue-700 hover:to-blue-800 transform hover:scale-105 transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Create New Post
            </a>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-700 to-gray-800 text-white">
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Title</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Content</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($posts as $p): ?>
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4 text-gray-900 font-medium"><?= htmlspecialchars($p['title']); ?></td>
                        <td class="px-6 py-4 text-gray-600"><?= htmlspecialchars($p['content']); ?></td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center space-x-3">
                                <a href="#edit-<?= $p['id']; ?>" 
                                   class="inline-flex items-center px-3 py-1.5 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors duration-150 font-medium text-sm">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Edit
                                </a>
                                <a href="#delete-<?= $p['id']; ?>" 
                                   class="inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 rounded-md hover:bg-red-200 transition-colors duration-150 font-medium text-sm">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if (empty($posts)): ?>
                    <tr>
                        <td colspan="3" class="px-6 py-12 text-center text-gray-500">
                            <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            <p class="text-lg font-medium">No posts yet</p>
                            <p class="mt-1">Create your first post to get started!</p>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Load Create Modal -->
<?php $this->load->view('posts/modals/create'); ?>

<!-- Load Edit Modals -->
<?php foreach ($posts as $p): ?>
    <?php $this->load->view('posts/modals/edit', ['post' => $p]); ?>
<?php endforeach; ?>

<!-- Load Delete Modals -->
<?php foreach ($posts as $p): ?>
    <?php $this->load->view('posts/modals/delete', ['post' => $p]); ?>
<?php endforeach; ?>