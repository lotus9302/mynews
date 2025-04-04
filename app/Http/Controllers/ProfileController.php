<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Profile;
use App\Models\ProfileHistory;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $posts = Profile::all()->sortByDesc('updated_at');
    
        
        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('profile.index', ['posts' => $posts]);
    }
}

