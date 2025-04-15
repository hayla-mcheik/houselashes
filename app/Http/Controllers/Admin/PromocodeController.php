<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PromoCode;
class PromocodeController extends Controller
{
    public function index()
    {
        $promocode = PromoCode::all();
        return view('admin.promocode.index',compact('promocode'));
    }

    public function edit($id)
    {
        $code = PromoCode::find($id);
        return view('admin.promocode.edit',compact('code'));  
    }

public function update(Request $request, $id)
{
    $request->validate([
        'code' => 'required|string|max:255',
        'valid_from' => 'required|date',
        'valid_to' => 'required|date|after_or_equal:valid_from',
    ]);

    $code = PromoCode::find($id);
    $code->code = $request->input('code');
    $code->valid_from = $request->input('valid_from');
    $code->valid_to = $request->input('valid_to');
    $code->save();

    return redirect()->route('admin.promocode')->with('message', 'Promocode updated successfully');
}

}
