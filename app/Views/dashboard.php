<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="dashboard-header">
            <div>
                <span class="dashboard-kicker">Customer dashboard</span>
                <h1>Welcome, <?= esc($userName) ?>.</h1>
                <p>Manage your Puihaha Electric account from one simple place.</p>
            </div>
            <a class="dashboard-logout" href="<?= base_url('logout') ?>"><i class="fas fa-arrow-right-from-bracket" aria-hidden="true"></i> Log out</a>
        </div>
        <div class="row g-3 mt-2">
            <div class="col-md-4"><a class="text-decoration-none text-reset" href="<?= site_url('customer-accounts') ?>"><article class="dashboard-card"><span class="dashboard-card-icon"><i class="fas fa-file-invoice" aria-hidden="true"></i></span><span class="dashboard-card-label">Account</span><strong>Manage accounts</strong><small>Create, view, edit, and delete customer account records.</small></article></a></div>
            <div class="col-md-4"><article class="dashboard-card"><span class="dashboard-card-icon"><i class="fas fa-calendar-check" aria-hidden="true"></i></span><span class="dashboard-card-label">Services</span><strong>Request a service</strong><small>Get support for your next electrical project.</small></article></div>
            <div class="col-md-4"><article class="dashboard-card"><span class="dashboard-card-icon"><i class="fas fa-headset" aria-hidden="true"></i></span><span class="dashboard-card-label">Support</span><strong>We are here to help</strong><small>Reach our team for questions or assistance.</small></article></div>
        </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
