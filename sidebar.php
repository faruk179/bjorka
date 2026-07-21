<?php include_once __DIR__.'/../config/base_url.php'; ?>

<div class="col-md-2 p-0">

    <div class="bg-white min-vh-100 border-end">

        <div class="list-group rounded-0">

            <a href="<?= $base_url ?>dashboard.php"
               class="list-group-item list-group-item-action">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>

            <a href="<?= $base_url ?>kategori/index.php"
               class="list-group-item list-group-item-action">
                <i class="bi bi-tags"></i>
                Kategori
            </a>

            <a href="<?= $base_url ?>produk/index.php"
               class="list-group-item list-group-item-action">
                <i class="bi bi-box-seam"></i>
                Produk
            </a>

            <a href="<?= $base_url ?>kasir/index.php"
               class="list-group-item list-group-item-action">
                <i class="bi bi-cart"></i>
                Kasir
            </a>

            <a href="<?= $base_url ?>laporan/index.php"
               class="list-group-item list-group-item-action">
                <i class="bi bi-file-earmark-text"></i>
                Laporan
            </a>

            <?php if($_SESSION['role']=='admin'){ ?>

            <a href="<?= $base_url ?>users/index.php"
               class="list-group-item list-group-item-action">
                <i class="bi bi-people"></i>
                User
            </a>

            <a href="<?= $base_url ?>pengaturan/index.php"
               class="list-group-item list-group-item-action">
                <i class="bi bi-gear"></i>
                Pengaturan
            </a>

            <?php } ?>

        </div>

    </div>

</div>