<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateProductRequest;
use App\Http\Requests\Api\UpdateProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $service
    ) {
    }

    /**
     * Listagem de produtos
     */
    public function index()
    {
        return response()->json($this->service->getAll(), Response::HTTP_OK);
    }

    /**
     * Cadastro de produtos
     */
    public function store(CreateProductRequest $request)
    {
        $newProduct = $this->service->create($request->all());
        return response()->json($newProduct, ($newProduct instanceof Product) ?
            Response::HTTP_CREATED :
            Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Consulta produto
     */
    public function show(Product $product)
    {
        return response()->json($product,Response::HTTP_OK);
    }

    /**
     * Atualização de produto
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $newProduct = $this->service->update($request->all(), $product);
        return response()->json($newProduct, ($newProduct instanceof Product) ?
            Response::HTTP_OK :
            Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Exclusão de produto
     */
    public function destroy(Product $product)
    {
        return response()->json('',($this->service->delete($product))?
        Response::HTTP_NO_CONTENT :
        Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
