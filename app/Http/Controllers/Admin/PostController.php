<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
class PostController extends Controller
{
    public function index(){
        $posts=Post::all();
        return View('backend.post.index', compact('posts'));
    }
    public function create(Request $request){
        
        if($request->isMethod('POST')){
            $data=$request->all();
            $validator=Validator::make($data, [
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            if($validator->fails()){
                return redirect()->back()->with('error_message', $validator->errors());
            }else{
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    // $xxx=array();
                    // foreach($images as $image){
                        $reimage = 'backend/imgs/'.rand(10, 100000000).time() . '.' . $image->getClientOriginalExtension();
                        $dest = public_path('backend/imgs');
                        $image->move($dest, $reimage);
                        // $xxx[]=$reimage;
                    // }
                    $data['image']=$reimage;
                    // dd($data);
                    Post::create($data);
                    return redirect('/admin/posts')->with('success_message', 'Tạo Bài Viết Thành Công');
                }
            }
        }
        return View('backend.post.create');
    }
    public function edit(Request $request,$id){
       $post=Post::find($id);
        if($request->isMethod('POST')){
            $data=$request->all();
            $validator=Validator::make($data, [
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            if($validator->fails()){
                return redirect()->back()->with('error_message', $validator->errors());
            }else{
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    // $xxx=array();
                    // foreach($images as $image){
                        $reimage = 'backend/imgs/'.rand(10, 100000000).time() . '.' . $image->getClientOriginalExtension();
                        $dest = public_path('backend/imgs');
                        $image->move($dest, $reimage);
                        // $xxx[]=$reimage;
                    // }
                    // foreach(explode(",",$post['image']) as $image){
                    //     File::delete(public_path($image));
                    // }
                    File::delete(public_path($post['image']));
                    $data['image']=$reimage;
                    $post->update($data);
                }else{
                    $post->update($data);
                }
                return redirect('/admin/posts')->with('success_message', 'Chỉnh Sửa Bài Viết Thành Công');
            }
        }
        return View('backend.post.edit', compact('post'));
    }
    public function delete(Request $request, $id){
        Post::find($id)->delete();
        return redirect()->back()->with('success_message', 'Xóa Bài Viết Thành Công');
    }
}
