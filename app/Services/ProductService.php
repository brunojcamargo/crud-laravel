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

    public function create(array $req) : Product|string
    {
        try {
            $product = new Product($req);
            if(!$product->save()){
                return 'Error on save product';
            }
            return $product;
        } catch (\Exception $th) {
            return 'Internal error';
        }
    }

    public function update(array $req, Product $product) : Product|string
    {
        try {
            if(!$product->update($req)){
                return 'Error on update product';
            }
            return $product;
        } catch (\Exception $th) {
            return 'Internal error';
        }
    }
}
