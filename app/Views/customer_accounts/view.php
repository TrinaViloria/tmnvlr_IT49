<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details - Puihaha Electric Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; padding: 20px 0; }
        .main-container { background: white; border-radius: 15px; box-shadow: 0 10px 40px rgba(0,0,0,.1); padding: 30px; margin: 20px auto; max-width: 800px; }
        .header-section { text-align: center; margin-bottom: 30px; }
        .header-section h1 { color: #667eea; font-weight: bold; }
        .info-group { margin-bottom: 20px; padding: 15px; background: #f8f9fa; border-radius: 8px; }
        .info-label { font-weight: bold; color: #666; margin-bottom: 5px; }
        .info-value { font-size: 1.1rem; color: #333; }
    </style>
</head><body><div class="container"><div class="main-container">
    <div class="header-section"><h1><i class="bi bi-lightning-charge-fill text-warning"></i> Puihaha Electric Company</h1><p class="text-muted">Customer Account Details</p></div>
    <div class="mb-4"><a href="<?= site_url('customer-accounts') ?>" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back to Dashboard</a></div>
    <div class="card"><div class="card-header bg-primary text-white"><h4 class="mb-0"><i class="bi bi-person-circle"></i> Account Information</h4></div><div class="card-body">
        <?php foreach ([['Account Number', $account['account_number']], ['Customer Name', $account['customer_name']], ['Address', $account['address']], ['Phone', $account['phone']], ['Email', $account['email']], ['Meter Number', $account['meter_number']], ['Connection Type', ucfirst($account['connection_type'])], ['Status', ucfirst($account['status'])]] as [$label, $value]): ?><div class="info-group"><div class="info-label"><?= $label ?></div><div class="info-value"><?= esc($value) ?></div></div><?php endforeach; ?>
    </div></div>
    <div class="mt-4 text-center"><a href="<?= site_url('customer-accounts') ?>" class="btn btn-primary btn-lg"><i class="bi bi-house-door-fill"></i> Back to Dashboard</a></div>
</div></div></body></html>
