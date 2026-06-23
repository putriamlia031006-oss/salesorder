<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sales Order - PT Maju Jaya</title>

    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

    <style>

        :root{
            --cream:#F8F4EC;
            --cream-light:#FFFDF9;
            --cream-dark:#E8DDCC;

            --brown:#8B6F47;
            --brown-dark:#6E5538;

            --gold:#D4B483;
            --gold-light:#F5E6C8;
        }

        /* ======================
           BODY
        ====================== */
        body{
            background:#F8F4EC !important;
        }

        /* ======================
           SIDEBAR
        ====================== */
        .bg-gradient-primary{
            background:
                linear-gradient(
                    180deg,
                    #946b2e 0%,
                    #B89465 100%
                ) !important;
        }

        .sidebar{
            box-shadow:4px 0 20px rgba(0,0,0,.08);
        }

        .sidebar-brand{
            border-bottom:1px solid rgba(255,255,255,.2) !important;
        }

        .sidebar-brand-text{
            color: var(--gold) !important;
            font-weight:700;
        }

        .sidebar .nav-item .nav-link{
            color:rgba(238, 222, 131, 0.9) !important;
            border-radius:10px;
            margin:3px 10px;
            transition:.3s;
        }

        .sidebar .nav-item .nav-link i{
            color:rgba(218, 195, 95, 0.9);
        }

        .sidebar .nav-item .nav-link:hover,
        .sidebar .nav-item .nav-link:focus{
            background:rgba(255,255,255,.18);
            transform:translateX(3px);
        }

        .sidebar .nav-item.active .nav-link{
            background:rgba(255,255,255,.25);
            font-weight:600;
        }

        .sidebar-divider{
            border-color:rgba(255,255,255,.15);
        }

        /* ======================
           TOPBAR
        ====================== */
        .topbar{
            background:white !important;
            box-shadow:0 2px 15px rgba(0,0,0,.05);
        }

        .topbar .nav-link{
            color:var(--brown-dark) !important;
        }

        /* Avatar user */
        .topbar-avatar{
            width:40px;
            height:40px;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            color:white;
            font-weight:700;

            background:
                linear-gradient(
                    135deg,
                    #D4B483,
                    #B89465
                );
        }

        /* ======================
           CARD
        ====================== */
        .card{
            border:none;
            border-radius:18px;
            box-shadow:0 4px 15px rgba(0,0,0,.05);
        }

        .card-header{
            background:white;
            border-bottom:1px solid #eee;
        }

        /* ======================
           TABLE
        ====================== */
        .table thead{
            background:
                linear-gradient(
                    135deg,
                    #D4B483,
                    #B89465
                );
            color:white;
        }

        .table th{
            border:none !important;
        }

        .table-hover tbody tr:hover{
            background:#FFF9F1;
        }

        /* ======================
           BUTTON
        ====================== */
        .btn-primary{
            background:#B89465 !important;
            border-color:#B89465 !important;
        }

        .btn-primary:hover{
            background:#8B6F47 !important;
            border-color:#8B6F47 !important;
        }

        /* ======================
           DATATABLE
        ====================== */
        .page-item.active .page-link{
            background:#B89465;
            border-color:#B89465;
        }

        .page-link{
            color:#8B6F47;
        }

        /* ======================
           SCROLLBAR
        ====================== */
        ::-webkit-scrollbar{
            width:8px;
        }

        ::-webkit-scrollbar-track{
            background:#f3eee6;
        }

        ::-webkit-scrollbar-thumb{
            background:#D4B483;
            border-radius:10px;
        }

        ::-webkit-scrollbar-thumb:hover{
            background:#B89465;
        }

    </style>

</head>

<body id="page-top">

<div id="wrapper">