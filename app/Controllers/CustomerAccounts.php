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
}
