<?php

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $posts = Profile::all()->sortByDesc('updated_at');
    
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        $history = new ProfileHistory();
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();

        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('profile.index', ['headline' => $headline, 'posts' => $posts]);
    }
}

