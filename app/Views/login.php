<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card p-4">
                    <h2 class="text-center text-primary-custom mb-4">Login</h2>

                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?= esc($error) ?></div>
                    <?php endif; ?>

                    <form method="post" action="<?= base_url('login') ?>">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                   value="<?= old('email') ?>" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Log in</button>
                    </form>

                    <p class="text-center mt-3 mb-0">
                        No account? <a href="<?= base_url('register') ?>">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
