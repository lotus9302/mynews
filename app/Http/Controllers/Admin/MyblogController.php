<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class myblogController extends Controller
{

    public function add()
    {
        return view('admin.myblog.create');
    }

    public function create()
    {
        return redirect('admin/myblog/create');
    }

    public function edit()
    {
        return view('admin.myblog.edit');
    }

    public function update()
    {
        return redirect('admin/myblog/edit');
    }
}
