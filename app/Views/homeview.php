<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<?php include(APPPATH . 'Views/partials/hero.php'); ?>
<?php include(APPPATH . 'Views/partials/carousel.php'); ?>
<?php include(APPPATH . 'Views/partials/allsearch.php'); ?>
<?php include(APPPATH . 'Views/partials/owningsteps.php'); ?>
<?php //include(APPPATH . 'Views/partials/hero.php'); ?>
<?= $this->endSection() ?>