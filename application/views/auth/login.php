<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Local Tailwind CSS (v3.4.17) -->
    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">
</head>

<body class="min-h-screen flex items-center justify-center
             bg-slate-100 dark:bg-slate-950
             transition-colors duration-300">

<!-- Container -->
<div class="relative w-full max-w-md mx-4
            rounded-2xl bg-white dark:bg-slate-900
            shadow-xl p-8">

    <!-- 🌗 Dark Mode Toggle -->
    <button
        type="button"
        onclick="toggleTheme()"
        class="absolute top-4 right-4
               flex items-center justify-center
               h-10 w-10 rounded-full
               bg-slate-200 dark:bg-slate-800
               text-slate-700 dark:text-slate-200
               hover:bg-slate-300 dark:hover:bg-slate-700
               transition"
        aria-label="Toggle dark mode"
    >
        <!-- Sun -->
        <svg class="h-5 w-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 3v1m0 16v1m8.66-10H21M3 12H2
                     m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707
                     m12.728 0l-.707.707M6.343 17.657l-.707.707
                     M12 8a4 4 0 100 8 4 4 0 000-8z"/>
        </svg>

        <!-- Moon -->
        <svg class="h-5 w-5 dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 12.79A9 9 0 1111.21 3
                     7 7 0 0021 12.79z"/>
        </svg>
    </button>

    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
            Welcome Back
        </h1>
        <p class="text-slate-500 dark:text-slate-400 mt-1">
            Sign in to your account
        </p>
    </div>

    <!-- Error -->
    <?php if (!empty($error)): ?>
        <div class="mb-5 rounded-lg
                    bg-red-100 dark:bg-red-900/40
                    text-red-700 dark:text-red-300
                    px-4 py-3 text-sm">
            <?= $error; ?>
        </div>
    <?php endif; ?>

    <!-- Form -->
    <form method="post" class="space-y-5">

        <!-- Username -->
        <div>
            <label class="block text-sm font-medium
                          text-slate-700 dark:text-slate-300 mb-1">
                Username
            </label>
            <input
                type="text"
                name="username"
                required
                class="w-full rounded-lg
                       border border-slate-300 dark:border-slate-700
                       bg-white dark:bg-slate-800
                       text-slate-800 dark:text-white
                       px-4 py-3
                       focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
        </div>

        <!-- Password -->
        <div>
            <label class="block text-sm font-medium
                          text-slate-700 dark:text-slate-300 mb-1">
                Password
            </label>
            <input
                type="password"
                name="password"
                required
                class="w-full rounded-lg
                       border border-slate-300 dark:border-slate-700
                       bg-white dark:bg-slate-800
                       text-slate-800 dark:text-white
                       px-4 py-3
                       focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
        </div>

        <!-- Submit -->
        <button
            type="submit"
            class="w-full h-12
                   flex items-center justify-center
                   rounded-lg
                   bg-indigo-600 hover:bg-indigo-700
                   text-white font-semibold
                   transition shadow-md"
        >
            Sign In
        </button>

    </form>

    <div class="mt-6 text-center text-sm text-slate-500 dark:text-slate-400">
        © <?= date('Y'); ?> CodeIgniter App
    </div>
</div>

<!-- 🌗 Dark Mode Logic -->
<script>
(function () {
    const theme = localStorage.getItem('theme');

    if (theme === 'dark' ||
       (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    }
})();

function toggleTheme() {
    const html = document.documentElement;
    const isDark = html.classList.contains('dark');

    html.classList.toggle('dark', !isDark);
    localStorage.setItem('theme', isDark ? 'light' : 'dark');
}
</script>

</body>
</html>
