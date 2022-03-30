<?php

namespace App\Interfaces;
use Illuminate\Support\Facades\DB;


use App\Models\Contact;

interface ContactRepositoryInterface
{
    public function all();
    public function create($data);
    public function find($id);
    public function update($id, $data);
    public function delete($id);
}

?>

