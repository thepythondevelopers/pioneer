<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\CmsPage;


class CmsController extends Controller
{
    public $path ='admin.modules.cms.';

    public function index(){        
        $cms = CmsPage::get();
        return view($this->path.'index')->with('cms',$cms);
    }

    public function edit($id){
        $cms = CmsPage::where('_id',$id)->first();
        return view($this->path.'edit')->with('cms',$cms);   
    }

    public function update($id,Request $request){
        
        $cms = CmsPage::where('_id',$id)->first();
        $cms->title = $request->title;
        $cms->content = $request->content;
        $cms->save();
        return redirect()->route('admin.cms.index')->with(['message' => 'Record Updated Successfully.', 'message_type' => 'success']);   
    }

    
}
