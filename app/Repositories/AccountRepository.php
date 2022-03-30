<?php

namespace App\Repositories;
use App\Models\Account;
use App\Interfaces\AccountRepositoryInterface;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

    class AccountRepository implements AccountRepositoryInterface
    {
        public function all($fields)
        {
            $accounts = Account::all($fields);
            return $accounts;
        }


        public function create($data)
        {
          $val = Account::create($data);
            {

                $contact = Contact::first();
            
                $accounts = Account::with('contacts')->first();
            
                $accounts->contacts()->attach($contact);
            
            }
            return($val);
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

        // public function update2($id, $input)
        // {
        //     // $input = $input->all();
        //     $account = Account::find($id);
        //     // $account->fill($input)->save();
        //     $updated_data= $account->update($input);

        // }

        public function delete($id)
        {
            $account = Account::find($id);
            $val = $account->delete($id);
            return ("Deleted");

        }
        
    }
?>