<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Packet;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = [
            'titlePage' => 'Dashboard',
            'infoPage' => 'Menampilkan info terkini dari aplikasi'
        ];
        $categories = [
            [
                'id' => 1,
                'name' => 'akad'
            ],
            [
                'id' => 2,
                'name' => 'tenda'
            ],
        ];
        $kategoriCount = Category::count();
        $paketCount = Packet::where('category_id', '3')->count();
        $tendaCount = Packet::where('category_id', '1')->count();
        return view('pages.admin.dashboard', [
            'kategoriCount' => $kategoriCount,
            'paketCount' => $paketCount,
            'tendaCount' => $tendaCount,
        ], $data, $categories);
        // return view('pages.admin.dashboard', $categories, $data, compact('kategoriCount','paketCount','tendaCount'));
    }
}
