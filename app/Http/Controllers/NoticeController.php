<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Notice;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{
    
    public function __construct() {
		$this->middleware('auth');
    }
    
    public function index()
    {
        $notice = Notice::get();
		return view('admin.notices.index')->withNotice($notice);

    }

    
    public function create()
    {
        $notice = Notice::get();
        if ($notice->isEmpty()) { 
        return view('admin.notices.create');
        }
        else{
            return view('admin.notices.index')->withNotice($notice);
        }
        
    }

    
    public function store(Request $request)
    {
        $notice = new Notice;
		$notice->title = $request->title;
		
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
          if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'gallery/notice';
            $image = $image->move($destinationPath, $name);
            $notice->image = $image;
          }
         $notice->save();
		return redirect()->route('notices.index');

	
    }

   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
		$notice = Notice::find($id);
		$notice->delete();
		return redirect()->route('notices.index');
    }
}
