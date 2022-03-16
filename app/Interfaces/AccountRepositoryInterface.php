<?php

// namespace App\Repositories;
namespace App\Interfaces;


use App\Models\Account;

interface AccountRepositoryInterface
{
    public function all();
    public function create($data);
    public function find($id);
    public function update($id, $data);
    public function delete($id);
}

?>

