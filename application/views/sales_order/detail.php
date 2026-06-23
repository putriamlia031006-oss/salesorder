
<?php $this->load->view('templates/header'); ?>

<style>
:root{
    --cream:#f8f4ee;
    --cream-light:#fffaf5;
    --cream-dark:#eadbc8;

    --brown:#8d6e63;
    --brown-dark:#6d4c41;

    --gold:#c8a27c;
    --gold-dark:#b78b60;
}

body{
    background:var(--cream);
}

/* Header */
.page-header{
    background:linear-gradient(
        135deg,
        #f5e6d3,
        #eadbc8,
        #d9c1a5
    );
    border-radius:18px;
    padding:25px 30px;
    margin-bottom:25px;
    color:var(--brown-dark);
    box-shadow:0 8px 20px rgba(0,0,0,.06);
}

/* Card */
.custom-card{
    border:none;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 8px 20px rgba(0,0,0,.06);
}

.custom-card .card-header{
    background:#fffaf5;
    color:var(--brown-dark);
    font-weight:600;
    border-bottom:1px solid #eee4d6;
    padding:15px 20px;
}

/* Table */
.table td{
    vertical-align:middle;
}

.table thead{
    background:#f5e6d3;
}

.table thead th{
    color:var(--brown-dark);
    border:none;
}

.table tfoot{
    background:#f5e6d3;
}

.table tfoot th{
    color:var(--brown-dark);
}

/* Buttons */
.btn-cream{
    background:var(--gold);
    border:none;
    color:white;
    border-radius:10px;
}

.btn-cream:hover{
    background:var(--gold-dark);
    color:white;
}

.btn-brown{
    background:var(--brown);
    border:none;
    color:white;
    border-radius:10px;
}

.btn-brown:hover{
    background:var(--brown-dark);
    color:white;
}

/* Total Box */
.total-box{
    background:#f5e6d3;
    border-radius:12px;
    padding:15px;
    text-align:right;
}

/* Badge */
.badge-status{
    font-size:13px;
    padding:8px 12px;
    border-radius:20px;
}
</style>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="page-header d-flex justify-content-between align-items-center">

        <div>
            <h3 class="mb-1">
                <i class="bi bi-file-earmark-text me-2"></i>
                Detail Sales Order
            </h3>

            <p class="mb-0">
                Nomor Order :
                <strong><?= $order->no_order ?></strong>
            </p>
        </div>

        <a href="<?= base_url('salesorder') ?>" class="btn btn-brown">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>

    </div>

    <div class="row">

        <!-- Informasi Order -->
        <div class="col-lg-6 mb-3">

            <div class="card custom-card">

                <div class="card-header">
                    <i class="bi bi-info-circle me-2"></i>
                    Informasi Order
                </div>

                <div class="card-body">

                    <?php
                    $badge = [
                        'draft'=>'secondary',
                        'dikirim'=>'primary',
                        'selesai'=>'success',
                        'dibatalkan'=>'danger'
                    ];
                    ?>

                    <table class="table table-borderless mb-0">

                        <tr>
                            <td width="35%">No. Order</td>
                            <td><strong><?= $order->no_order ?></strong></td>
                        </tr>

                        <tr>
                            <td>Tanggal</td>
                            <td><?= date('d/m/Y', strtotime($order->tanggal)) ?></td>
                        </tr>

                        <tr>
                            <td>Sales</td>
                            <td><?= $order->nama_sales ?></td>
                        </tr>

                        <tr>
                            <td>Pelanggan</td>
                            <td><?= $order->nama_pelanggan ?></td>
                        </tr>

                        <tr>
                            <td>Alamat</td>
                            <td><?= $order->alamat ?></td>
                        </tr>

                        <tr>
                            <td>Telepon</td>
                            <td><?= $order->no_telepon ?></td>
                        </tr>

                        <tr>
                            <td>Status</td>
                            <td>
                                <span class="badge bg-<?= $badge[$order->status] ?> badge-status">
                                    <?= ucfirst($order->status) ?>
                                </span>
                            </td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

        <!-- Update Status -->
        <?php if ($this->session->userdata('role') == 'admin'): ?>

        <div class="col-lg-6 mb-3">

            <div class="card custom-card">

                <div class="card-header">
                    <i class="bi bi-arrow-repeat me-2"></i>
                    Update Status
                </div>

                <div class="card-body">

                    <form action="<?= base_url('salesorder/update_status/'.$order->id) ?>" method="POST">

                        <div class="mb-3">

                            <label class="form-label">
                                Status Order
                            </label>

                            <select name="status" class="form-select">

                                <?php foreach(['draft','dikirim','selesai','dibatalkan'] as $s): ?>

                                <option
                                    value="<?= $s ?>"
                                    <?= $order->status == $s ? 'selected' : '' ?>>

                                    <?= ucfirst($s) ?>

                                </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <button type="submit" class="btn btn-cream w-100">

                            <i class="bi bi-save me-1"></i>
                            Update Status

                        </button>

                    </form>

                </div>

            </div>

        </div>

        <?php endif; ?>

    </div>

    <!-- Detail Produk -->
    <div class="card custom-card">

        <div class="card-header">
            <i class="bi bi-box-seam me-2"></i>
            Detail Produk
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Kode</th>
                            <th>Harga Satuan</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($detail as $i => $d): ?>

                        <tr>

                            <td><?= $i+1 ?></td>

                            <td>
                                <strong><?= $d->nama_produk ?></strong>
                            </td>

                            <td><?= $d->kode_produk ?></td>

                            <td>
                                Rp <?= number_format($d->harga_satuan,0,',','.') ?>
                            </td>

                            <td>
                                <?= $d->jumlah ?>
                            </td>

                            <td>
                                <strong>
                                    Rp <?= number_format($d->subtotal,0,',','.') ?>
                                </strong>
                            </td>

                        </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

            <div class="total-box">

                <h5 class="mb-0">

                    Total Order :
                    <strong>
                        Rp <?= number_format($order->total_harga,0,',','.') ?>
                    </strong>

                </h5>

            </div>

        </div>

    </div>

</div>

<?php $this->load->view('templates/footer'); ?>
```
