<!-- Create Modal -->
<div id="create" class="modal">
    <div class="modal-content">
        <a href="#" class="close">&times;</a>
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Create New Post</h2>
        <form id="create-form" method="post" action="<?= site_url('posts/create'); ?>" class="space-y-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
                <input type="text" name="title" id="create-title" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all" placeholder="Enter post title" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Content</label>
                <textarea name="content" id="create-content" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all resize-none" placeholder="Enter post content" required></textarea>
            </div>
            <div class="flex justify-end space-x-4 mt-6">
                <a href="#" class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300">Cancel</a>
                <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Create</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Handle create form submission
    document.getElementById('create-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        const formData = new FormData(form);
        
        // Submit via AJAX
        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Created Successfully!',
                    text: 'The post has been created successfully.',
                    confirmButtonColor: '#10b981',
                    timer: 2000,
                    timerProgressBar: true
                }).then(() => {
                    window.location.href = '<?= site_url('posts'); ?>';
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to create post. Please try again.',
                    confirmButtonColor: '#ef4444'
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'An error occurred. Please try again.',
                confirmButtonColor: '#ef4444'
            });
        });
    });
</script>