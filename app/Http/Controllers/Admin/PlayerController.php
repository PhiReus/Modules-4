<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::paginate(6);
        return view('admin.players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::get();
        $param = [
            'teams' => $teams
        ];
        return view('admin.players.create', $param);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:players', // Thêm quy tắc kiểm tra unique vào trường 'name' của bảng 'players'
            'date' => 'required',
            'country' => 'required',
            'image' => 'required',
            'team_id' => 'required',
        ], [
            'name.required' => 'Vui lòng điền đầy đủ thông tin!',
            'name.unique' => 'Cầu thủ đã tồn tại.',
            'date.required' => 'Vui lòng điền đầy đủ thông tin!',
            'country.required' => 'Vui lòng điền đầy đủ thông tin!',
            'image.required' => 'Vui lòng điền đầy đủ thông tin!',
            'team_id.required' => 'Vui lòng điền đầy đủ thông tin!',
        ]);
        $players = new Player();
        $players->name = $request->name;
        $players->date = $request->date;
        $players->country = $request->country;
        // $players->country = '';

        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extenshion = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $players->image = $path;
        }
        $players->team_id = $request->team_id;
        alert()->success('Thêm sản phẩm thành công!');
        $players->save();
        return redirect()->route('players.index');
    }
    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $playershow = Player::findOrFail($id);
    //     $param = [
    //         'playershow' => $playershow
    //     ];
    //     return view('admin.players.show',$param);
    // }

    public function show(string $id)
    {
        $playershow = Player::findOrFail($id);
        $relatedPlayers = Player::where('name', $playershow->name)->get();
        $param = [
            'playershow' => $playershow,
            'relatedPlayers' => $relatedPlayers
        ];
        return view('admin.players.show', $param);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $players = Player::find($id);
        $teams = Team::all();
        $param = [
            'players' => $players,
            'teams' => $teams
        ];
        return view('admin.players.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required', // Thêm quy tắc kiểm tra unique vào trường 'name' của bảng 'players'
            'date' => 'required',
            'country' => 'required',
            'image' => 'required',
            'team_id' => 'required',
        ], [
            'name.required' => 'Vui lòng điền đầy đủ thông tin!',
            'name.unique' => 'Cầu thủ đã tồn tại.',
            'date.required' => 'Vui lòng điền đầy đủ thông tin!',
            'country.required' => 'Vui lòng điền đầy đủ thông tin!',
            'image.required' => 'Vui lòng điền đầy đủ thông tin!',
            'team_id.required' => 'Vui lòng điền đầy đủ thông tin!',
        ]);

        $players = Player::findOrFail($id);
        $players->name = $request->name;
        $players->date = $request->date;
        $players->country = $request->country;
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extenshion = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $players->image = $path;
        }

        $players->team_id = $request->team_id;
        alert()->success('Cập nhật sản phẩm thành công!');
        $players->save();
        return redirect()->route('players.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $this->authorize('forceDelete', Player::class);
        $players = Player::find($id);
        $players->delete();
        alert()->success('Sản phẩm đã chuyễn vào thùng rác');

        return redirect()->route('players.index');
    }
    public function search(Request $request)
    {
        // dd(1);
        $search = $request->input('search');
        if (!$search) {
            return redirect()->route('players.index');
        }
        $players = Player::where('name', 'LIKE', '%' . $search . '%')->paginate(4);
        return view('admin.players.index', compact('players'));
    }
    public function trash()
    {
        $softs = Player::onlyTrashed()->get();
        return view('admin.players.trash', compact('softs'));
    }
    public function restore($id)
    {
        try {
            $softs = Player::withTrashed()->find($id);
            $softs->restore();
            alert()->success('Khôi Phục Sản Phẩm Thành Công!');
            return redirect()->route('players.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
            return redirect()->route('players.index');
        }
    }
    //xóa vĩnh viễn
    public function deleteforever($id)
    {
        try {
            $softs = Player::withTrashed()->find($id);
            $softs->forceDelete();
            alert()->success('Xóa Vĩnh Viễn Thành Công!');
            return redirect()->route('players.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
            return redirect()->route('players.index');
        }
    }
}
