```php
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan Penjualan - PT Maju Jaya</title>

<style>

:root{
    --cream:#f8f4ee;
    --cream-light:#fffaf5;
    --cream-dark:#eadbc8;

    --brown:#8d6e63;
    --brown-dark:#6d4c41;

    --gold:#c8a27c;
    --gold-dark:#b78b60;

    --border:#ddd0c0;
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Segoe UI',sans-serif;
    font-size:12px;
    color:#444;
    background:var(--cream);
    padding:25px;
}

/* ======================
   BUTTONS
====================== */

.action-bar{
    text-align:right;
    margin-bottom:15px;
}

.btn{
    border:none;
    padding:10px 20px;
    border-radius:8px;
    color:white;
    cursor:pointer;
    font-size:13px;
    font-weight:600;
}

.btn-print{
    background:var(--gold);
}

.btn-back{
    background:var(--brown);
    margin-left:8px;
}

/* ======================
   HEADER
====================== */

.report-header{
    background:linear-gradient(
        135deg,
        #fffaf5,
        #f5e6d3
    );

    border:1px solid var(--border);
    border-radius:14px;
    padding:22px;
    text-align:center;
    margin-bottom:20px;
}

.company-name{
    font-size:24px;
    font-weight:700;
    color:var(--brown-dark);
    letter-spacing:1px;
}

.company-desc{
    color:#777;
    margin-top:3px;
}

.divider{
    border:none;
    border-top:2px solid var(--gold);
    margin:12px 0;
}

.report-title{
    font-size:18px;
    font-weight:700;
    color:var(--brown-dark);
}

.period{
    margin-top:6px;
    color:#666;
}

/* ======================
   INFO
====================== */

.info-row{
    display:flex;
    justify-content:space-between;
    margin-bottom:18px;
    color:#555;
}

/* ======================
   SUMMARY
====================== */

.stat-row{
    display:flex;
    gap:15px;
    margin-bottom:20px;
}

.stat-box{
    flex:1;
    background:white;
    border:1px solid var(--border);
    border-radius:12px;
    padding:15px;
    text-align:center;
}

.stat-label{
    font-size:11px;
    color:#888;
    text-transform:uppercase;
    margin-bottom:5px;
}

.stat-value{
    font-size:18px;
    font-weight:700;
    color:var(--brown-dark);
}

/* ======================
   TABLE
====================== */

.table-wrapper{
    background:white;
    border-radius:12px;
    overflow:hidden;
    border:1px solid var(--border);
}

table{
    width:100%;
    border-collapse:collapse;
}

thead th{
    background:#f5e6d3;
    color:var(--brown-dark);
    padding:12px;
    font-size:11px;
    text-align:center;
    border-bottom:2px solid #dcc5a9;
}

tbody td{
    padding:10px;
    border-bottom:1px solid #eee;
    text-align:center;
}

tbody tr:nth-child(even){
    background:#fffaf5;
}

tbody tr:hover{
    background:#f9f1e8;
}

tfoot td{
    background:#eadbc8;
    color:var(--brown-dark);
    font-weight:700;
    padding:12px;
}

.text-right{
    text-align:right;
}

/* ======================
   STATUS
====================== */

.status{
    padding:5px 10px;
    border-radius:20px;
    font-size:11px;
    font-weight:600;
}

.status-selesai{
    background:#dff3e8;
    color:#2f855a;
}

.status-dikirim{
    background:#e7f0ff;
    color:#2b6cb0;
}

.status-draft{
    background:#f3f4f6;
    color:#555;
}

.status-dibatalkan{
    background:#fdeaea;
    color:#c53030;
}

/* ======================
   GRAND TOTAL
====================== */

.total-box{
    margin-top:15px;
    background:#f5e6d3;
    border:1px solid #dcc5a9;
    border-radius:10px;
    padding:14px;
    text-align:right;
}

.total-box h3{
    color:var(--brown-dark);
}

/* ======================
   SIGNATURE
====================== */

.signature-section{
    margin-top:40px;
    display:flex;
    justify-content:space-between;
}

.notes{
    font-size:11px;
    color:#666;
    line-height:1.8;
}

.signature-box{
    width:220px;
    text-align:center;
}

.signature-space{
    height:80px;
}

.signature-line{
    border-top:1px solid #333;
    padding-top:5px;
}

/* ======================
   PRINT
====================== */

@media print{

    .no-print{
        display:none !important;
    }

    body{
        background:white;
        padding:0;
    }

}

</style>
</head>

<body>

<?php
$total_order = count($laporan);
$rata_rata = $total_order > 0 ? $grand_total / $total_order : 0;
?>

<!-- BUTTON -->
<div class="action-bar no-print">

    <button
        class="btn btn-print"
        onclick="window.print()">
        🖨️ Cetak Laporan
    </button>

    <button
        class="btn btn-back"
        onclick="window.history.back()">
        ← Kembali
    </button>

</div>

<!-- HEADER -->
<div class="report-header">

    <div class="company-name">
        PT MAJU JAYA
    </div>

    <div class="company-desc">
        Sales Order Management System
    </div>

    <hr class="divider">

    <div class="report-title">
        LAPORAN PENJUALAN
    </div>

    <div class="period">
        Periode :
        <?= date('d M Y', strtotime($dari)) ?>
        s/d
        <?= date('d M Y', strtotime($sampai)) ?>
    </div>

</div>

<!-- INFO -->
<div class="info-row">

    <div>
        Dicetak oleh :
        <strong>
            <?= $this->session->userdata('nama') ?>
        </strong>
        (<?= ucfirst($this->session->userdata('role')) ?>)
    </div>

    <div>
        <?= date('d M Y H:i') ?> WIB
    </div>

</div>

<!-- SUMMARY -->
<div class="stat-row">

    <div class="stat-box">
        <div class="stat-label">Total Order</div>
        <div class="stat-value">
            <?= $total_order ?>
        </div>
    </div>

    <div class="stat-box">
        <div class="stat-label">Grand Total</div>
        <div class="stat-value">
            Rp <?= number_format($grand_total,0,',','.') ?>
        </div>
    </div>

    <div class="stat-box">
        <div class="stat-label">Rata-rata Order</div>
        <div class="stat-value">
            Rp <?= number_format($rata_rata,0,',','.') ?>
        </div>
    </div>

</div>

<!-- TABLE -->
<div class="table-wrapper">

<table>

    <thead>
        <tr>
            <th>No</th>
            <th>No Order</th>
            <th>Tanggal</th>
            <th>Sales</th>
            <th>Pelanggan</th>
            <th>Total Harga</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>

    <?php $no=1; foreach($laporan as $l): ?>

        <tr>

            <td><?= $no++ ?></td>

            <td>
                <strong><?= $l->no_order ?></strong>
            </td>

            <td>
                <?= date('d/m/Y', strtotime($l->tanggal)) ?>
            </td>

            <td>
                <?= $l->nama_sales ?>
            </td>

            <td>
                <?= $l->nama_pelanggan ?>
            </td>

            <td>
                <strong>
                    Rp <?= number_format($l->total_harga,0,',','.') ?>
                </strong>
            </td>

            <td>

                <span class="status status-<?= $l->status ?>">
                    <?= ucfirst($l->status) ?>
                </span>

            </td>

        </tr>

    <?php endforeach; ?>

    </tbody>

    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                GRAND TOTAL
            </td>
            <td colspan="2">
                Rp <?= number_format($grand_total,0,',','.') ?>
            </td>
        </tr>
    </tfoot>

</table>

</div>

<!-- TOTAL BOX -->
<div class="total-box">
    <h3>
        Total Penjualan :
        Rp <?= number_format($grand_total,0,',','.') ?>
    </h3>
</div>

<!-- SIGNATURE -->
<div class="signature-section">

    <div class="notes">
        <strong>Catatan:</strong><br>
        • Laporan ini dihasilkan otomatis oleh sistem.<br>
        • Data tidak termasuk transaksi yang dibatalkan.<br>
        • Dokumen ini digunakan sebagai arsip laporan perusahaan.
    </div>

    <div class="signature-box">

        Tangerang,
        <?= date('d M Y') ?>

        <div class="signature-space"></div>

        <div class="signature-line">
            Manager
        </div>

    </div>

</div>

<script>
window.print();
</script>

</body>
</html>
```
