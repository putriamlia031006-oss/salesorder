
<?php $this->load->view('templates/header'); ?>

<style>
:root{
    --cream:#f8f4ee;
    --cream-dark:#eadbc8;
    --cream-light:#fffaf5;

    --brown:#8d6e63;
    --brown-dark:#6d4c41;

    --gold:#c8a27c;
    --gold-dark:#b78b60;
}

body{
    background:var(--cream);
}

/* HEADER */
.page-header{
    background:linear-gradient(
        135deg,
        #f5e6d3,
        #eadbc8,
        #d9c1a5
    );
    color:var(--brown-dark);
    border-radius:18px;
    padding:24px 30px;
    margin-bottom:25px;
    position:relative;
    overflow:hidden;
    box-shadow:0 8px 20px rgba(0,0,0,.06);
}

.page-header::before{
    content:'';
    position:absolute;
    width:180px;
    height:180px;
    border-radius:50%;
    background:rgba(255,255,255,.25);
    top:-80px;
    right:-40px;
}

.page-header::after{
    content:'';
    position:absolute;
    width:120px;
    height:120px;
    border-radius:50%;
    background:rgba(255,255,255,.15);
    bottom:-50px;
    right:80px;
}

/* CARD */
.form-card{
    border:none;
    border-radius:18px;
    overflow:hidden;
    background:white;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
}

.form-card .card-header{
    background:#fffaf5;
    border-bottom:1px solid #eee4d6;
    padding:18px 25px;
}

.form-card .card-body{
    padding:25px;
}

/* LABEL */
.form-label{
    font-weight:600;
    color:var(--brown);
}

/* INPUT */
.form-control{
    border-radius:12px;
    border:1px solid #e3d6c8;
    padding:12px 15px;
    background:#fff;
}

.form-control:focus{
    border-color:var(--gold);
    box-shadow:0 0 0 .2rem rgba(200,162,124,.15);
}

/* BUTTON SIMPAN */
.btn-cream{
    background:var(--gold);
    border:none;
    color:white;
    border-radius:12px;
    padding:10px 20px;
    font-weight:600;
}

.btn-cream:hover{
    background:var(--gold-dark);
    color:white;
}

/* BUTTON KEMBALI */
.btn-brown{
    background:var(--brown);
    border:none;
    color:white;
    border-radius:12px;
    padding:10px 20px;
    font-weight:600;
}

.btn-brown:hover{
    background:var(--brown-dark);
    color:white;
}

.required{
    color:#dc3545;
}

.card-header h5{
    color:var(--brown-dark);
    font-weight:600;
}
</style>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="page-header">

        <h3 class="mb-1 font-weight-bold">
            <?= $pelanggan ? 'Edit Pelanggan' : 'Tambah Pelanggan' ?>
        </h3>

        <p class="mb-0">
            Kelola data pelanggan konveksi dengan tampilan yang elegan dan profesional.
        </p>

    </div>

    <!-- CARD FORM -->
    <div class="card form-card">

        <div class="card-header">

            <h5 class="mb-0">
                <i class="fas fa-user-circle mr-2"></i>
                Form Data Pelanggan
            </h5>

        </div>

        <div class="card-body">

            <form action="<?= $pelanggan ? base_url('pelanggan/update/'.$pelanggan->id) : base_url('pelanggan/simpan') ?>" method="POST">

                <!-- Nama -->
                <div class="form-group mb-3">

                    <label class="form-label">
                        Nama Pelanggan
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="nama"
                        class="form-control"
                        value="<?= $pelanggan->nama ?? '' ?>"
                        placeholder="Masukkan nama pelanggan"
                        required>

                </div>

                <!-- Alamat -->
                <div class="form-group mb-3">

                    <label class="form-label">
                        Alamat
                    </label>

                    <textarea
                        name="alamat"
                        class="form-control"
                        rows="4"
                        placeholder="Masukkan alamat pelanggan"><?= $pelanggan->alamat ?? '' ?></textarea>

                </div>

                <!-- Telepon -->
                <div class="form-group mb-4">

                    <label class="form-label">
                        No. Telepon
                    </label>

                    <input
                        type="text"
                        name="no_telepon"
                        class="form-control"
                        value="<?= $pelanggan->no_telepon ?? '' ?>"
                        placeholder="08xxxxxxxxxx">

                </div>

                <!-- BUTTON -->
                <button type="submit" class="btn btn-cream">
                    <i class="fas fa-save mr-1"></i>
                    Simpan
                </button>

                <a href="<?= base_url('pelanggan') ?>" class="btn btn-brown ml-2">
                    <i class="fas fa-arrow-left mr-1"></i>
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

<?php $this->load->view('templates/footer'); ?>
```
