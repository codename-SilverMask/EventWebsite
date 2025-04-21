<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organiser;
use Illuminate\Validation\Rule;

class AdminOrganiserController extends Controller
{
    public function index(){
        $organisers = Organiser::get();
        return view('admin.organiser.index' , compact('organisers'));
    }

    public function create(){
        return view('admin.organiser.create');
        
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:organisers|alpha_dash|regex:/^[a-zA-Z-]+$/',
            'designation' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $final_name = 'organiser_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);

        $organiser = new Organiser();
        $organiser->name = $request->name;
        $organiser->slug = $request->slug;
        $organiser->designation = $request->designation;
        $organiser->photo = $final_name;
        $organiser->email = $request->email;
        $organiser->phone = $request->phone;
        $organiser->biography = $request->biography;
        $organiser->address = $request->address;
        $organiser->facebook = $request->facebook;
        $organiser->twitter = $request->twitter;
        $organiser->linkedin = $request->linkedin;
        $organiser->instagram = $request->instagram;
        $organiser->save();

        return redirect()->route('admin_organiser_index')->with('success','Organiser added successfully');         
        
    }

    public function edit($id){
        $organiser = Organiser::where('id',$id)->first();
        return view('admin.organiser.edit' , compact('organiser'));
        
    }
    public function update(Request $request, $id){
        $organiser = Organiser::where('id',$id)->first();
        $request->validate([
            'name' => 'required',
            'slug' => ['required','alpha_dash','regex:/^[a-zA-Z-]+$/', Rule::unique('organisers')->ignore($organiser->id)],
            'designation' => 'required',
            'email' => 'required|email|unique:organisers,email,'.$organiser->id,
            'phone' => 'required|unique:organisers,phone,'.$organiser->id,
        ]);
        if($request->photo) {
            $request->validate([
                'photo' => ['mimes:jpg,jpeg,png,gif','max:2024'],
            ]);
            if($organiser->photo != '') {
                unlink(public_path('uploads/'.$organiser->photo));
                
                $final_name = '$organiser_'.time().'.'.$request->photo->extension();
                $request->photo->move(public_path('uploads'), $final_name);
                $organiser->photo = $final_name; 
            }
        }
        $organiser->name = $request->name;
        $organiser->slug = $request->slug;
        $organiser->designation = $request->designation;
        $organiser->email = $request->email;
        $organiser->phone = $request->phone;
        $organiser->biography = $request->biography;
        $organiser->address = $request->address;
        $organiser->facebook = $request->facebook;
        $organiser->twitter = $request->twitter;
        $organiser->linkedin = $request->linkedin;
        $organiser->instagram = $request->instagram;
        $organiser->save();
        return redirect()->route('admin_organiser_index')->with('success','Organiser updated successfully');

        
    }
    public function delete($id){
        $organiser = Organiser::where('id',$id)->first();
        if($organiser->photo != '') {
            unlink(public_path('uploads/'.$organiser->photo));
        }
        $organiser->delete();
        return redirect()->route('admin_organiser_index')->with('success','Organiser deleted successfully');
        
    }

    
}
