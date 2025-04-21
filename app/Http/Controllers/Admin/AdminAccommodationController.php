<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use Illuminate\Validation\Rule;

class AdminAccommodationController extends Controller
{
    public function index(){
        $accommodations = Accommodation::get();
        return view('admin.accommodation.index' , compact('accommodations'));
    }

    public function create(){
        return view('admin.accommodation.create');
        
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $final_name = 'accommodation_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);

        $accommodation = new Accommodation();
        $accommodation->name = $request->name;
        $accommodation->description = $request->description;
        $accommodation->photo = $final_name;
        $accommodation->email = $request->email;
        $accommodation->phone = $request->phone;
        $accommodation->website = $request->website;
        $accommodation->address = $request->address;
        $accommodation->save();

        return redirect()->route('admin_accommodation_index')->with('success','Accommodation added successfully');         
        
    }
}
