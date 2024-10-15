<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aikeone | <?= $title ?? 'Set Title' ?></title>

    <!-- css here -->
    <link rel="stylesheet" href="<?= base_url('assets/css/layout.css') ?>">
    <?php if (!empty($css)) : ?>
        <?php foreach ($css as $key => $path) : ?>
            <link rel="stylesheet" href="<?= base_url($path) ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>

<body>
    <main>