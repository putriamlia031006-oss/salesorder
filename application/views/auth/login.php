<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - PT Maju Jaya</title>

    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

    <style>

:root{
    --cream:#F8F4EC;
    --cream-dark:#E8DDCC;
    --cream-light:#FFFDF9;

    --brown:#8B6F47;
    --brown-dark:#6E5538;

    --gold:#D4B483;
    --gold-light:#F5E6C8;

    --text:#4B3F32;
}

body{
    background:
        linear-gradient(
            135deg,
            #FFFDF8 0%,
            #F8F1E5 50%,
            #EEDFC8 100%
        );
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    font-family:'Poppins',sans-serif;
    position:relative;
    overflow:hidden;
}

/* dekorasi background */
body::before{
    content:'';
    position:absolute;
    width:500px;
    height:500px;
    border-radius:50%;
    background:rgba(255,255,255,.35);
    top:-250px;
    right:-150px;
}

body::after{
    content:'';
    position:absolute;
    width:350px;
    height:350px;
    border-radius:50%;
    background:rgba(212,180,131,.15);
    bottom:-150px;
    left:-100px;
}

.login-wrapper{
    width:100%;
    max-width:460px;
    padding:20px;
    position:relative;
    z-index:2;
}

/* =========================
   BRAND
========================= */

.login-brand{
    text-align:center;
    margin-bottom:25px;
}

.brand-icon{
    width:78px;
    height:78px;
    border-radius:22px;
    background:
        linear-gradient(
            135deg,
            #D4B483,
            #B89465
        );
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto;
    box-shadow:0 10px 30px rgba(184,148,101,.3);
}

.brand-icon i{
    color:white;
    font-size:32px;
}

.brand-name{
    color:var(--brown-dark);
    font-size:28px;
    font-weight:700;
    margin-top:15px;
}

.brand-sub{
    color:#8c7b67;
    font-size:14px;
}

/* =========================
   CARD
========================= */

.login-card{
    border:none;
    border-radius:28px;
    overflow:hidden;

    background:rgba(255,255,255,.8);

    backdrop-filter:blur(14px);

    box-shadow:
        0 20px 60px rgba(0,0,0,.08);
}

.card-header-strip{
    height:6px;
    background:
        linear-gradient(
            90deg,
            #D4B483,
            #E8DDCC,
            #B89465
        );
}

.login-card .card-body{
    padding:40px;
}

.login-title{
    font-size:26px;
    font-weight:700;
    color:var(--brown-dark);
    text-align:center;
}

.login-sub{
    text-align:center;
    color:#8c7b67;
    margin-bottom:28px;
}

/* =========================
   FORM
========================= */

label{
    font-size:13px;
    font-weight:600;
    color:var(--brown-dark);
}

.input-group-text{
    background:#FFF9F1;
    border:2px solid #EFE3D2;
    border-right:none;
    color:#B89465;
    border-radius:12px 0 0 12px;
}

.form-control{
    border:2px solid #EFE3D2;
    border-left:none;
    border-radius:0 12px 12px 0;
    height:48px;
    font-size:14px;
}

.form-control:focus{
    border-color:#D4B483;
    box-shadow:
        0 0 0 4px rgba(212,180,131,.2);
}

.input-group:focus-within .input-group-text{
    border-color:#D4B483;
}

.btn-toggle-pw{
    border:2px solid #EFE3D2;
    border-left:none;
    background:#FFF9F1;
    color:#B89465;
    border-radius:0 12px 12px 0;
    padding:0 15px;
}

/* =========================
   BUTTON LOGIN
========================= */

.btn-login{
    width:100%;
    border:none;
    border-radius:14px;

    background:
        linear-gradient(
            135deg,
            #D4B483,
            #B89465
        );

    color:white;
    font-weight:700;
    font-size:15px;
    padding:13px;

    transition:.3s;
}

.btn-login:hover{
    transform:translateY(-2px);

    box-shadow:
        0 10px 25px rgba(184,148,101,.35);

    color:white;
}

/* =========================
   ALERT
========================= */

.alert-danger{
    border:none;
    border-radius:12px;
    background:#FFF0F0;
    color:#C0392B;
    border-left:5px solid #E74C3C;
}

/* =========================
   ROLE INFO
========================= */

.role-info{
    margin-top:20px;
    background:#FFFCF7;
    border:1px solid #F1E4D2;
    border-radius:14px;
    padding:15px;
}

.role-item{
    display:flex;
    justify-content:space-between;
    margin-bottom:6px;
}

.role-badge{
    background:#F5E6C8;
    color:#8B6F47;
    border-radius:30px;
    padding:3px 12px;
    font-size:11px;
    font-weight:600;
}

.role-badge.pink{
    background:#F3E6D4;
    color:#8B6F47;
}

.role-badge.mint{
    background:#EFE6D8;
    color:#8B6F47;
}

/* =========================
   FOOTER
========================= */

.login-footer{
    text-align:center;
    margin-top:18px;
    color:#8B7A66;
    font-size:12px;
}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:576px){

    .login-card .card-body{
        padding:28px;
    }

    .brand-name{
        font-size:24px;
    }

    .login-title{
        font-size:22px;
    }

}

</style>
</head>
<body>

<div class="login-wrapper">

    <!-- BRAND -->
    <div class="login-brand">
        <div class="brand-icon">
            <i class="fas fa-mobile-alt"></i>
        </div>
        <div class="brand-name">PT Maju Jaya</div>
        <div class="brand-sub">Sales Order System</div>
    </div>

    <!-- CARD -->
    <div class="card login-card">
        <div class="card-header-strip"></div>
        <div class="card-body">

            <div class="login-title">Selamat Datang 👋</div>
            <div class="login-sub">Silakan login untuk melanjutkan</div>

            <!-- ALERT ERROR -->
            <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger mb-3">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <?= $this->session->flashdata('error') ?>
            </div>
            <?php endif; ?>

            <!-- FORM -->
            <!-- autocomplete="off" mencegah browser isi otomatis -->
            <form action="<?= base_url('auth/proses_login') ?>" method="POST" autocomplete="off">

                <!-- Input tersembunyi sebagai honeypot untuk cegah autofill -->
                <input type="text"     name="fakeuser" style="display:none;" tabindex="-1">
                <input type="password" name="fakepass" style="display:none;" tabindex="-1">

                <div class="form-group mb-3">
                    <label><i class="fas fa-user mr-1" style="color:var(--gold);"></i> Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        <input type="text"
                               name="username"
                               class="form-control"
                               placeholder="Masukkan username"
                               autocomplete="new-password"
                               required>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label><i class="fas fa-lock mr-1" style="color:var(--gold);"></i> Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                        <input type="password"
                               name="password"
                               id="inputPassword"
                               class="form-control"
                               placeholder="Masukkan password"
                               autocomplete="new-password"
                               required>
                        <div class="input-group-append">
                            <button type="button" class="btn-toggle-pw" onclick="togglePassword()">
                                <i class="fas fa-eye" id="iconEye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt mr-2"></i> Login
                </button>

            </form>

        </div>
    </div>

    <!-- FOOTER -->
    <div class="login-footer">
        &copy; <?= date('Y') ?> PT Maju Jaya &mdash; Sales Order System
    </div>

</div>

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script>
    function togglePassword() {
        const input = document.getElementById('inputPassword');
        const icon  = document.getElementById('iconEye');
        if (input.type === 'password') {
            input.type = 'text';
            icon.className = 'fas fa-eye-slash';
        } else {
            input.type = 'password';
            icon.className = 'fas fa-eye';
        }
    }
</script>
</body>
</html>