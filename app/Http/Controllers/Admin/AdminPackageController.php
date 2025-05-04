<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\package;
use Illuminate\Validation\Rule;

class AdminPackageController extends Controller
{
    public function index(){
        $packages = Package::orderBy('item_order', 'asc')->get();
        return view('admin.package.index' , compact('packages'));
    }

    public function create(){
        return view('admin.package.create');
        
    }
    public function store(Request $request){
        $request->validate([
            'package' => 'required',
        ]);

        

        $package = new package();
        $package->package = $request->package;
        $package->caption = $request->caption;
        $package->save();

        return redirect()->route('admin_package_index')->with('success','package added successfully');         
        
    }

    public function edit($id){
        $package = package::where('id',$id)->first();
        return view('admin.package.edit' , compact('package'));
        
    }
    public function update(Request $request, $id){
        $package = package::where('id',$id)->first();
        $request->validate([
            'package' => [
                'required',
                Rule::unique('packages')->ignore($package->id),
            ],
        ]);

        $package->caption = $request->caption;
        $package->package = $request->package;
        $package->save();
        return redirect()->route('admin_package_index')->with('success','package updated successfully');

        
    }
    public function delete($id){
        $package = package::where('id',$id)->first();
        $package->delete();
        return redirect()->route('admin_package_index')->with('success','package deleted successfully');
        
    }
}
