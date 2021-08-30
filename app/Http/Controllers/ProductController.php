<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductValidate;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $responseCode = 200;
        $products = Product::where('user_id', auth()->user()->id)->get();
        if (empty($products)) {
            $responseCode = 404;
        }
        return response()->json(['data' => $products], $responseCode);
    }
    public function store(ProductValidate $request)
    {
        $product =  Product::create([
            'user_id' => auth()->user()->id,
            'title' => request('title'),
            'slug' => str_replace(' ', '-', strtolower(request('title'))),
            'price' => request('price'),
            'currency' => request('currency'),
            'description' => request('description'),
            'shipping' => request('shipping'),
            'shipment_usa' => request('shipment_usa'),
            'shipment_int' => request('shipment_int'),
            'image_style' => request('image_style'),
            'product_type' => request('product_type'),
            'image_header_ratio' => request('image_header_ratio'),
            'image_header_image' => request('image_header_image'),
            'size_color_pickers' => request('size_color_pickers'),
            'description_style' => request('description_style'),
            'checkout_style' => request('checkout_style')
        ]);

        if (request()->hasFile('image1')) {
            $img = request()->file('image1');
            $fileName = $this->resizeImage($img, $product);
            if (!empty($product->image1)) {
                Storage::disk('local')->delete('public/products/' . $product->slug . '_' . $product->id . '/images/' . $product->image1);
            }
            $product->image1 = $fileName;
        }

        if (request()->hasFile('image2')) {
            $img = request()->file('image2');
            $fileName = $this->resizeImage($img, $product);
            if (!empty($product->image2)) {
                Storage::disk('local')->delete('public/' . $product->slug . '_' . $product->id . '/images/' . $product->image2);
            }
            $product->image2 = $fileName;
        }

        if (request()->hasFile('image3')) {
            $img = request()->file('image3');
            $fileName = $this->resizeImage($img, $product);
            if (!empty($product->image3)) {
                Storage::disk('local')->delete('public/' . $product->slug . '_' . $product->id . '/images/' . $product->image3);
            }
            $product->image1 = $fileName;
        }

        if (request()->hasFile('image4')) {
            $img = request()->file('image4');
            $fileName = $this->resizeImage($img, $product);
            if (!empty($product->image4)) {
                Storage::disk('local')->delete('public/' . $product->slug . '_' . $product->id . '/images/' . $product->image4);
            }
            $product->image4 = $fileName;
        }

        if (request()->hasFile('image5')) {
            $img = request()->file('image5');
            $fileName = $this->resizeImage($img, $product);
            if (!empty($product->image5)) {
                Storage::disk('local')->delete('public/' . $product->slug . '_' . $product->id . '/images/' . $product->image5);
            }
            $product->image5 = $fileName;
        }
        $product->save();

        return response()->json(['msg' => 'Product Created!'], 200);
    }


    public function show($id)
    { 
        $responseCode = 200;
        $product =  Product::where('id', $id)->first();
        if (empty($product)) {
            $responseCode = 404;
        }
        return response()->json(['data' => $product], $responseCode);
    }


    public function update($id)
    {
        $product =  Product::where('id', $id)->first();
        $product->update(request()->all());

        if (request()->hasFile('image1')) {
            $img = request()->file('image1');
            $fileName = $this->resizeImage($img, $product);
            if (!empty($product->image1)) {
                Storage::disk('local')->delete('public/products/' . $product->slug . '_' . $product->id . '/images/' . $product->image1);
            }
            $product->image1 = $fileName;
        }

        if (request()->hasFile('image2')) {
            $img = request()->file('image2');
            $fileName = $this->resizeImage($img, $product);
            if (!empty($product->image2)) {
                Storage::disk('local')->delete('public/' . $product->slug . '_' . $product->id . '/images/' . $product->image2);
            }
            $product->image2 = $fileName;
        }

        if (request()->hasFile('image3')) {
            $img = request()->file('image3');
            $fileName = $this->resizeImage($img, $product);
            if (!empty($product->image3)) {
                Storage::disk('local')->delete('public/' . $product->slug . '_' . $product->id . '/images/' . $product->image3);
            }
            $product->image1 = $fileName;
        }

        if (request()->hasFile('image4')) {
            $img = request()->file('image4');
            $fileName = $this->resizeImage($img, $product);
            if (!empty($product->image4)) {
                Storage::disk('local')->delete('public/' . $product->slug . '_' . $product->id . '/images/' . $product->image4);
            }
            $product->image4 = $fileName;
        }

        if (request()->hasFile('image5')) {
            $img = request()->file('image5');
            $fileName = $this->resizeImage($img, $product);
            if (!empty($product->image5)) {
                Storage::disk('local')->delete('public/' . $product->slug . '_' . $product->id . '/images/' . $product->image5);
            }
            $product->image5 = $fileName;
        }
        $product->save();

        return response()->json(['msg' => 'Product Updated!'], 200);
    }
    public function delete($id)
    {
        $product =  Product::where('id', $id)->first();
        $product->delete();

        return response()->json(['msg' => 'Product Deleted!'], 200);
    }
    public function visit($id)
    {
        $product =  Product::where('id', $id)->first();
        $product->visits += 1;
        $product->last_visit = request('user_agent');
        $product->save();

        return response()->json(['msg' => 'success'], 200);
    }
    public function resizeImage($image, $product)
    {
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $upload = Image::make($image->getRealPath());
        $upload->resize(512, 512, function ($const) {
            $const->aspectRatio();
        });
        $upload->stream();
        Storage::disk('local')->put('public/' . $product->slug . '_' . $product->id . '/images/' . $fileName, $upload, 'public');
        return $fileName;
    }
}
