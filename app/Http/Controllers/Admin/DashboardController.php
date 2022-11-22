<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // return 'i am dash';
        $category = category::count();
        $post = post::count();
        $users = User::where('role_as', '0')->count();
        $admins = User::where('role_as', '1')->count();
        return view('admin/dashboard', compact('category', 'post', 'users', 'admins'));
    }
}
