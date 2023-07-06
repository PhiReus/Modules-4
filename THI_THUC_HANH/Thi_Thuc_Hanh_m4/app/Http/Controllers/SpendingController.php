<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spending;
use App\Http\Requests\StoreSpendingRequest;
use App\Http\Requests\UpdateSpendingRequest;

class SpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spendings = Spending::paginate(3);
        return view('spendings.index', compact('spendings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $spendings = Spending::get();
        $param = [
            'spendings' => $spendings
        ];
        return view('spendings.create', $param);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpendingRequest $request)
    {
        $spendings = new Spending();
        $spendings->category = $request->category;
        $spendings->date = $request->date;
        $spendings->price = $request->price;
        // alert()->success('Thêm loại sản phẩm thành công!');
        $spendings->save();
        return redirect()->route('spendings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $spending = Spending::findOrFail($id);
        $param = [
            'spending' => $spending,
        ];
        return view('spendings.show', $param);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $spending = Spending::find($id);
        $param = [
            'spending' => $spending
        ];
        return view('spendings.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpendingRequest $request, string $id)
    {
        $spending = Spending::findOrFail($id);
        $spending->category = $request->category;
        $spending->date = $request->date;
        $spending->price = $request->price;
        // alert()->success('Cập nhật loại sản phẩm thành công!');
        $spending->save();
        return redirect()->route('spendings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $spending = Spending::find($id);
        $spending->delete();
        // alert('Xóa loại sản phẩm thành công');
        return redirect()->route('spendings.index');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        if (!$search) {
            return redirect()->route('spendings.index');
        }
        $spendings = Spending::where('category', 'LIKE', '%' . $search . '%')->paginate(20);
        return view('spendings.index', compact('spendings'));
    }
}
