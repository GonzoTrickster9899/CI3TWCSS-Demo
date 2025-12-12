<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'CI3TWCSS Demo'; ?></title>

    <!-- Your local Tailwind output file -->
    <link rel="stylesheet" href="<?= base_url('/assets/css/output.css'); ?>">

    <!-- Modal styles -->
    <link rel="stylesheet" href="<?= base_url('/assets/css/modal.css'); ?>">
</head>

<body class="flex flex-col min-h-screen bg-gradient-to-br from-gray-50 via-gray-100 to-gray-200">
    <!-- Main content wrapper with flex-grow to push footer down -->
    <main class="flex-grow">