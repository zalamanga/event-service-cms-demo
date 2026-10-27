<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function category() {
        $data = [
            'titlePage' => 'Kategori',
            'infoPage' => 'List Kategori dapat Anda lihat disini'
        ];
        return view('pages.admin.category.index', $data);
    }

    public function packet() {
        $data = [
            'titlePage' => 'Paket',
            'infoPage' => 'List Paket dapat Anda lihat disini'
        ];
        return view('pages.admin.packet.index', $data);
    }

    public function gallery() {
        $data = [
            'titlePage' => 'Gallery',
            'infoPage' => 'Gallery dapat Anda lihat disini'
        ];
        return view('pages.admin.gallery.index', $data);
    }

    public function banner() {
        $data = [
            'titlePage' => 'Banner',
            'infoPage' => 'Banner dapat Anda lihat disini'
        ];
        return view('pages.admin.banner.index', $data);
    }
}
