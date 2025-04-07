<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function index()
    {
        return view('admin.courier.index', ['couriers' => Courier::all()]);
    }
    public function create()
    {
        return view('admin.courier.create');
    }
    public function store(Request $request)
    {
        Courier::createCourier($request);
        return back()->with('message', 'New Courier Added Successfully.');
    }
    public function edit($id)
    {
        return view('admin.courier.edit', ['courier' => Courier::find($id)]);
    }
    public function update(Request $request, $id)
    {
        Courier::updateCourier($request, $id);
        return redirect('/courier/index/')->with('message', 'Courier Info Updated Successfully.');
    }
    public function delete($id)
    {
        Courier::deleteCourier($id);
        return back()->with('message', 'Courier Deleted Successfully.');
    }
}
