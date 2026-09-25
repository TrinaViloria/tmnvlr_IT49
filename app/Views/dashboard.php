<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="card p-5">
            <h1 class="text-primary-custom">Welcome, <?= esc($userName) ?>!</h1>
            <p class="lead mb-0">You are now logged in to your dashboard.</p>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
