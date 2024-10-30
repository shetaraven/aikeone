</div>
                            <!-- / Layout page -->
                        </div>

                        <!-- Overlay -->
                        <div class="layout-overlay layout-menu-toggle"></div>
                    </div>
    </main>

    <footer id="layout-footer">
        <p>&copy; <?= date('Y') ?> Aikeone. All rights reserved.</p>
    </footer>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="<?= base_url('assets/admin/vendor/libs/jquery/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/libs/popper/popper.js') ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/js/menu.js') ?>"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= base_url('assets/admin/vendor/libs/apex-charts/apexcharts.js') ?>"></script>

    <!-- Main JS -->
    <script src="<?= base_url('assets/admin/js/main.js') ?>"></script>

    <!-- Page JS -->
    <script src="<?= base_url('assets/admin/js/dashboards-analytics.js') ?>"></script>

    <!-- scripts here -->
    <?php if (!empty($js)) : ?>
        <?php foreach ($js as $key => $path) : ?>
            <script src="<?= base_url($path) ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>