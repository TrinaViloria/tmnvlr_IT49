<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Customer Accounts - Puihaha Electric') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root { --burgundy: #6f1d2f; --rose: #b83a54; --black: #0d0d0f; --ink: #211b1e; --muted: #756a6e; --line: #eadfe2; }
        * { box-sizing: border-box; }
        body { min-height: 100vh; margin: 0; padding: 28px 0; color: var(--ink); background: #faf8f8; font-family: Inter, system-ui, -apple-system, sans-serif; }
        .dashboard-shell { width: min(1180px, calc(100% - 32px)); margin: 0 auto; }
        .dashboard-topbar { display: flex; align-items: center; justify-content: space-between; gap: 20px; margin-bottom: 50px; }
        .brand { display: inline-flex; align-items: center; gap: 10px; color: var(--black); font-size: 1rem; font-weight: 700; text-decoration: none; }
        .brand-mark { display: grid; width: 32px; height: 32px; place-items: center; border-radius: 9px; color: #fff; background: var(--burgundy); }
        .topbar-links { display: flex; align-items: center; gap: 20px; }
        .topbar-links a { color: var(--muted); font-size: .82rem; font-weight: 600; text-decoration: none; }
        .topbar-links a:hover { color: var(--burgundy); }
        .logout-link { display: inline-flex; align-items: center; gap: 7px; padding: 9px 13px; border: 1px solid #d9c9ce; border-radius: 7px; color: var(--burgundy) !important; }
        .logout-link:hover { color: #fff !important; background: var(--burgundy); }
        .dashboard-heading { display: flex; align-items: end; justify-content: space-between; gap: 20px; margin-bottom: 28px; }
        .eyebrow { display: block; margin-bottom: 10px; color: var(--rose); font-size: .7rem; font-weight: 800; letter-spacing: .13em; text-transform: uppercase; }
        h1 { margin: 0; color: var(--black); font-size: clamp(2rem, 4vw, 3rem); letter-spacing: -.06em; }
        .subtitle { margin: 10px 0 0; color: var(--muted); font-size: .92rem; }
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 30px; }
        .stat-card { padding: 20px; border: 1px solid var(--line); border-radius: 10px; background: #fff; }
        .stat-card strong { display: block; margin-bottom: 7px; color: var(--burgundy); font-size: 1.8rem; letter-spacing: -.04em; }
        .stat-card span { color: var(--muted); font-size: .75rem; font-weight: 600; }
        .filter-panel { margin-bottom: 22px; padding: 18px; border: 1px solid var(--line); border-radius: 10px; background: #fff; }
        .form-control, .form-select { min-height: 42px; border-color: var(--line); border-radius: 7px; font-size: .82rem; }
        .form-control:focus, .form-select:focus { border-color: var(--rose); box-shadow: 0 0 0 .2rem rgba(184,58,84,.12); }
        .btn-primary { border-color: var(--burgundy); background: var(--burgundy); font-size: .82rem; }
        .btn-primary:hover { border-color: #531524; background: #531524; }
        .table-panel { overflow: hidden; border: 1px solid var(--line); border-radius: 10px; background: #fff; }
        .table { margin: 0; color: var(--ink); font-size: .8rem; }
        .table thead th { padding: 14px 16px; border: 0; color: #ead9dd; background: var(--black); font-size: .68rem; font-weight: 700; letter-spacing: .05em; text-transform: uppercase; white-space: nowrap; }
        .table tbody td { padding: 15px 16px; border-color: #f0e8ea; vertical-align: middle; white-space: nowrap; }
        .table tbody tr:hover { background: #fff8fa; }
        .badge { padding: 6px 8px; border-radius: 5px; font-size: .65rem; font-weight: 700; }
        .badge.bg-info { color: var(--burgundy) !important; background: #f7e9ed !important; }
        .badge-active { color: #25613f; background: #e7f3eb; }
        .badge-inactive { color: #6f1d2f; background: #f7e6ea; }
        .badge-suspended { color: #795b16; background: #fbf1d6; }
        .btn-outline-primary { border-color: #d9c9ce; color: var(--burgundy); font-size: .72rem; }
        .btn-outline-primary:hover { border-color: var(--burgundy); color: #fff; background: var(--burgundy); }
        .pagination { margin: 22px 0 0; }
        .pagination a, .pagination span { color: var(--burgundy); }
        @media (max-width: 760px) { body { padding: 18px 0; } .dashboard-topbar, .dashboard-heading { align-items: flex-start; flex-direction: column; } .topbar-links { width: 100%; justify-content: space-between; } .stats-grid { grid-template-columns: repeat(2, 1fr); } .table-panel { overflow-x: auto; } }
        @media (max-width: 420px) { .stats-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <main class="dashboard-shell">
        <header class="dashboard-topbar">
            <a class="brand" href="<?= base_url() ?>"><span class="brand-mark"><i class="bi bi-lightning-charge-fill" aria-hidden="true"></i></span> Puihaha Electric</a>
            <nav class="topbar-links" aria-label="Account navigation">
                <a href="<?= base_url() ?>">Back to website</a>
                <a class="logout-link" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right" aria-hidden="true"></i> Log out</a>
            </nav>
        </header>

        <section class="dashboard-heading">
            <div><span class="eyebrow">Customer dashboard</span><h1>Account overview</h1><p class="subtitle">A clear view of your customer accounts and service status.</p></div>
            <a href="<?= site_url('customer-accounts/new') ?>" class="btn btn-primary"><i class="bi bi-plus-lg" aria-hidden="true"></i> Add account</a>
        </section>

        <?php if (session('success')): ?><div class="alert alert-success"><?= esc(session('success')) ?></div><?php endif; ?>
        <?php if (session('error')): ?><div class="alert alert-danger"><?= esc(session('error')) ?></div><?php endif; ?>

        <section class="stats-grid" aria-label="Account summary">
            <div class="stat-card"><strong><?= $total_accounts ?></strong><span>Total accounts</span></div>
            <div class="stat-card"><strong><?= $active_accounts ?></strong><span>Active accounts</span></div>
            <div class="stat-card"><strong><?= $inactive_accounts ?></strong><span>Inactive accounts</span></div>
            <div class="stat-card"><strong><?= $suspended_accounts ?></strong><span>Suspended accounts</span></div>
        </section>

        <section class="filter-panel" aria-label="Filter customer accounts">
            <form method="get" action="<?= current_url() ?>"><div class="row g-2">
                <div class="col-md-4"><input type="text" class="form-control" name="search" placeholder="Search accounts" value="<?= esc($search_keyword) ?>"></div>
                <div class="col-md-3"><select class="form-select" name="status"><option value="">All statuses</option><?php foreach (['active', 'inactive', 'suspended'] as $value): ?><option value="<?= $value ?>" <?= $filter_status === $value ? 'selected' : '' ?>><?= ucfirst($value) ?></option><?php endforeach; ?></select></div>
                <div class="col-md-3"><select class="form-select" name="type"><option value="">All types</option><?php foreach (['residential', 'commercial', 'industrial'] as $value): ?><option value="<?= $value ?>" <?= $filter_type === $value ? 'selected' : '' ?>><?= ucfirst($value) ?></option><?php endforeach; ?></select></div>
                <div class="col-md-2"><button type="submit" class="btn btn-primary w-100"><i class="bi bi-search" aria-hidden="true"></i> Search</button></div>
            </div></form>
            <?php if ($search_keyword || $filter_status || $filter_type): ?><a href="<?= current_url() ?>" class="btn btn-sm btn-link ps-0 mt-2" style="color: var(--burgundy);">Clear filters</a><?php endif; ?>
        </section>

        <section class="table-panel"><div class="table-responsive"><table class="table"><thead><tr><th>Account number</th><th>Customer name</th><th>Email</th><th>Phone</th><th>Connection type</th><th>Status</th><th>Action</th></tr></thead><tbody>
            <?php if ($accounts === []): ?><tr><td colspan="7" class="text-center text-muted py-4">No accounts found</td></tr><?php else: foreach ($accounts as $account): ?><tr><td><strong><?= esc($account['account_number']) ?></strong></td><td><?= esc($account['customer_name']) ?></td><td><?= esc($account['email']) ?></td><td><?= esc($account['phone']) ?></td><td><span class="badge bg-info"><?= ucfirst(esc($account['connection_type'])) ?></span></td><td><span class="badge badge-<?= esc($account['status']) ?>"><?= ucfirst(esc($account['status'])) ?></span></td><td class="d-flex gap-1"><a href="<?= site_url('customer-accounts/' . $account['id']) ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye" aria-hidden="true"></i> View</a><a href="<?= site_url('customer-accounts/' . $account['id'] . '/edit') ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil" aria-hidden="true"></i> Edit</a></td></tr><?php endforeach; endif; ?>
        </tbody></table></div></section>
        <?= $pager->links() ?>
    </main>
</body>
</html>
