<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>

<div class="container-fluid">

<style>
:root{
    --cream: #F8F4E9;
    --cream-dark: #E8DFC9;
    --cream-light: #FFFDF8;

    --brown: #8B7355;
    --brown-dark: #6D5B45;

    --gold: #C8A97E;
    --gold-dark: #B08D57;
}

body{
    background-color:#FAF8F3 !important;
}

/* HERO */
.page-hero{
    background:linear-gradient(135deg,var(--gold),var(--brown));
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
.card-modern,
.filter-card{
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

/* FORM */
.form-control{
    border-radius:10px;
    border:1px solid #E5DCC7;
    padding:9px 14px;
}
.form-control:focus{
    border-color:var(--gold);
    box-shadow:0 0 0 3px rgba(200,169,126,.15);
}

label{
    font-weight:600;
    font-size:12px;
    color:var(--brown);
}

/* TABLE */
.table thead tr{
    background:linear-gradient(135deg,var(--gold),var(--brown));
    color:#fff;
}

.table thead th{
    border:none !important;
    padding:13px 16px;
    font-size:12px;
    text-transform:uppercase;
    letter-spacing:.05em;
    font-weight:600;
}

.table tbody td{
    padding:13px 16px;
    vertical-align:middle;
    border-color:#F0ECE3;
}

.table tbody tr:hover{
    background:var(--cream-light);
}

.table tfoot td,
.table tfoot th{
    background:var(--cream);
    color:var(--brown);
    font-weight:700;
    border:none;
}

/* CHIP */
.no-order-chip{
    background:var(--cream);
    color:var(--brown);
    border-radius:8px;
    padding:4px 10px;
    font-size:12px;
    font-weight:700;
}

/* BADGE */
.badge-selesai{
    background:#EDE3D1;
    color:var(--brown-dark);
    border-radius:99px;
    padding:5px 12px;
    font-size:12px;
    font-weight:600;
}

.badge-dikirim{
    background:var(--cream);
    color:var(--brown);
    border-radius:99px;
    padding:5px 12px;
    font-size:12px;
    font-weight:600;
}

/* BUTTON */
.btn-filter{
    background:var(--gold);
    color:#fff;
    border:none;
    border-radius:10px;
    padding:9px 20px;
    font-weight:600;
}

.btn-filter:hover{
    background:var(--gold-dark);
    color:#fff;
}

.btn-pdf{
    background:var(--cream);
    color:var(--brown);
    border:1px solid var(--cream-dark);
    border-radius:10px;
    padding:9px 20px;
    font-weight:600;
}

.btn-pdf:hover{
    background:var(--brown);
    color:#fff;
}

.alert{
    border:none;
    border-radius:12px;
}
</style>

<!-- PAGE HERO -->
<div class="page-hero">
    <div class="page-hero-content">
        <h5 class="font-weight-bold mb-1">
            <i class="fas fa-chart-bar mr-2"></i> Laporan Penjualan
        </h5>
        <p class="mb-0" style="opacity:.85; font-size:13px;">
            Rekap data transaksi sales order PT Maju Jaya
        </p>
    </div>
</div>

<!-- FILTER CARD -->
<div class="card filter-card">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
        <h6 class="font-weight-bold mb-0" style="color:#2d3748;">
            <i class="fas fa-filter mr-2" style="color:var(--gold);"></i>    Filter Periode
        </h6>
    </div>
    <div class="card-body px-4 pb-4">
        <form method="GET" action="<?= site_url('laporan') ?>">
            <div class="row align-items-end">
                <div class="col-md-4 mb-3 mb-md-0">
                    <i class="fas fa-calendar-alt mr-1" style="color:var(--gold);"></i></i> Dari Tanggal</label>
                    <input type="date" name="dari" class="form-control" value="<?= $dari ?>">
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <label><i class="fas fa-calendar-alt mr-1" style="color:var(--gold);"></i> Sampai Tanggal</label>
                    <input type="date" name="sampai" class="form-control" value="<?= $sampai ?>">
                </div>
                <div class="col-md-4">
                    <label class="d-block" style="visibility:hidden;">Aksi</label>
                    <div class="d-flex" style="gap:10px;">
                        <button type="submit" class="btn btn-filter">
                            <i class="fas fa-search mr-1"></i> Filter
                        </button>
                        <a href="<?= site_url('laporan/export_pdf?dari='.$dari.'&sampai='.$sampai) ?>"
                           class="btn btn-pdf">
                            <i class="fas fa-file-pdf mr-1"></i> Export PDF
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- STAT CARDS -->
<?php
    $grand_total  = 0;
    $total_order  = count($laporan);
    foreach ($laporan as $l) { $grand_total += $l->total_harga; }
    $rata_rata = $total_order > 0 ? $grand_total / $total_order : 0;
?>
<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="card stat-card" style="border-left:4px solid var(--gold);">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div style="width:44px;height:44px;border-radius:12px;background:var(--cream);
                                display:flex;align-items:center;justify-content:center;margin-right:12px;">
                        <i class="fas fa-file-invoice" style="color:var(--gold);font-size:18px;"></i>
                    </div>
                    <div>
                        <div style="font-size:11px;font-weight:700;color:var(--brown);text-transform:uppercase;">Total Order</div>
                        <div class="h4 mb-0 font-weight-bold"><?= $total_order ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card stat-card" style="border-left:4px solid var(--gold);">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div style="width:44px;height:44px;border-radius:12px;background:var(--cream);
                                display:flex;align-items:center;justify-content:center;margin-right:12px;">
                        <i class="fas fa-money-bill-wave" style="color:var(--gold);font-size:18px;"></i>
                    </div>
                    <div>
                        <div style="font-size:11px;font-weight:700;color:var(--brown);text-transform:uppercase;">Grand Total</div>
                        <div class="h6 mb-0 font-weight-bold" style="color:#2d3748;">
                            Rp <?= number_format($grand_total, 0, ',', '.') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card stat-card" style="border-left:4px solid var(--brown);">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div style="width:44px;height:44px;border-radius:12px;background:var(--cream);
                                display:flex;align-items:center;justify-content:center;margin-right:12px;">
                        <i class="fas fa-chart-line" style="color:var(--brown);font-size:18px;"></i>
                    </div>
                    <div>
                        <div style="font-size:11px;font-weight:700;color:var(--brown);text-transform:uppercase;">Rata-rata/Order</div>
                        <div class="h6 mb-0 font-weight-bold" style="color:#2d3748;">
                            Rp <?= number_format($rata_rata, 0, ',', '.') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- TABLE -->
<div class="card card-modern">
    <div class="card-header bg-white border-0 py-3 px-4 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 font-weight-bold" style="color:#2d3748;">
            <i class="fas fa-table mr-2" style="color:var(--brown);"></i> Detail Laporan
        </h6>
        <span style="background:var(--brown-light);color:var(--brown-dark);border-radius:99px;
                     padding:5px 12px;font-size:12px;font-weight:600;">
            <?= $dari ?> s/d <?= $sampai ?>
        </span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="dataTable">
                <thead>
                    <tr>
                        <th width="40">#</th>
                        <th>No. Order</th>
                        <th>Tanggal</th>
                        <th>Sales</th>
                        <th>Pelanggan</th>
                        <th>Total</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach ($laporan as $l): ?>
                <tr>
                    <td class="text-muted small"><?= $no++ ?></td>
                    <td>
                        <span class="no-order-chip">
                            <i class="fas fa-hashtag mr-1" style="font-size:10px;"></i>
                            <?= $l->no_order ?>
                        </span>
                    </td>
                    <td class="text-muted" style="font-size:13px;">
                        <i class="fas fa-calendar-alt mr-1" style="color:var(--gold);"></i>
                        <?= date('d/m/Y', strtotime($l->tanggal)) ?>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div style="width:30px;height:30px;border-radius:50%;background:var(--cream);
                                        display:flex;align-items:center;justify-content:center;
                                        font-weight:700;font-size:12px;color:var(--brown);margin-right:8px;">
                                <?= strtoupper(substr($l->nama_sales, 0, 1)) ?>
                            </div>
                            <span style="font-size:13px;font-weight:500;"><?= $l->nama_sales ?></span>
                        </div>
                    </td>
                    <td style="font-size:13px;">
                        <i class="fas fa-building mr-1" style="color:var(--gold-dark);"></i>
                        <?= $l->nama_pelanggan ?>
                    </td>
                    <td>
                        <span class="font-weight-bold" style="color:var(--brown);">
                            Rp <?= number_format($l->total_harga, 0, ',', '.') ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <?php if ($l->status == 'selesai'): ?>
                            <span class="badge-selesai"><i class="fas fa-circle mr-1" style="font-size:7px;"></i>Selesai</span>
                        <?php else: ?>
                            <span class="badge-dikirim"><i class="fas fa-circle mr-1" style="font-size:7px;"></i><?= ucfirst($l->status) ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="text-right font-weight-bold" style="font-size:13px;">
                            <i class="fas fa-calculator mr-1"></i> GRAND TOTAL
                        </td>
                        <td colspan="2" class="font-weight-bold" style="font-size:14px;color:var(--brown);">
                            Rp <?= number_format($grand_total, 0, ',', '.') ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

</div>
<?php $this->load->view('templates/footer'); ?>