<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerAccountModel extends Model
{
    protected $table = 'customer_accounts';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'account_number', 'customer_name', 'address', 'phone', 'email',
        'meter_number', 'connection_type', 'status',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'account_number'  => 'required|max_length[30]|is_unique[customer_accounts.account_number,id,{id}]',
        'customer_name'   => 'required|min_length[2]|max_length[150]',
        'address'         => 'required|max_length[255]',
        'phone'           => 'permit_empty|max_length[30]',
        'email'           => 'permit_empty|valid_email|max_length[255]',
        'meter_number'    => 'permit_empty|max_length[30]|is_unique[customer_accounts.meter_number,id,{id}]',
        'connection_type' => 'required|in_list[residential,commercial,industrial]',
        'status'          => 'required|in_list[active,inactive,suspended]',
    ];

    protected $validationMessages = [
        'account_number' => ['is_unique' => 'That account number is already in use.'],
        'meter_number' => ['is_unique' => 'That meter number is already in use.'],
    ];

    public function getFilteredAccounts(array $filters, int $perPage = 10): array
    {
        if ($filters['search'] !== '') {
            $this->groupStart()
                ->like('account_number', $filters['search'])
                ->orLike('customer_name', $filters['search'])
                ->orLike('email', $filters['search'])
                ->orLike('phone', $filters['search'])
                ->groupEnd();
        }

        if ($filters['status'] !== '') {
            $this->where('status', $filters['status']);
        }

        if ($filters['type'] !== '') {
            $this->where('connection_type', $filters['type']);
        }

        return $this->orderBy('created_at', 'DESC')->paginate($perPage);
    }

    public function getTotalAccounts(): int
    {
        return $this->countAllResults();
    }

    public function getCountByStatus(string $status): int
    {
        return $this->where('status', $status)->countAllResults();
    }
}
