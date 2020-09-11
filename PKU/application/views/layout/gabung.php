<!DOCTYPE html>
<html lang="en">

<head>

<?php $this->load->view("layout/header"); ?>

</head>
<body class="animsition">
<div class="page-wrapper">

<?php $this->load->view("layout/navigasi"); ?>

<?php $this->load->view($view); ?>

</div>

<?php $this->load->view("layout/footer"); ?>


<?php 
if (isset($script)){$this->load->view($script);} ?>

<?php 
if (isset($modal)){foreach($modal as $modalview){$this->load->view($modalview);}} ?>
</body>

</html>

