<?php $this->load->view('templates/header'); ?>

<style>
body{
    background:#f8f4ee;
}

/* Judul */
.page-title{
    color:#6d4c41;
    font-weight:700;
}

/* Card */
.so-card{
    border:none;
    border-radius:20px;
    overflow:hidden;
    background:#fffdf9;
}

.so-header{
    background:linear-gradient(135deg,#f5e6d3,#ead7c2);
    padding:20px 25px;
}

.so-header h4{
    margin:0;
    color:#6d4c41;
    font-weight:700;
}

/* Form */
.form-label{
    color:#7b5e57;
    font-weight:600;
}

.form-control,
.form-select{
    border-radius:12px;
    border:1px solid #e6d7c8;
    padding:12px;
    background:#fff;
}

.form-control:focus,
.form-select:focus{
    border-color:#c8a27c;
    box-shadow:0 0 0 .2rem rgba(200,162,124,.15);
}

/* Detail Produk */
.section-title{
    color:#8b6b4d;
    font-weight:700;
    margin-bottom:20px;
}

.produk-row{
    background:#faf6f1;
    border:1px solid #eee2d4;
    border-radius:15px;
    padding:15px;
    margin-bottom:12px;
    align-items:center;
}

/* Button */
.btn-primary{
    background:#c89b6d;
    border:none;
    border-radius:12px;
}

.btn-primary:hover{
    background:#b8895d;
}

.btn-secondary{
    border-radius:12px;
}

.btn-outline-secondary{
    border-color:#c8a27c;
    color:#8b6b4d;
    border-radius:12px;
}

.btn-outline-secondary:hover{
    background:#c8a27c;
    border-color:#c8a27c;
    color:#fff;
}

.btn-danger{
    border-radius:10px;
}

/* Total */
.total-box{
    background:#f5e6d3;
    border-radius:15px;
    padding:15px 25px;
}

.total-label{
    color:#6d4c41;
    font-weight:600;
    margin-bottom:5px;
}

.total-angka{
    color:#b77946;
    font-size:28px;
    font-weight:700;
}

/* Card Shadow */
.shadow-premium{
    box-shadow:0 8px 25px rgba(0,0,0,.08);
}
</style>

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="page-title">
            <i class="bi bi-cart-plus-fill me-2"></i>
            Buat Sales Order Baru
        </h2>
        <small class="text-muted">
            Tambahkan produk dan buat transaksi penjualan baru.
        </small>
    </div>

    <div class="card so-card shadow-premium">

        <div class="so-header">
            <h4>
                <i class="bi bi-receipt-cutoff me-2"></i>
                Form Sales Order
            </h4>
        </div>

        <div class="card-body p-4">

            <form action="<?= base_url('salesorder/simpan') ?>" method="POST">

                <!-- Pelanggan -->
                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-person-fill me-1"></i>
                        Pilih Pelanggan
                    </label>

                    <select name="id_pelanggan" class="form-select" required>
                        <option value="">-- Pilih Pelanggan --</option>

                        <?php foreach ($pelanggan as $p): ?>
                        <option value="<?= $p->id ?>">
                            <?= $p->nama ?>
                        </option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <hr>

                <!-- Produk -->
                <h5 class="section-title">
                    <i class="bi bi-box-seam me-2"></i>
                    Detail Produk
                </h5>

                <div id="produk-container">

                    <div class="row produk-row">

                        <div class="col-md-6 mb-2">
                            <select
                                name="produk_id[]"
                                class="form-select produk-select"
                                required
                                onchange="hitungSubtotal(this)">

                                <option value="">
                                    -- Pilih Produk --
                                </option>

                                <?php foreach ($produk as $p): ?>
                                <option
                                    value="<?= $p->id ?>"
                                    data-harga="<?= $p->harga ?>">

                                    <?= $p->nama_produk ?>
                                    -
                                    Rp <?= number_format($p->harga,0,',','.') ?>

                                </option>
                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="col-md-2 mb-2">
                            <input
                                type="number"
                                name="jumlah[]"
                                class="form-control jumlah-input"
                                placeholder="Qty"
                                min="1"
                                required
                                onchange="hitungSubtotal(this)">
                        </div>

                        <div class="col-md-3 mb-2">
                            <input
                                type="text"
                                class="form-control subtotal-display"
                                placeholder="Subtotal"
                                readonly>
                        </div>

                        <div class="col-md-1 mb-2 text-center">
                            <button
                                type="button"
                                class="btn btn-danger"
                                onclick="hapusBaris(this)">

                                <i class="bi bi-trash"></i>

                            </button>
                        </div>

                    </div>

                </div>

                <button
                    type="button"
                    class="btn btn-outline-secondary px-4 py-2 mt-2"
                    onclick="tambahBaris()">

                    <i class="bi bi-plus-circle me-2"></i>
                    Tambah Produk

                </button>

                <hr class="my-4">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                    <div class="total-box">

                        <div class="total-label">
                            Total Order
                        </div>

                        <div
                            class="total-angka"
                            id="total-display">

                            Rp 0

                        </div>

                    </div>

                    <div>

                        <a href="<?= base_url('salesorder') ?>"
                           class="btn btn-secondary me-2">

                            <i class="bi bi-arrow-left me-1"></i>
                            Batal

                        </a>

                        <button
                            type="submit"
                            class="btn btn-primary">

                            <i class="bi bi-save me-1"></i>
                            Simpan Order

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

const produkOptions = `

<?php foreach ($produk as $p): ?>

<option
value="<?= $p->id ?>"
data-harga="<?= $p->harga ?>">

<?= $p->nama_produk ?>
-
Rp <?= number_format($p->harga,0,',','.') ?>

</option>

<?php endforeach; ?>

`;

function tambahBaris()
{
    const container =
        document.getElementById('produk-container');

    const div =
        document.createElement('div');

    div.className =
        'row produk-row';

    div.innerHTML = `

    <div class="col-md-6 mb-2">
        <select
        name="produk_id[]"
        class="form-select produk-select"
        required
        onchange="hitungSubtotal(this)">

            <option value="">
                -- Pilih Produk --
            </option>

            ${produkOptions}

        </select>
    </div>

    <div class="col-md-2 mb-2">
        <input
        type="number"
        name="jumlah[]"
        class="form-control jumlah-input"
        placeholder="Qty"
        min="1"
        required
        onchange="hitungSubtotal(this)">
    </div>

    <div class="col-md-3 mb-2">
        <input
        type="text"
        class="form-control subtotal-display"
        placeholder="Subtotal"
        readonly>
    </div>

    <div class="col-md-1 mb-2 text-center">
        <button
        type="button"
        class="btn btn-danger"
        onclick="hapusBaris(this)">
            <i class="bi bi-trash"></i>
        </button>
    </div>

    `;

    container.appendChild(div);
}

function hapusBaris(btn)
{
    const rows =
        document.querySelectorAll('.produk-row');

    if(rows.length > 1)
    {
        btn.closest('.produk-row').remove();
        hitungTotal();
    }
}

function hitungSubtotal(el)
{
    const row =
        el.closest('.produk-row');

    const select =
        row.querySelector('.produk-select');

    const jumlah =
        row.querySelector('.jumlah-input').value || 0;

    const harga =
        select.options[select.selectedIndex]?.dataset.harga || 0;

    const subtotal =
        harga * jumlah;

    row.querySelector('.subtotal-display').value =
        'Rp ' + subtotal.toLocaleString('id-ID');

    hitungTotal();
}

function hitungTotal()
{
    let total = 0;

    document.querySelectorAll('.produk-row')
    .forEach(row => {

        const select =
            row.querySelector('.produk-select');

        const jumlah =
            row.querySelector('.jumlah-input').value || 0;

        const harga =
            select.options[select.selectedIndex]?.dataset.harga || 0;

        total += harga * jumlah;

    });

    document.getElementById('total-display')
    .innerHTML =
        'Rp ' + total.toLocaleString('id-ID');
}

</script>

<?php $this->load->view('templates/footer'); ?>