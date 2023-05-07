<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $data['title']; ?></title>

	<!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

	<link rel="shortcut icon" href="<?= asset('img/assets/favicon.ico') ?>">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" class="js-stylesheet" href="<?= asset('css/light.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/custom.css') ?>">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
	 integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/notyf/3.10.0/notyf.min.js" integrity="sha512-467grL09I/ffq86LVdwDzi86uaxuAhFZyjC99D6CC1vghMp1YAs+DqCgRvhEtZIKX+o9lR0F2bro6qniyeCMEQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
	<div class="wrapper">
		<?php Sidebar::sidebarDivision($_SESSION['division']); ?>
		<div class="main">
			<?php include_once 'components/navigation.php' ?>
            <?php Flasher::notyf(); ?>
            <?php Flasher::flash(); ?>
			<main class="content">
				<div class="container-fluid">