<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Redirect to product form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('product-create');
    }

    /**
     * Add new product to DB
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addProduct(Request $request)
    {
        $data = $request->only(['name', 'quantity', 'price']);

        $data['datetime_submitted'] = date('Y-m-d H:i:s');

        $existingJson = file_get_contents(base_path('resources/productData.json'));

        $existingJsonData = json_decode($existingJson, true);

        $existingJsonData[] = $data;

        file_put_contents(base_path('resources/productData.json'),
            stripslashes(json_encode($existingJsonData, JSON_PRETTY_PRINT)));

        foreach ($existingJsonData as $value)
        {
            $parsedArray[]['Product name'] = $value['name'];
            $parsedArray[]['Quantity in stock'] = $value['quantity'];
            $parsedArray[]['Price per item'] = $value['price'];
            $parsedArray[]['Datetime submitted'] = $value['datetime_submitted'];
            $parsedArray[]['Total value number'] = $value['quantity'] * $value['price'];
        }

        return json_encode($parsedArray, JSON_PRETTY_PRINT);
    }
}
