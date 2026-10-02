<?php

namespace App\Controllers;

use App\Models\CustomerAccountModel;

class CustomerAccounts extends BaseController
{
    public function index()
    {
        $model = new CustomerAccountModel();
        $status = (string) $this->request->getGet('status');
        $type = (string) $this->request->getGet('type');

        $filters = [
            'search' => trim((string) $this->request->getGet('search')),
            'status' => in_array($status, ['active', 'inactive', 'suspended'], true) ? $status : '',
            'type' => in_array($type, ['residential', 'commercial', 'industrial'], true) ? $type : '',
        ];

        return view('customer_accounts/index', [
            'title' => 'Customer Accounts - Puihaha Electric',
            'page' => 'customer-accounts',
            'accounts' => $model->getFilteredAccounts($filters),
            'pager' => $model->pager,
            'total_accounts' => $model->getTotalAccounts(),
            'active_accounts' => $model->getCountByStatus('active'),
            'inactive_accounts' => $model->getCountByStatus('inactive'),
            'suspended_accounts' => $model->getCountByStatus('suspended'),
            'search_keyword' => $filters['search'],
            'filter_status' => $filters['status'],
            'filter_type' => $filters['type'],
        ]);
    }

    public function viewAccount(int $id)
    {
        $account = (new CustomerAccountModel())->find($id);

        if ($account === null) {
            return redirect()->to('/customer-accounts')->with('error', 'Account not found.');
        }

        return view('customer_accounts/view', [
            'title' => 'Account Details - Puihaha Electric',
            'page' => 'customer-accounts',
            'account' => $account,
        ]);
    }

    public function new()
    {
        return view('customer_accounts/form', [
            'title' => 'Add Customer Account - Puihaha Electric',
            'page' => 'customer-accounts',
            'account' => [],
            'formAction' => site_url('customer-accounts'),
            'formMethod' => 'post',
        ]);
    }

    public function create()
    {
        $model = new CustomerAccountModel();
        $data = $this->accountData();

        if (! $model->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/customer-accounts')->with('success', 'Customer account created successfully.');
    }

    public function edit(int $id)
    {
        $account = (new CustomerAccountModel())->find($id);

        if ($account === null) {
            return redirect()->to('/customer-accounts')->with('error', 'Account not found.');
        }

        return view('customer_accounts/form', [
            'title' => 'Edit Customer Account - Puihaha Electric',
            'page' => 'customer-accounts',
            'account' => $account,
            'formAction' => site_url('customer-accounts/' . $id),
            'formMethod' => 'put',
        ]);
    }

    public function update(int $id)
    {
        $model = new CustomerAccountModel();
        $data = $this->accountData();
        $data['id'] = $id;

        if (! $model->find($id)) {
            return redirect()->to('/customer-accounts')->with('error', 'Account not found.');
        }

        if (! $model->save($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/customer-accounts/' . $id)->with('success', 'Customer account updated successfully.');
    }

    public function delete(int $id)
    {
        $model = new CustomerAccountModel();

        if (! $model->find($id)) {
            return redirect()->to('/customer-accounts')->with('error', 'Account not found.');
        }

        $model->delete($id);

        return redirect()->to('/customer-accounts')->with('success', 'Customer account deleted successfully.');
    }

    private function accountData(): array
    {
        return [
            'account_number' => trim((string) $this->request->getPost('account_number')),
            'customer_name' => trim((string) $this->request->getPost('customer_name')),
            'address' => trim((string) $this->request->getPost('address')),
            'phone' => trim((string) $this->request->getPost('phone')),
            'email' => trim((string) $this->request->getPost('email')),
            'meter_number' => trim((string) $this->request->getPost('meter_number')),
            'connection_type' => (string) $this->request->getPost('connection_type'),
            'status' => (string) $this->request->getPost('status'),
        ];
    }
}
