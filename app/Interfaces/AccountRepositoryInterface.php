<?php

// namespace App\Repositories;
namespace App\Interfaces;
use Illuminate\Support\Facades\DB;


use App\Models\Account;

interface AccountRepositoryInterface
{
    public function all($fields);
    public function create($data);
    public function find($id);
    public function update($id, $input);
    public function delete($id);
}

?>

