<?php
namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function __construct(
        private Product $model
    ){}

    public function getAll() : Collection
    {
        return $this->model->all();
    }
}
