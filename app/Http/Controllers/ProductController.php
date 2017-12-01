<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function add() {

		return view('product/form');
	}

	public function index() {
		$product_data = Storage::disk('local')->get('product.json');

		$products = json_decode($product_data);

		return view('product/index', array('products' => $products));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request) {
		$validatedData = $request->validate([
			'name' => 'required|max:255',
			'stock' => 'required|numeric',
			'price' => 'required|numeric',
		]);
		//	print_r(asset('storage/product.json'));

		$product = array(
			'name' => $request['name'],
			'qty' => $request['stock'],
			'price' => $request['price'],

		);

		$inp = Storage::disk('local')->get('product.json');
		$tempArray = array();
		if (!empty($inp)) {
			$tempArray = json_decode($inp);
		}
		array_push($tempArray, $product);
		$jsonData = json_encode($tempArray);

		Storage::put('product.json', $jsonData);
		return redirect('products');
	}

}
