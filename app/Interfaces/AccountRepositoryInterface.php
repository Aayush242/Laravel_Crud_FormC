<?php

// namespace App\Repositories;
namespace App\Interfaces;


use App\Models\Account;

interface AccountRepositoryInterface
{
    public function all();
    public function create($data);
    public function find($id);
    public function update($id, $input);
    public function update2($id, $input);
    public function delete($id);
}

?>

