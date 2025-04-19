<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SponsorCategory;
use App\Models\Sponsor;
use Illuminate\Validation\Rule;

class AdminSponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::with('sponsor_category')->get();
        return view('admin.sponsor.index' , compact('sponsors'));
    }

    public function create(){
        $sponsor_categories = SponsorCategory::orderBy('id' , 'asc')->get();
        return view('admin.sponsor.create', compact('sponsor_categories'));
        
    }
    public function store(Request $request){
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'featured_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'name' => 'required',
            'slug' => 'required|unique:sponsors|alpha_dash|regex:/^[a-zA-Z-]+$/',
            'description' => 'required',
            'email' => 'required|email|unique:sponsors',
            'phone' => 'required|unique:sponsors',
        ]);

        $final_name_logo = 'sponsor_logo_'.time().'.'.$request->logo->extension();
        $request->logo->move(public_path('uploads'), $final_name_logo);
        $final_name_featured_photo = 'sponsor_featured_photo_'.time().'.'.$request->featured_photo->extension();
        $request->featured_photo->move(public_path('uploads'), $final_name_featured_photo);

        $sponsor = new Sponsor();
        $sponsor->logo = $final_name_logo;
        $sponsor->featured_photo = $final_name_featured_photo;
        $sponsor->name = $request->name;
        $sponsor->slug = $request->slug;
        $sponsor->description = $request->description;
        $sponsor->sponsor_category_id = $request->sponsor_category_id;
        $sponsor->email = $request->email;
        $sponsor->phone = $request->phone;
        $sponsor->address = $request->address;
        $sponsor->tagline = $request->tagline;
        $sponsor->website = $request->website;
        $sponsor->facebook = $request->facebook;
        $sponsor->twitter = $request->twitter;
        $sponsor->instagram = $request->instagram;
        $sponsor->linkedin = $request->linkedin;
        $sponsor->map = $request->map;
        $sponsor->save();



        return redirect()->route('admin_sponsor_index')->with('success','sponsor added successfully');   
    }

    public function edit($id){
        $sponsor = Sponsor::where('id',$id)->first();
        $sponsor_categories = SponsorCategory::orderBy('id' , 'asc')->get();
        return view('admin.sponsor.edit' , compact('sponsor', 'sponsor_categories'));
    }
    public function update(Request $request, $id){
        $sponsor = Sponsor::where('id',$id)->first();
        $request->validate([
            'name' => 'required',
            'slug' => ['required','alpha_dash','regex:/^[a-zA-Z-]+$/', Rule::unique('sponsors')->ignore($sponsor->id)],
            'description' => 'required',
            'tagline' => 'required',
            'email' => ['required', 'email', Rule::unique('sponsors')->ignore($sponsor->id)],
            'phone' => ['required', Rule::unique('sponsors')->ignore($sponsor->id)],
        ]);
        if($request->logo) {
            $request->validate([
                'logo' => ['mimes:jpg,jpeg,png,gif','max:2024'],
            ]);
            if($sponsor->logo != '') {
                unlink(public_path('uploads/'.$sponsor->logo));
                
                $final_name_logo = '$sponsor_logo_'.time().'.'.$request->logo->extension();
                $request->logo->move(public_path('uploads'), $final_name_logo);
                $sponsor->logo = $final_name_logo; 
            }
        }


        if($request->featured_photo) {
            $request->validate([
                'featured_photo' => ['mimes:jpg,jpeg,png,gif','max:2024'],
            ]);
            if($sponsor->featured_photo != '') {
                unlink(public_path('uploads/'.$sponsor->featured_photo));
                
                $final_name_featured_photo = '$sponsor_featured_photo_'.time().'.'.$request->featured_photo->extension();
                $request->featured_photo->move(public_path('uploads'), $final_name_featured_photo);
                $sponsor->featured_photo = $final_name_featured_photo; 
            }
        }
    
        $sponsor->name = $request->name;
        $sponsor->slug = $request->slug;
        $sponsor->description = $request->description;
        $sponsor->sponsor_category_id = $request->sponsor_category_id;
        $sponsor->email = $request->email;
        $sponsor->phone = $request->phone;
        $sponsor->address = $request->address;
        $sponsor->tagline = $request->tagline;
        $sponsor->website = $request->website;
        $sponsor->facebook = $request->facebook;
        $sponsor->twitter = $request->twitter;
        $sponsor->instagram = $request->instagram;
        $sponsor->linkedin = $request->linkedin;
        $sponsor->map = $request->map;
        $sponsor->save();
        return redirect()->route('admin_sponsor_index')->with('success','Sponsor updated successfully');

        
    }
    public function delete($id){
        $sponsor = Sponsor::where('id',$id)->first();
        if($sponsor->logo != '') {
            unlink(public_path('uploads/'.$sponsor->logo));
        }
        if($sponsor->featured_photo != '') {
            unlink(public_path('uploads/'.$sponsor->featured_photo));
        }
        $sponsor->delete();
        return redirect()->route('admin_sponsor_index')->with('success','Sponsor deleted successfully');
        
    }
}
