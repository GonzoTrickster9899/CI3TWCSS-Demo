<nav class="bg-white shadow-lg border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            
            <!-- Logo/Brand -->
            <div class="flex-shrink-0">
                <a href="<?= site_url('posts'); ?>" class="flex items-center">
                    <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">
                        CI3TWCSS
                    </span>
                    <span class="ml-2 text-sm text-gray-500 hidden sm:inline">Demo</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="<?= site_url('posts'); ?>" 
                   class="px-4 py-2 rounded-lg text-gray-700 font-medium hover:bg-blue-50 hover:text-blue-600 transition duration-200 ease-in-out">
                    Posts
                </a>
                <a href="<?= site_url('blogs'); ?>" 
                   class="px-4 py-2 rounded-lg text-gray-700 font-medium hover:bg-blue-50 hover:text-blue-600 transition duration-200 ease-in-out">
                    Blogs
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button type="button" id="mobile-menu-button" 
                        class="inline-flex items-center justify-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 transition duration-200"
                        aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Hamburger icon -->
                    <svg id="menu-open-icon" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Close icon -->
                    <svg id="menu-close-icon" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="<?= site_url('blogs'); ?>" 
               class="block px-4 py-3 rounded-lg text-gray-700 font-medium hover:bg-blue-50 hover:text-blue-600 transition duration-200">
                Blogs
            </a>
            <a href="<?= site_url('posts'); ?>" 
               class="block px-4 py-3 rounded-lg text-gray-700 font-medium hover:bg-blue-50 hover:text-blue-600 transition duration-200">
                Posts
            </a>
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuOpenIcon = document.getElementById('menu-open-icon');
    const menuCloseIcon = document.getElementById('menu-close-icon');

    if (menuButton && mobileMenu && menuOpenIcon && menuCloseIcon) {
        menuButton.addEventListener('click', function() {
            const isExpanded = menuButton.getAttribute('aria-expanded') === 'true';
            
            // Toggle menu visibility
            mobileMenu.classList.toggle('hidden');
            
            // Toggle icons
            menuOpenIcon.classList.toggle('hidden');
            menuCloseIcon.classList.toggle('hidden');
            
            // Update aria-expanded
            menuButton.setAttribute('aria-expanded', !isExpanded);
        });

        // Close mobile menu when clicking on a link
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
                menuOpenIcon.classList.remove('hidden');
                menuCloseIcon.classList.add('hidden');
                menuButton.setAttribute('aria-expanded', 'false');
            });
        });

        // Close mobile menu when resizing to desktop view
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) {
                mobileMenu.classList.add('hidden');
                menuOpenIcon.classList.remove('hidden');
                menuCloseIcon.classList.add('hidden');
                menuButton.setAttribute('aria-expanded', 'false');
            }
        });
    }
});
</script>