<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProductFormRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * @var Product
     */
    private $product, $totalPage = 10;

    /**
     * ProductController constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StoreUpdateProductFormRequest $request)
    {
        $products = $this->product->getResults($request->all(), $this->totalPage);

        return response()->json($products);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductFormRequest $request)
    {
        $product = $this->product->create($request->all());

        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductFormRequest $request, $id)
    {
        $product = $this->product->find($id);
        if (!$product) {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        }

        $product->update($request->all());

        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
