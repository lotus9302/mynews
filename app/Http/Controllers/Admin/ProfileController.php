<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use Carbon\Carbon;
use App\Models\ProfileHistory;


class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);

        $profile = new Profile;
        $form = $request->all();

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

        // データベースに保存する
        $profile->fill($form);
        $profile->save();

        return redirect('admin/profile/create');
    }

    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != null) {
            // 検索されたら検索結果を取得する
            $posts = Profile::where('title', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Profile::all();
        }
        return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }

    public function edit(Request $request)
    {
        // dd('ここ');
        // News Modelからデータを取得する
        $profile = Profile::find($request->id);
        // dd($profile);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
        // dd('updateが呼ばれた');
        // Validationをかける
        $this->validate($request, Profile::$rules);
        // News Modelからデータを取得する
        $profile = Profile::find($request->id);
        // 送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        // dd($profile_form);
        // unset($profile_form['name']);
        // unset($profile_form['gender']);
        // unset($profile_form['hobby']);
        // unset($profile_form['introduction']);

        // 該当するデータを上書きして保存する
        $profile->fill($profile_form);
        $profile->save();
        $profile_history = new ProfileHistory();
        $profile_history->profile_id = $profile->id;
        $profile_history->edited_at = Carbon::now();
        $profile_history->save();
        return redirect('admin/profile');
    }
}