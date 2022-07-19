<?php

namespace App\Http\Controllers\Destination;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class DashboardController extends Controller
{
    public $path ='destination.modules.';

    public function create_job(){        
        return view($this->path.'create-job');
    }

    public function home(){        
        return view($this->path.'home');
    }

    public function notification(){        
        return view($this->path.'notification');
    }

    public function chat(){        
        return view($this->path.'chat');
    }

    public function job_history(){        
        return view($this->path.'job_history');
    }

    public function job_history_detail(){        
        return view($this->path.'job_history_detail');
    }

    public function my_spending(){        
        return view($this->path.'my_spending');
    }

    public function on_going_job(){        
        return view($this->path.'on_going_job');
    }

    public function on_going_job_detail(){        
        return view($this->path.'on_going_job_detail');
    }

    public function single_job_detail(){        
        return view($this->path.'single_job_detail');
    }
    
    public function setting(){        
        return view($this->path.'setting');
    }

    public function login(){        
        return view($this->path.'login');
    }

    public function register(){        
        return view($this->path.'register');
    }

    public function register_steps(){        
        return view($this->path.'register-steps');
    }
}
