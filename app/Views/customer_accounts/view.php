<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details - Puihaha Electric Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root { --burgundy: #6f1d2f; --rose: #b83a54; --ink: #211b1e; --muted: #756a6e; --line: #eadfe2; }
        body { min-height: 100vh; padding: 28px 0; color: var(--ink); background: #faf8f8; font-family: Inter, system-ui, -apple-system, sans-serif; }
        .dashboard-shell { width: min(880px, calc(100% - 32px)); margin: 0 auto; }
        .dashboard-topbar { display: flex; align-items: center; justify-content: space-between; gap: 20px; margin-bottom: 42px; }
        .brand { display: inline-flex; align-items: center; gap: 10px; color: #0d0d0f; font-size: 1rem; font-weight: 700; text-decoration: none; }
        .brand-mark { display: grid; width: 32px; height: 32px; place-items: center; border-radius: 9px; color: #fff; background: var(--burgundy); }
        .topbar-links { display: flex; align-items: center; gap: 20px; }.topbar-links a { color: var(--muted); font-size: .82rem; font-weight: 600; text-decoration: none; }.topbar-links a:hover { color: var(--burgundy); }
        .logout-link { display: inline-flex; align-items: center; gap: 7px; padding: 9px 13px; border: 1px solid #d9c9ce; border-radius: 7px; color: var(--burgundy) !important; }.logout-link:hover { color: #fff !important; background: var(--burgundy); }
        .main-container { padding: 30px; border: 1px solid var(--line); border-radius: 14px; background: #fff; box-shadow: 0 12px 30px rgba(13,13,15,.06); }
        .header-section { margin-bottom: 26px; }.header-section h1 { margin: 0; color: var(--ink); font-size: clamp(1.7rem, 4vw, 2.4rem); letter-spacing: -.05em; }.header-section h1 i { color: var(--rose) !important; }.header-section p { margin: 8px 0 0; color: var(--muted); }
        .info-group { margin-bottom: 12px; padding: 15px; border: 1px solid #f0e7e9; border-radius: 8px; background: #fffafa; }.info-label { margin-bottom: 5px; color: var(--muted); font-size: .7rem; font-weight: 700; letter-spacing: .06em; text-transform: uppercase; }.info-value { color: var(--ink); font-size: 1rem; }
        .card { border: 1px solid var(--line); box-shadow: none; }.card-header { border: 0; background: var(--burgundy) !important; }.btn-primary { border-color: var(--burgundy); background: var(--burgundy); }.btn-primary:hover { border-color: #531524; background: #531524; }.btn-secondary { border-color: #d9c9ce; color: var(--burgundy); background: #fff; }.btn-secondary:hover { border-color: var(--burgundy); color: #fff; background: var(--burgundy); }.btn-danger { border-color: #a1334b; background: #a1334b; }
        @media (max-width: 600px) { body { padding: 18px 0; }.dashboard-topbar { align-items: flex-start; flex-direction: column; }.topbar-links { width: 100%; justify-content: space-between; }.main-container { padding: 20px; } }
    </style>
</head><body><main class="dashboard-shell">
    <header class="dashboard-topbar"><a class="brand" href="<?= base_url() ?>"><span class="brand-mark"><i class="bi bi-lightning-charge-fill" aria-hidden="true"></i></span> Puihaha Electric</a><nav class="topbar-links" aria-label="Account navigation"><a href="<?= site_url('customer-accounts') ?>">All accounts</a><a class="logout-link" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right" aria-hidden="true"></i> Log out</a></nav></header>
    <div class="main-container">
    <div class="header-section"><h1><i class="bi bi-lightning-charge-fill"></i> Account details</h1><p>Review the customer account information below.</p></div>
    <?php if (session('success')): ?><div class="alert alert-success"><?= esc(session('success')) ?></div><?php endif; ?>
    <div class="mb-4 d-flex gap-2"><a href="<?= site_url('customer-accounts') ?>" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back to Dashboard</a><a href="<?= site_url('customer-accounts/' . $account['id'] . '/edit') ?>" class="btn btn-primary"><i class="bi bi-pencil"></i> Edit</a><form method="post" action="<?= site_url('customer-accounts/' . $account['id'] . '/delete') ?>" onsubmit="return confirm('Delete this customer account?');" class="d-inline"><?= csrf_field() ?><button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button></form></div>
    <div class="card"><div class="card-header bg-primary text-white"><h4 class="mb-0"><i class="bi bi-person-circle"></i> Account Information</h4></div><div class="card-body">
        <?php foreach ([['Account Number', $account['account_number']], ['Customer Name', $account['customer_name']], ['Address', $account['address']], ['Phone', $account['phone']], ['Email', $account['email']], ['Meter Number', $account['meter_number']], ['Connection Type', ucfirst($account['connection_type'])], ['Status', ucfirst($account['status'])]] as [$label, $value]): ?><div class="info-group"><div class="info-label"><?= $label ?></div><div class="info-value"><?= esc($value) ?></div></div><?php endforeach; ?>
    </div></div>
    <div class="mt-4 text-center"><a href="<?= site_url('customer-accounts') ?>" class="btn btn-primary btn-lg"><i class="bi bi-house-door-fill"></i> Back to Dashboard</a></div>
</div></main></body></html>
