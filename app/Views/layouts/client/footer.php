</main>

<footer class="site-footer section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-12 mb-4 pb-2">
                <a class="navbar-brand mb-2" href="index.html">
                    <img src="/assets/admin/img/aikeone-logo.svg" class="official-logo" style="width: 25px;" />
                    <span>Aikeone</span>
                </a>
            </div>

            <div class="col-lg-6 col-md-8 col-12 mb-4 mb-lg-0">
                <h6 class="site-footer-title mb-3">Information</h6>

                <p class="text-white d-flex mb-1">
                    <a href="tel: 000-000-0000" class="site-footer-link">
                        000-000-0000
                    </a>
                </p>

                <p class="text-white d-flex">
                    <a href="mailto:emailaddresshere.com" class="site-footer-link">
                        emailaddresshere.com
                    </a>
                </p>
            </div>

            <div class="col-lg-3 col-md-4 col-12 ms-auto">
                <p class="copyright-text">Copyright © 2024 Aikeone.<br/>All rights reserved.</p>
            </div>

        </div>
    </div>
</footer>


<!-- JAVASCRIPT FILES -->
<script src="/assets/main/js/jquery.min.js"></script>
<script src="/assets/main/js/bootstrap.bundle.min.js"></script>
<script src="/assets/main/js/jquery.sticky.js"></script>
<!-- <script src="assets/main/js/click-scroll.js"></script> -->
<script src="/assets/main/js/custom.js"></script>
<script src="/assets/main/js/popper.js"></script>

<!-- scripts here -->
<?php if (!empty($js)) : ?>
    <?php foreach ($js as $key => $path) : ?>
        <script src="<?= base_url($path) ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>

</body>

</html>