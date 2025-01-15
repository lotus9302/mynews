<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function admin()
    {
        Route::get('admin/profile/create', 'add');
    }

    public function create()
    {
        return redirect('admin/profile/create');
    }

    public function edit()
    {
        Route::get('admin/profile/create', 'edit');
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
    //
}
