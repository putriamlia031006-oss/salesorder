<?php $this->load->view('templates/header'); ?>

<style>
:root{
    --cream:#F5E6CC;
    --cream-dark:#E6D3B3;
    --cream-light:#FFF9F0;

    --brown:#A67C52;
    --brown-dark:#8B6B47;
    --brown-light:#DCC7AA;

    --accent:#C8A97E;
}

body{
    background:#faf7f2;
}

.page-header{
    background:linear-gradient(
        135deg,
        var(--cream-dark),
        var(--brown),
        var(--accent)
    );
    color:white;
    border-radius:18px;
    padding:24px 30px;
    margin-bottom:25px;
    position:relative;
    overflow:hidden;
}

.page-header::before{
    content:'';
    position:absolute;
    width:180px;
    height:180px;
    border-radius:50%;
    background:rgba(255,255,255,.12);
    top:-80px;
    right:-40px;
}

.page-header::after{
    content:'';
    position:absolute;
    width:120px;
    height:120px;
    border-radius:50%;
    background:rgba(255,255,255,.08);
    bottom:-50px;
    right:80px;
}

.table-card{
    border:none;
    border-radius:18px;
    overflow:hidden;
    background:#fff;
    box-shadow:0 8px 25px rgba(166,124,82,.12);
}

.table-card .card-header{
    background:#fff;
    border-bottom:1px solid #eee;
    padding:18px 25px;
}

.table-card .card-body{
    padding:25px;
}

.btn-cream{
    background:var(--brown);
    border:none;
    color:white;
    border-radius:10px;
    padding:10px 18px;
    font-weight:600;
}

.btn-cream:hover{
    background:var(--brown-dark);
    color:white;
}

.btn-delete{
    background:#f7e7e7;
    color:#b35b5b;
    border:none;
    border-radius:10px;
}

.btn-delete:hover{
    background:#e8cfcf;
    color:#943d3d;
}

.badge-role{
    padding:8px 14px;
    border-radius:30px;
    font-size:12px;
    font-weight:600;
}

.badge-admin{
    background:#FFF4E3;
    color:#A67C52;
}

.badge-manager{
    background:#F7E8D2;
    color:#8B6B47;
}

.badge-sales{
    background:#FDF7EE;
    color:#B08968;
}

.table th{
    border-top:none !important;
    font-weight:700;
    color:#7a6246;
    background:#FFF8EE;
}

.table td{
    vertical-align:middle !important;
}

.table-hover tbody tr:hover{
    background:#FFF9F0;
}

.user-avatar{
    width:42px;
    height:42px;
    border-radius:50%;
    background:linear-gradient(
        135deg,
        var(--brown),
        var(--cream-dark)
    );
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
    margin-right:12px;
}

.user-info{
    display:flex;
    align-items:center;
}

.user-name{
    font-weight:600;
    color:#4f3d29;
}

.user-username{
    font-size:12px;
    color:#9c8a76;
}

.page-title-icon{
    color:#fff;
}

.empty-state{
    padding:40px;
    color:#999;
}
</style>

<div class="container-fluid">

    <!-- HERO -->
    <div class="page-header">

        <h3 class="mb-1 font-weight-bold">
            <i class="fas fa-users mr-2 page-title-icon"></i>
            Manajemen User
        </h3>

        <p class="mb-0" style="opacity:.95;">
            Kelola akun pengguna yang dapat mengakses sistem konveksi.
        </p>

    </div>

    <!-- CARD -->
    <div class="card table-card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h5 class="mb-0" style="color:#6f5336;">
                <i class="fas fa-users mr-2"></i>
                Data User
            </h5>

            <a href="<?= base_url('user/tambah') ?>"
               class="btn btn-cream">
                <i class="fas fa-plus mr-1"></i>
                Tambah User
            </a>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th width="70">No</th>
                            <th>User</th>
                            <th>Role</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php $no=1; foreach($users as $u): ?>

                        <tr>

                            <td><?= $no++ ?></td>

                            <td>

                                <div class="user-info">

                                    <div class="user-avatar">
                                        <?= strtoupper(substr($u->nama,0,1)); ?>
                                    </div>

                                    <div>

                                        <div class="user-name">
                                            <?= $u->nama ?>
                                        </div>

                                        <div class="user-username">
                                            @<?= $u->username ?>
                                        </div>

                                    </div>

                                </div>

                            </td>

                            <td>

                                <?php if($u->role=='admin'): ?>

                                    <span class="badge-role badge-admin">
                                        Admin
                                    </span>

                                <?php elseif($u->role=='manager'): ?>

                                    <span class="badge-role badge-manager">
                                        Manager
                                    </span>

                                <?php else: ?>

                                    <span class="badge-role badge-sales">
                                        Sales
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>

                                <a href="<?= base_url('user/edit/'.$u->id) ?>"
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="<?= base_url('user/hapus/'.$u->id) ?>"
                                   class="btn btn-delete btn-sm"
                                   onclick="return confirm('Hapus data?')">
                                    <i class="fas fa-trash"></i>
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    <?php if(empty($users)): ?>

                        <tr>
                            <td colspan="4" class="text-center empty-state">
                                Belum ada data user.
                            </td>
                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<?php $this->load->view('templates/footer'); ?>