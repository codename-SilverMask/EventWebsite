<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;


class AdminPostController extends Controller
{
    public function index(){
        $posts = Post::get();
        return view('admin.post.index' , compact('posts'));
    }

    public function create(){
        return view('admin.post.create');
        
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts|alpha_dash|regex:/^[a-zA-Z-]+$/',
            'description' => 'required',
            'short_description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $final_name = 'post_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);

        $post = new Post();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->description = $request->description;
        $post->short_description = $request->short_description;
        $post->photo = $final_name;
        $post->save();

        return redirect()->route('admin_post_index')->with('success','Post added successfully');         
        
    }

    public function edit($id){
        $post = Post::where('id',$id)->first();
        return view('admin.post.edit' , compact('post'));
        
    }
    public function update(Request $request, $id){
        $post = Post::where('id',$id)->first();
        $request->validate([
            'title' => 'required',
            'slug' => ['required','alpha_dash','regex:/^[a-zA-Z-]+$/', Rule::unique('posts')->ignore($post->id)],
            'short_description' => 'required',
            'description' => 'required',
            ]);
        if($request->photo) {
            $request->validate([
                'photo' => ['mimes:jpg,jpeg,png,gif','max:2024'],
            ]);
            if($post->photo != '') {
                unlink(public_path('uploads/'.$post->photo));
                
                $final_name = 'post_'.time().'.'.$request->photo->extension();
                $request->photo->move(public_path('uploads'), $final_name);
                $post->photo = $final_name; 
            }
        }
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->description = $request->description;
        $post->short_description = $request->short_description;
        $post->save();
        return redirect()->route('admin_post_index')->with('success','Post updated successfully');

        
    }
    public function delete($id){
        $post = Post::where('id',$id)->first();
        if($post->photo != '') {
            unlink(public_path('uploads/'.$post->photo));
        }
        $post->delete();
        return redirect()->route('admin_post_index')->with('success','Post deleted successfully');
        
    }

}
