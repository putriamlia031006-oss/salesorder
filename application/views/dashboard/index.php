<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>

<div class="container-fluid">

<style>
    /* === WARNA TEMA: CREAM ELEGANT === */
    :root {
        --cream:        #F8F4E9;
        --cream-dark:   #E8DFC8;
        --cream-light:  #FFFDF8;

        --beige:        #DCC9A3;
        --beige-dark:   #C4A373;

        --gold:         #BFA26A;
        --gold-light:   #EADFC5;

        --brown:        #8B7355;
        --brown-light:  #A68A64;

        --soft-bg:      #FAF8F3;
    }

    body{
        background-color: var(--soft-bg) !important;
    }

    /* HERO */
    .hero-card{
        background: linear-gradient(
            135deg,
            var(--beige),
            var(--gold)
        );
        border-radius:18px;
        padding:28px 32px;
        color:#fff;
        margin-bottom:24px;
        position:relative;
        overflow:hidden;
        box-shadow:0 8px 25px rgba(0,0,0,.08);
    }

    .hero-card::before{
        content:"";
        position:absolute;
        width:200px;
        height:200px;
        background:rgba(255,255,255,.12);
        border-radius:50%;
        right:-50px;
        top:-80px;
    }

    .hero-card::after{
        content:"";
        position:absolute;
        width:140px;
        height:140px;
        background:rgba(255,255,255,.08);
        border-radius:50%;
        right:80px;
        bottom:-60px;
    }

    .hero-content{
        position:relative;
        z-index:2;
    }

    /* STAT CARD */
    .stat-card{
        border:none;
        border-radius:14px;
        transition:.25s;
        box-shadow:0 4px 14px rgba(0,0,0,.06);
        background:#fff;
    }

    .stat-card:hover{
        transform:translateY(-3px);
    }

    .stat-1{
        border-left:4px solid var(--gold) !important;
    }

    .stat-2{
        border-left:4px solid var(--brown-light) !important;
    }

    .stat-3{
        border-left:4px solid var(--beige-dark) !important;
    }

    .stat-4{
        border-left:4px solid #D2B48C !important;
    }

    .ic-1{
        color:var(--gold);
    }

    .ic-2{
        color:var(--brown-light);
    }

    .ic-3{
        color:var(--beige-dark);
    }

    .ic-4{
        color:#D2B48C;
    }

    .lbl-1{
        color:var(--gold);
    }

    .lbl-2{
        color:var(--brown-light);
    }

    .lbl-3{
        color:var(--beige-dark);
    }

    .lbl-4{
        color:#D2B48C;
    }

    /* CARD MENU */
    .menu-card{
        border:none;
        border-radius:16px;
        box-shadow:0 4px 14px rgba(0,0,0,.06);
        transition:.25s;
        height:100%;
        background:#fff;
    }

    .menu-card:hover{
        transform:translateY(-4px);
        box-shadow:0 8px 20px rgba(0,0,0,.1);
    }

    .menu-icon-wrap{
        width:62px;
        height:62px;
        border-radius:16px;
        display:flex;
        align-items:center;
        justify-content:center;
        margin:0 auto 14px;
        font-size:26px;
        background:var(--cream);
    }

    /* BUTTON */
    .btn-cream{
        background:var(--gold);
        color:#fff;
        border:none;
        border-radius:8px;
    }

    .btn-cream:hover{
        background:var(--beige-dark);
        color:#fff;
    }

    .btn-beige{
        background:var(--beige);
        color:#fff;
        border:none;
        border-radius:8px;
    }

    .btn-beige:hover{
        background:var(--brown-light);
        color:#fff;
    }

    /* CARD HEADER */
    .card-header{
        background:var(--cream-light) !important;
        border-bottom:1px solid var(--cream-dark);
    }

    .card-header h6{
        color:var(--brown);
    }

    /* PROGRESS */
    .progress{
        height:10px;
        border-radius:20px;
        background:#eee;
    }

    .progress-bar{
        border-radius:20px;
    }

    .bg-success{
        background:var(--gold) !important;
    }

    .bg-info{
        background:var(--beige-dark) !important;
    }

    .bg-warning{
        background:var(--brown-light) !important;
    }
</style>

<!-- HERO -->
<div class="hero-card">
    <div class="hero-content">
        <p class="mb-1" style="opacity:.8; font-size:13px;">
            <i class="fas fa-circle mr-1" style="color:#a8f0d4; font-size:9px;"></i>
            <?= date('l, d F Y') ?>
        </p>
        <h4 class="font-weight-bold mb-1">
            Selamat Datang, <?= $nama ?>!
        </h4>
        <p class="mb-0" style="opacity:.85; font-size:13px;">
            Anda login sebagai
            <span style="background:rgba(255,255,255,.22); padding:2px 12px; border-radius:99px; font-weight:600;">
                <?= ucfirst($role) ?>
            </span>
        </p>
    </div>
</div>

<!-- STAT CARDS (admin only) -->
<?php if ($role == 'admin'): ?>
<div class="row mb-4">

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card stat-card stat-1 py-2">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        <i class="fas fa-file-invoice fa-2x ic-1"></i>
                    </div>
                    <div>
                        <div class="text-xs font-weight-bold lbl-1 text-uppercase mb-1">Total Order</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_order ?? 0 ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card stat-card stat-2 py-2">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        <i class="fas fa-check-circle fa-2x ic-2"></i>
                    </div>
                    <div>
                        <div class="text-xs font-weight-bold lbl-2 text-uppercase mb-1">Order Selesai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $order_selesai ?? 0 ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card stat-card stat-3 py-2">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        <i class="fas fa-box fa-2x ic-3"></i>
                    </div>
                    <div>
                        <div class="text-xs font-weight-bold lbl-3 text-uppercase mb-1">Total Produk</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_produk ?? 0 ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card stat-card stat-4 py-2">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        <i class="fas fa-users fa-2x ic-4"></i>
                    </div>
                    <div>
                        <div class="text-xs font-weight-bold lbl-4 text-uppercase mb-1">Total Pelanggan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pelanggan ?? 0 ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php endif; ?>

<!-- MENU CARDS -->
<div class="row">

    <div class="col-lg-6 mb-4">

        <div class="card shadow border-0 h-100">

            <div class="card-header bg-white">
                <h6 class="m-0 font-weight-bold text-1">
                    Aktivitas Sistem
                </h6>
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <strong>Dashboard berhasil dimuat</strong>
                    <br>
                    <small class="text-muted">
                        Sistem Sales Order aktif
                    </small>
                </div>

                <div class="mb-3">
                    <strong><?= $total_produk ?? 0 ?> Produk tersedia</strong>
                    <br>
                    <small class="text-muted">
                        Data produk berhasil dimuat
                    </small>
                </div>

                <div class="mb-3">
                    <strong><?= $total_order ?? 0 ?> Order tercatat</strong>
                    <br>
                    <small class="text-muted">
                        Total transaksi sales order
                    </small>
                </div>

                <div>
                    <strong><?= $order_selesai ?? 0 ?> Order selesai</strong>
                    <br>
                    <small class="text-muted">
                        Order berhasil diproses
                    </small>
                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-6 mb-4">

        <div class="card shadow border-0 h-100">

            <div class="card-header bg-white">
                <h6 class="m-0 font-weight-bold text-1">
                    Ringkasan Data
                </h6>
            </div>

            <div class="card-body">

                <p class="mb-2">
                    Produk
                </p>

                <div class="progress mb-4">
                    <div class="progress-bar bg-success"
                         style="width:85%">
                        85%
                    </div>
                </div>

                <p class="mb-2">
                    Pelanggan
                </p>

                <div class="progress mb-4">
                    <div class="progress-bar bg-info"
                         style="width:70%">
                        70%
                    </div>
                </div>

                <p class="mb-2">
                    Sales Order
                </p>

                <div class="progress">
                    <div class="progress-bar bg-warning"
                         style="width:90%">
                        90%
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

<?php $this->load->view('templates/footer'); ?>