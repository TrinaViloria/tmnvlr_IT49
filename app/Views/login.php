<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Login - Puihaha Electric') ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/login.css?v=2') ?>">
</head>
<body>
    <?php if ($error = session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= esc($error) ?></div>
    <?php endif; ?>
    <?php if ($success = session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= esc($success) ?></div>
    <?php endif; ?>
    <main class="login-card">
        <section class="login-form-panel">
            <form action="<?= base_url('login') ?>" method="post" class="login-form">
                <?= csrf_field() ?>
                <a class="brand" href="<?= base_url() ?>" aria-label="Puihaha Electric home">
                    <span class="brand-mark"><i class="fa-solid fa-bolt" aria-hidden="true"></i></span>
                    <span>Puihaha <strong>Electric</strong></span>
                </a>
                <span class="eyebrow">Customer portal</span>
                <h1>Welcome back.</h1>
                <p class="intro">Sign in to manage your services, requests, and account details.</p>
                <label for="email">Email address</label>
                <div class="input-shell">
                    <i class="fa-regular fa-envelope" aria-hidden="true"></i>
                    <input type="email" name="email" id="email" value="<?= esc(old('email')) ?>" placeholder="you@example.com" autocomplete="email" required autofocus>
                </div>
                <div class="field-heading">
                    <label for="password">Password</label>
                    <a href="<?= base_url('contact') ?>">Need help?</a>
                </div>
                <div class="password-wrapper">
                    <i class="fa-solid fa-lock" aria-hidden="true"></i>
                    <input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="current-password" required>
                    <button type="button" class="password-toggle" id="passwordToggle" aria-label="Show password"><i class="fa-solid fa-eye-slash" aria-hidden="true"></i></button>
                </div>
                <button type="submit" class="login-button">Sign in <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></button>
                <p class="register-link">New to Puihaha Electric? <a href="<?= base_url('register') ?>">Create an account</a></p>
            </form>
        </section>
        <aside class="login-welcome-panel">
            <div class="welcome-content">
                <div class="panel-kicker"><span></span> Reliable power, made simple</div>
                <h2>Keep your home<br><em>running bright.</em></h2>
                <p>One secure place for your electrical services, updates, and support.</p>
                <div class="welcome-features">
                    <div><i class="fa-solid fa-shield-halved" aria-hidden="true"></i><span><strong>Trusted service</strong><small>Licensed professionals</small></span></div>
                    <div><i class="fa-solid fa-headset" aria-hidden="true"></i><span><strong>Always connected</strong><small>Support when you need it</small></span></div>
                </div>
            </div>
            <span class="welcome-bolt"><i class="fa-solid fa-bolt" aria-hidden="true"></i></span>
        </aside>
    </main>
    <script src="<?= base_url('public/assets/js/login.js') ?>"></script>
</body>
</html>

