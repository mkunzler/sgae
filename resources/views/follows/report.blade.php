<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Fonts -->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon" type="image/png">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">

    @stack('css')

    <style type="text/css">
    .container-fluid {
        width: 100%;
        padding-right: 0.75rem;
        padding-left: 0.75rem;
        margin-right: auto;
        margin-left: auto;
    }
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -0.75rem;
        margin-left: -0.75rem;
    }
    .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col,
    .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm,
    .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md,
    .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg,
    .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl,
    .col-xl-auto {
        position: relative;
        width: 100%;
        padding-right: 0.75rem;
        padding-left: 0.75rem;
    }

    .col {
        flex-basis: 0;
        flex-grow: 1;
        max-width: 100%;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid #e3e6f0;
        border-radius: 0.35rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1.25rem;
    }

    body{
        height: 100vh;
    }

    .table-responsive{
        display: table !important;
    }

    .table{
        margin-bottom: 0 !important;
    }

    .d-inline {
        display: inline !important;
    }

    .table-bordered {
        border: 1px solid #e3e6f0;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #e3e6f0;
    }

    .table-bordered thead th,
    .table-bordered thead td {
        border-bottom-width: 2px;
    }

    .table-borderless th,
    .table-borderless td,
    .table-borderless thead th,
    .table-borderless tbody + tbody {
        border: 0;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }
    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .table-responsive > .table-bordered {
        border: 0;
    }

    .align-items-center {
        align-items: center !important;
    }
    .text-center {
        text-align: center !important;
    }
    </style>
</head>
<body id="page-top">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4 text-center">
        <p>SERVIÇO PÚBLICO FEDERAL MINISTÉRIO DA EDUCAÇÃO<br>
            SECRETARIA DE EDUCAÇÃO PROFISSIONAL E TECNOLOGIA / INSTITUTO FEDERAL FARROUPILHA – CAMPUS SÃO BORJA</p>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <h4>Estudante: {{ $follow->student->name }}</h4>
            <h4>Curso: {{ $follow->semester->course->name }}</h4>
            <h4>Semestre: {{ $follow->semester->title }}</h4>
            <h4>Professor(a): {{ $follow->teacher->name }}</h4>
            <h4>Disciplina: {{ $follow->subject->name }}</h4>
        </div>
        <div class="row">
            <h4>TENTATIVAS DE ADAPTAÇÕES DE CONTEÚDOS FEITAS PELO DOCENTE</h4>
            <p>{!! nl2br(e($follow->adaptation_attempts)) !!}</p>
        </div>
    </div>

</body>
</html>
