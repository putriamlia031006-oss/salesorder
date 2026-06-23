<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>

<div class="container-fluid">

<style>
:root{
    --cream:#F8F3ED;
    --cream-dark:#E8DCCB;
    --cream-light:#FFFDF9;

    --brown:#B08968;
    --brown-dark:#8B6B4A;
    --brown-light:#EADCCB;

    --accent:#D9B99B;
}

body{
    background-color:var(--cream) !important;
}

/* HERO */
.page-hero{
    background:linear-gradient(
        135deg,
        var(--accent),
        var(--brown)
    );
    border-radius:18px;
    padding:24px 30px;
    color:white;
    margin-bottom:25px;
    position:relative;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(176,137,104,.15);
}

.page-hero::before{
    content:"";
    position:absolute;
    width:180px;
    height:180px;
    background:rgba(255,255,255,.12);
    border-radius:50%;
    right:-50px;
    top:-70px;
}

.page-hero-content{
    position:relative;
    z-index:2;
}

/* CARD */
.card-modern{
    border:none;
    border-radius:18px;
    background:white;
    box-shadow:0 8px 24px rgba(0,0,0,.06);
}

/* FORM */
.form-control{
    border-radius:12px;
    border:1.5px solid #EADFCF;
    padding:11px 15px;
    font-size:14px;
    transition:.25s;
}

.form-control:focus{
    border-color:var(--brown);
    box-shadow:0 0 0 4px rgba(176,137,104,.15);
}

.input-group-text{
    border-radius:12px 0 0 12px;
    border:1.5px solid #EADFCF;
    background:var(--cream);
    color:var(--brown-dark);
    font-weight:600;
}

.input-group .form-control{
    border-radius:0 12px 12px 0;
}

label{
    font-weight:600;
    font-size:13px;
    color:var(--brown-dark);
    margin-bottom:7px;
}

/* BUTTON */
.btn-green{
    background:linear-gradient(
        135deg,
        var(--brown),
        var(--brown-dark)
    );
    color:white;
    border:none;
    border-radius:12px;
    padding:11px 26px;
    font-weight:600;
}

.btn-green:hover{
    background:linear-gradient(
        135deg,
        var(--brown-dark),
        #6F5138
    );
    color:white;
}

.btn-outline-cancel{
    background:white;
    color:var(--brown-dark);
    border:1.5px solid #EADFCF;
    border-radius:12px;
    padding:11px 26px;
    font-weight:600;
}

.btn-outline-cancel:hover{
    background:var(--cream);
}

/* HEADER CARD */
.card-header{
    background:white !important;
}

/* ICON BOX */
.icon-box{
    width:42px;
    height:42px;
    border-radius:12px;
    background:var(--cream);
    display:flex;
    align-items:center;
    justify-content:center;
}

.icon-box i{
    color:var(--brown);
}

/* TIPS CARD */
.tip-icon{
    width:42px;
    height:42px;
    border-radius:12px;
    background:var(--brown-light);
    display:flex;
    align-items:center;
    justify-content:center;
}

.tip-icon i{
    color:var(--brown-dark);
}

.list-unstyled li{
    color:#5F5F5F;
    margin-bottom:10px;
}

.list-unstyled li i{
    color:var(--brown);
}

/* LINK KEMBALI */
.btn-back{
    background:rgba(255,255,255,.2);
    border-radius:12px;
    padding:8px 16px;
    color:white;
    text-decoration:none;
    font-size:13px;
    font-weight:600;
}

.btn-back:hover{
    background:rgba(255,255,255,.3);
    color:white;
    text-decoration:none;
}

/* HR */
hr{
    border-color:#F0E7DE;
}
</style>


<!-- PAGE HERO -->
<div class="page-hero">
    <div class="page-hero-content d-flex align-items-center">
        <a href="<?= site_url('produk') ?>"
           style="background:rgba(255,255,255,.2); border-radius:10px; padding:7px 14px;
                  color:#fff; font-size:13px; font-weight:600; margin-right:16px; text-decoration:none;">
            <i class="fas fa-arrow-left mr-1"></i> Kembali
        </a>
        <div>
            <h5 class="font-weight-bold mb-0">
                <i class="fas fa-<?= $produk ? 'edit' : 'plus-circle' ?> mr-2"></i>
                <?= $produk ? 'Edit Produk' : 'Tambah Produk Baru' ?>
            </h5>
            <p class="mb-0" style="opacity:.85; font-size:13px;">
                <?= $produk ? 'Perbarui informasi data produk' : 'Isi form untuk menambah produk baru' ?>
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card card-modern">

            <!-- Card Header -->
            <div class="card-header bg-white border-0 pt-2 pb-0 px-2">
                <div class="d-flex align-items-center">
                    <div style="width:40px;height:40px;border-radius:12px;background:var(--cream);
                                display:flex;align-items:center;justify-content:center;margin-right:12px;">
                        <i class="fas fa-box" style="color:var(--brown);"></i>
                    </div>
                    <div>
                        <h6 class="font-weight-bold mb-0">Informasi Produk</h6>
                        <small class="text-muted">Semua field wajib diisi</small>
                    </div>
                </div>
            </div>

            <div class="card-body p-4">
                <form action="<?= $produk ? site_url('produk/update/'.$produk->id) : site_url('produk/simpan') ?>"
                      method="POST">

                    <div class="form-group">
                        <label><i class="fas fa-barcode mr-1" style="color:var(--brown);"></i> Kode Produk</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">#</span>
                            </div>
                            <input type="text" name="kode_produk" class="form-control"
                                   placeholder="Contoh: P-001"
                                   value="<?= $produk->kode_produk ?? '' ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-tag mr-1" style="color:var(--brown);"></i> Nama Produk</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-box"></i></span>
                            </div>
                            <input type="text" name="nama_produk" class="form-control"
                                   placeholder="Nama produk"
                                   value="<?= $produk->nama_produk ?? '' ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-money-bill mr-1" style="color:var(--brown);"></i> Harga</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" name="harga" class="form-control"
                                   placeholder="0" min="0"
                                   value="<?= $produk->harga ?? '' ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-cubes mr-1" style="color:var(--brown);"></i> Stok</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-cubes"></i></span>
                            </div>
                            <input type="number" name="stok" class="form-control"
                                   placeholder="0" min="0"
                                   value="<?= $produk->stok ?? '' ?>" required>
                        </div>
                        <small class="text-muted">Stok di bawah 5 akan ditandai menipis</small>
                    </div>

                    <hr style="border-color:#f0f0f0;">

                    <div class="d-flex">
                        <button type="submit" class="btn btn-green mr-2">
                            <i class="fas fa-save mr-1"></i>
                            <?= $produk ? 'Update Produk' : 'Simpan Produk' ?>
                        </button>
                        <a href="<?= site_url('produk') ?>" class="btn btn-outline-cancel">
                            Batal
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

</div>
<?php $this->load->view('templates/footer'); ?>