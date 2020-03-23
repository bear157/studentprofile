<!DOCTYPE html>
<html>
<head>
    <title><?= ( empty($page_title) ) ? "Student Profile Record" : $page_title; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- jquery -->
    <script type="text/javascript" src="/studentprofile/media/js/jquery-3.4.1.min.js"></script>
    
    <!-- fontawesome -->
    <link rel="stylesheet" type="text/css" href="/studentprofile/media/fontawesome/css/all.min.css">
    <script type="text/javascript" src="/studentprofile/media/fontawesome/js/all.min.js"></script>

    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="/studentprofile/media/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="/studentprofile/media/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="/studentprofile/media/datatable/dataTables.bootstrap4.min.css">
    <script type="text/javascript" src="/studentprofile/media/datatable/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/studentprofile/media/datatable/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/studentprofile/media/datatable/fixedHeader.bootstrap4.min.css">
    <script type="text/javascript" src="/studentprofile/media/datatable/dataTables.fixedHeader.min.js"></script>

    <!-- custom styling & script -->
    <link rel="stylesheet" type="text/css" href="/studentprofile/media/css/sidebar.css?d=<?= date("YmdHis"); ?>">
    <link rel="stylesheet" type="text/css" href="/studentprofile/media/css/style.css?d=<?= date("YmdHis"); ?>">
    <script type="text/javascript" src="/studentprofile/media/js/script.js?date=<?= date("YmdHis"); ?>"></script>
</head>
<body>
   