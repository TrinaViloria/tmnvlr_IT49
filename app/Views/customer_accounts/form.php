<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between gap-3 mb-4">
            <div><span class="dashboard-kicker">Customer accounts</span><h1 class="mb-0"><?= isset($account['id']) ? 'Edit account' : 'Add account' ?></h1></div>
            <a href="<?= site_url('customer-accounts') ?>" class="btn btn-outline-primary">Cancel</a>
        </div>
        <?php $errors = session('errors') ?? []; if ($errors): ?><div class="alert alert-danger"><ul class="mb-0"><?php foreach ($errors as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
        <div class="card p-4"><form method="post" action="<?= esc($formAction) ?>">
            <?= csrf_field() ?>
            <?php if ($formMethod !== 'post'): ?><input type="hidden" name="_method" value="<?= esc($formMethod) ?>"><?php endif; ?>
            <div class="row g-3">
                <?php $fields = [['account_number', 'Account number', 'text', true], ['customer_name', 'Customer name', 'text', true], ['address', 'Address', 'text', true], ['phone', 'Phone', 'text', false], ['email', 'Email', 'email', false], ['meter_number', 'Meter number', 'text', false]]; foreach ($fields as [$name, $label, $type, $required]): ?><div class="col-md-<?= $name === 'address' ? '12' : '6' ?>"><label class="form-label" for="<?= $name ?>"><?= $label ?></label><input class="form-control" id="<?= $name ?>" name="<?= $name ?>" type="<?= $type ?>" value="<?= esc(old($name, $account[$name] ?? '')) ?>" <?= $required ? 'required' : '' ?>></div><?php endforeach; ?>
                <div class="col-md-6"><label class="form-label" for="connection_type">Connection type</label><select class="form-select" id="connection_type" name="connection_type" required><?php foreach (['residential', 'commercial', 'industrial'] as $value): ?><option value="<?= $value ?>" <?= old('connection_type', $account['connection_type'] ?? 'residential') === $value ? 'selected' : '' ?>><?= ucfirst($value) ?></option><?php endforeach; ?></select></div>
                <div class="col-md-6"><label class="form-label" for="status">Status</label><select class="form-select" id="status" name="status" required><?php foreach (['active', 'inactive', 'suspended'] as $value): ?><option value="<?= $value ?>" <?= old('status', $account['status'] ?? 'active') === $value ? 'selected' : '' ?>><?= ucfirst($value) ?></option><?php endforeach; ?></select></div>
            </div>
            <div class="mt-4"><button class="btn btn-primary" type="submit"><?= isset($account['id']) ? 'Save changes' : 'Create account' ?></button></div>
        </form></div>
    </div>
</section>
<?= $this->endSection() ?>
