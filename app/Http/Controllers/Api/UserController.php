<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function index(Request $request) {

        $sort = $request->sort ? explode('|', $request->sort) : ['created_at', 'desc'];
        $limit = $request->perPage ? $request->perPage : 50;

        $m = new User();

        if ($request->filter) {
            $m = $m->search($request->filter);
        }

        $users = $m->orderBy($sort[0], $sort[1])
            ->paginate($limit);

        return UserResource::collection($users);
    }
}