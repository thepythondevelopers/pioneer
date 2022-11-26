<?php

namespace App\Http\Controllers\Pioneer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\CmsPage;
use Illuminate\Support\Str;
class TestController extends Controller
{
    public $path ='pioneer.modules.setting.';

    public function about(){        
        $user = Auth::user();
        $about = CmsPage::where('slug','about')->first();
        $term = CmsPage::where('slug','term_condition')->first();
        return view($this->path.'about')->with('user',$user)->with('about',$about)->with('term',$term);
    }

    public function account(){        
        $user = Auth::user();
        $about = CmsPage::where('slug','about')->first();
        $term = CmsPage::where('slug','term_condition')->first();
        return view($this->path.'account')->with('user',$user)->with('about',$about)->with('term',$term);
    }

    public function bankdetail(){        
        $user = Auth::user();
        $about = CmsPage::where('slug','about')->first();
        $term = CmsPage::where('slug','term_condition')->first();
        return view($this->path.'bankdetail')->with('user',$user)->with('about',$about)->with('term',$term);
    }

    public function changepassword(){        
        $user = Auth::user();
        $about = CmsPage::where('slug','about')->first();
        $term = CmsPage::where('slug','term_condition')->first();
        return view($this->path.'changepassword')->with('user',$user)->with('about',$about)->with('term',$term);
    }

    public function terms(){        
        $user = Auth::user();
        $about = CmsPage::where('slug','about')->first();
        $term = CmsPage::where('slug','term_condition')->first();
        return view($this->path.'terms')->with('user',$user)->with('about',$about)->with('term',$term);
    }
    


   
}    