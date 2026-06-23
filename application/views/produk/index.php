<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>

<div class="container-fluid">

<style>
:root{
    --cream:#F8F4E9;
    --cream-light:#FFFDF8;
    --cream-dark:#E6D7B8;

    --beige:#DCC9A3;
    --beige-dark:#B89B72;

    --gold:#C9A86A;
    --gold-dark:#A8854F;

    --brown:#8B7355;
}

body{
    background:#FAF8F3 !important;
}

/* HERO */
.page-hero{
    background:linear-gradient(
        135deg,
        var(--beige),
        var(--gold)
    );
    border-radius:16px;
    padding:22px 28px;
    color:#fff;
    margin-bottom:24px;
    position:relative;
    overflow:hidden;
}

.page-hero::before{
    content:"";
    position:absolute;
    width:160px;
    height:160px;
    background:rgba(255,255,255,.08);
    border-radius:50%;
    right:-40px;
    top:-60px;
}

.page-hero-content{
    position:relative;
    z-index:2;
}

/* CARD */
.card-modern{
    border:none;
    border-radius:16px;
    box-shadow:0 4px 14px rgba(0,0,0,.06);
}

.stat-card{
    border:none;
    border-radius:14px;
    box-shadow:0 4px 12px rgba(0,0,0,.06);
    transition:.2s;
}

.stat-card:hover{
    transform:translateY(-3px);
}

/* TABLE */
.table thead tr{
    background:linear-gradient(
        135deg,
        var(--beige),
        var(--gold)
    );
    color:#fff;
}

.table thead th{
    border:none!important;
    padding:13px 16px;
    font-size:12px;
    text-transform:uppercase;
    letter-spacing:.05em;
    font-weight:600;
}

.table tbody td{
    padding:13px 16px;
    vertical-align:middle;
    border-color:#f0f0f0;
}

.table tbody tr:hover{
    background:#FFFDF8;
}

/* BADGE */
.badge-stok-ok{
    background:var(--cream);
    color:var(--brown);
    border-radius:99px;
    padding:5px 12px;
    font-size:12px;
    font-weight:600;
}

.badge-stok-low{
    background:#F8E9D7;
    color:#A67C52;
    border-radius:99px;
    padding:5px 12px;
    font-size:12px;
    font-weight:600;
}

.kode-chip{
    background:#FFFDF8;
    border:1px solid var(--cream-dark);
    border-radius:8px;
    padding:4px 10px;
    font-size:12px;
    font-weight:600;
    color:var(--brown);
}

.avatar-produk{
    width:38px;
    height:38px;
    border-radius:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:700;
    font-size:14px;
    color:#fff;
    flex-shrink:0;
}

/* BUTTON */
.btn-green{
    background:var(--gold);
    color:#fff;
    border:none;
    border-radius:8px;
}

.btn-green:hover{
    background:var(--gold-dark);
    color:#fff;
}

.btn-edit{
    background:#FFF8EE;
    color:var(--gold-dark);
    border:1px solid var(--cream-dark);
    border-radius:8px;
    font-size:12px;
    padding:5px 12px;
}

.btn-edit:hover{
    background:var(--cream);
    color:var(--brown);
}

.btn-hapus{
    background:#FFF5F5;
    color:#C96A6A;
    border:1px solid #F2D8D8;
    border-radius:8px;
    font-size:12px;
    padding:5px 12px;
}

.alert{
    border:none;
    border-radius:12px;
}
</style>

<!-- ALERT -->
<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success alert-dismissible fade show shadow-sm">
    <i class="fas fa-check-circle mr-2"></i>
    <?= $this->session->flashdata('success') ?>
    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
</div>
<?php endif; ?>

<!-- PAGE HERO -->
<div class="page-hero">
    <div class="page-hero-content d-flex justify-content-between align-items-center">
        <div>
            <h5 class="font-weight-bold mb-1">
                <i class="fas fa-box mr-2"></i> Data Produk
            </h5>
            <p class="mb-0" style="opacity:.85; font-size:13px;">
                Kelola seluruh data produk elektronik PT Maju Jaya
            </p>
        </div>
        <a href="<?= site_url('produk/tambah') ?>"class="btn btn-sm font-weight-bold"style="background:var(--cream-light);color:var(--brown);border-radius:10px;padding:8px 18px;">
            <i class="fas fa-plus mr-1" style="color:var(--gold);"></i> Tambah Produk
        </a>
    </div>
</div>

<!-- STAT CARDS -->
<div class="row mb-4">
    <?php
        $total  = count($produk);
        $ok     = count(array_filter((array)$produk, function($p){ return $p->stok >= 5; }));
        $tipis  = $total - $ok;
    ?>
    <div class="col-md-4 mb-3">
        <div class="card stat-card" style="border-left: 4px solid var(--brown);">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        <div style="width:44px;height:44px;border-radius:12px;background:var(--brown-light);
                                    display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-box" style="color:var(--brown);font-size:18px;"></i>
                        </div>
                    </div>
                    <div>
                        <div style="font-size:11px;font-weight:700;color:var(--brown);text-transform:uppercase;letter-spacing:.05em;">
                            Total Produk
                        </div>
                        <div class="h4 mb-0 font-weight-bold"><?= $total ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card stat-card" style="border-left: 4px solid var(--beige);">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        <div style="width:44px;height:44px;border-radius:12px;background:#F8F4E9;display:flex;align-items:center;justify-content:center;"><i class="fas fa-check-circle"style="color:#C9A86A;font-size:18px;"></i>
                        </div>
                    </div>
                    <div>
                        <div style="font-size:11px;font-weight:700;color::#8B7355;text-transform:uppercase;letter-spacing:.05em;">
                            Stok Cukup
                        </div>
                        <div class="h4 mb-0 font-weight-bold"><?= $ok ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card stat-card" style="border-left: 4px solid var(--gold);">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        <div style="width:44px;height:44px;border-radius:12px;background:var(--gold-light);
                                    display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-exclamation-triangle" style="color:var(--gold);font-size:18px;"></i>
                        </div>
                    </div>
                    <div>
                        <div style="font-size:11px;font-weight:700;color:var(--gold-dark);text-transform:uppercase;letter-spacing:.05em;">
                            Stok Menipis
                        </div>
                        <div class="h4 mb-0 font-weight-bold"><?= $tipis ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- TABLE -->
<div class="card card-modern">
    <div class="card-header bg-white border-0 py-3 px-4 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 font-weight-bold" style="color:var(--gold-dark);">
            <i class="fas fa-list mr-2" style="color:var(--gold);"></i> Daftar Produk
        </h6>
        <span class="badge" style="background:var(--green-light);color:var(--green-dark);border-radius:99px;padding:5px 12px;font-size:12px;">
            <?= $total ?> produk
        </span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="dataTable">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Kode</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th class="text-center">Stok</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $avatar_colors = ['#DCC9A3','#C9A86A','#B89B72','#A8854F','#8B7355','#E6D7B8'];
                $no = 1;
                foreach ($produk as $i => $p):
                    $warna = $avatar_colors[$i % count($avatar_colors)];
                ?>
                <tr>
                    <td class="text-muted small"><?= $no++ ?></td>
                    <td>
                        <span class="kode-chip">
                            <i class="fas fa-barcode mr-1"></i><?= $p->kode_produk ?>
                        </span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="avatar-produk mr-2" style="background:<?= $warna ?>;">
                                <?= strtoupper(substr($p->nama_produk, 0, 1)) ?>
                            </div>
                            <span style="font-weight:500; color:#2d3748;"><?= $p->nama_produk ?></span>
                        </div>
                    </td>
                    <td>
                        <span class="font-weight-bold" style="color:#2d3748;">
                            Rp <?= number_format($p->harga, 0, ',', '.') ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <?php if ($p->stok < 5): ?>
                        <span class="badge-stok-low">
                            <i class="fas fa-circle mr-1" style="font-size:7px;"></i><?= $p->stok ?>
                        </span>
                        <?php else: ?>
                        <span class="badge-stok-ok">
                            <i class="fas fa-circle mr-1" style="font-size:7px;"></i><?= $p->stok ?>
                        </span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <a href="<?= site_url('produk/edit/'.$p->id) ?>" class="btn btn-edit btn-sm mr-1">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <a href="<?= site_url('produk/hapus/'.$p->id) ?>"
                           class="btn btn-hapus btn-sm"
                           onclick="return confirm('Yakin ingin menghapus produk ini?')">
                            <i class="fas fa-trash mr-1"></i> Hapus
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<?php $this->load->view('templates/footer'); ?>