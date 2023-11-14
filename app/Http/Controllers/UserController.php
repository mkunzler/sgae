<?php

namespace App\Http\Controllers;

use App\Enums\EnumUserPermission;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    protected static $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        self::$data['enumUserPermission'] = EnumUserPermission::class;
    }

    public function index(User $user)
    {
        self::$data['users'] = $user->all()->sortBy('name');
        return view('users/list', self::$data);
    }

    public function add()
    {
        return view('users/add', self::$data);
    }

    public function edit(User $user)
    {
        self::$data['user'] = $user;
        return view('users/edit', self::$data);
    }

    public function create(UserRequest $request): RedirectResponse
    {
        User::create($request->parameters());
        return redirect('/users')->with('success', 'Usuário cadastrado!');
    }

    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->parameters());
        return redirect('/users')->with('success', 'Usuário atualizado!');
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect('/users')->with('success', 'Usuário excluído!');
    }
}
