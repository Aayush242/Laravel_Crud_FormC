<?php

namespace App\Repositories;
use App\Models\Account;
use App\Interfaces\AccountRepositoryInterface;
use App\Models\Contact;

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
            {

                $contact = Contact::first();
            
                $accounts = Account::with('contacts')->first();
            
                $accounts->contacts()->attach($contact);
            
            }
            
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