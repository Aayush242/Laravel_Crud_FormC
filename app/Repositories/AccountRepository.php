<?php

namespace App\Repositories;
use App\Models\Account;
use App\Interfaces\AccountRepositoryInterface;


    class AccountRepository implements AccountRepositoryInterface
    {
        public function all()
        {
            $accounts = Account::all();
            return $accounts;
        }

        public function create($data)
        {
            Account::create($data);
        }

        public function find($id) 
        {
            $account = Account::find($id);
            return $account;
        }

        public function update($id, $data)
        {
            $input = $data->all();
            $account = Account::find($id);
            $account->fill($input)->save();
        }

        public function delete($id)
        {
            return Account::find($id)->delete();
        }
        
    }
?>