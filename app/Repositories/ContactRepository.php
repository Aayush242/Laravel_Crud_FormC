<?php

namespace App\Repositories;
use App\Models\Contact;
use App\Interfaces\ContactRepositoryInterface;


    class ContactRepository implements ContactRepositoryInterface
    {
        public function all()
        {
            $contact = Contact::all();
            return $contact;
        }

        public function create($data)
        {
            Contact::create($data);
        }

        public function find($id) 
        {
            $contact = Contact::find($id);
            return $contact;
        }

        public function update($id, $data)
        {
            $input = $data->all();
            $contact = Contact::find($id);
            $contact->fill($input)->save();
        }

        public function delete($id)
        {
            return Contact::find($id)->delete();
        }
        
    }
?>