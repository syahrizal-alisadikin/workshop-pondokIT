<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index()
    {
        if (request()->ajax()) {
            $user = User::query()->latest();
            return DataTables()->of($user)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <a href="' . route('user.edit', $item->id) . '" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="' . route('user.destroy', $item->id) . '" method="POST">
                                ' . method_field('delete') . csrf_field() . '
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.user.index');
    }
}
