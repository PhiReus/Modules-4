<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate();
        // dd($users);
        return view('Admin.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
                'created_at' => 'required',
                'updated_at' => 'required',
            ],
            [
                'username.required' => 'Vui lòng điền đầy đủ thông tin!',
                'email.required' => 'Vui lòng điền đầy đủ thông tin!',
                'password.required' => 'Vui lòng điền đầy đủ thông tin!',
                'created_at.required' => 'Vui lòng điền đầy đủ thông tin!',
                'updated_at.required' => 'Vui lòng điền đầy đủ thông tin!',
            ]
        );
        $users = new User();
        $users->username = $request->username;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->created_at = $request->created_at;
        $users->updated_at = $request->updated_at;
        $users->save();
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usershow = User::findOrFail($id);
        return view('Admin.show',compact('usershow'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::find($id);
        return view('Admin.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::FindOrfail($id);
        $users->username = $request->username;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->created_at = $request->created_at;
        $users->updated_at = $request->updated_at;
        
        // alert()->success('Cập nhật sản phẩm thành công!');
        $users->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd(1);
        // $this->authorize('forceDlete', User::class);
        $users = User::find($id);
        $users->delete();
        return redirect()->route('users.index');

    }
}
