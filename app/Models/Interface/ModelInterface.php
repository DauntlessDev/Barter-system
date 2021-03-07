<?php

namespace App\Models\Interface;

interface ModelInterface
{
    public function get($id, $options);

    public function create($data);

    public function update($data, $options);

    public function delete($data);
}