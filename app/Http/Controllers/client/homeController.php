<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_sp_home = SanPham::limit(8)->orderByDesc('id')->get();

        return view('client.home',compact('list_sp_home'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $san_pham = SanPham::find($id);


        // Tìm các sản phẩm tương tự, không lặp sản phẩmhienj tại
        $similarProducts = SanPham::where('danh_muc_id', $san_pham->danh_muc_id)
            ->where('id', '!=', $san_pham->id)
            ->limit(5)
            ->get();
            return view('client.detailProduct',compact('san_pham','similarProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
