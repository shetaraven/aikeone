    </main>
    <footer id="layout-footer">
        <p>&copy; <?= date('Y') ?> Aikeone. All rights reserved.</p>
    </footer>

    <!-- scripts here -->
    <script src="<?= base_url('assets/js/jquery-3.7.1.min.js') ?>"></script>
    <?php if (!empty($js)) : ?>
        <?php foreach ($js as $key => $path) : ?>
            <script src="<?= base_url($path) ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>