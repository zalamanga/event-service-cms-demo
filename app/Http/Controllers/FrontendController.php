<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\DetailGallery;
use App\Models\Gallery;
use App\Models\Packet;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $data['titlePage'] = 'Home';
        $tents = Packet::where('category_id', '1')->orderBy('position', 'asc')->get();
        $makeups = Packet::where('category_id', '2')->orderBy('position', 'asc')->get();
        $packets = Packet::where('category_id', '3')->orderBy('position', 'asc')->get();
        $caterings = Packet::where('category_id', '4')->orderBy('position', 'asc')->get();
        $accessories = Packet::where('category_id', '5')->orderBy('position', 'asc')->get();
        $banner = Banner::get();
        return view('pages.frontend.index', $data, compact('packets', 'tents', 'makeups', 'caterings', 'accessories', 'banner'));
    }

    public function packetDetail($id)
    {
        $packet = Packet::findOrFail($id);
        $packets = Packet::where('id', '!=', $id)->get();
        $data['titlePage'] = 'Home';
        // $packetDetails = DetailPacket::where()->();
        return view('pages.frontend.pricelist.detail', $data, compact('packet', 'packets'));
    }

    public function about()
    {
        $data['titlePage'] = 'Tentang Kami';
        return view('pages.frontend.about', $data);
    }

    public function gallery(Request $request)
    {
        if ($request->ajax()) {
            if ($request->name) {
                $galleries = Gallery::where('name', 'like', '%' . $request->name . '%')->orderBy('position', 'asc')->paginate(8);
            } else {
                $galleries = Gallery::paginate(8);
            }
            return view('pages.frontend.list_gallery', compact('galleries'));
        }
        $data['titlePage'] = 'Gallery';
        $galleries = Gallery::paginate(8);
        return view('pages.frontend.gallery', $data);
    }

    public function service()
    {
        $data['titlePage'] = 'Layanan';
        return view('pages.frontend.service', $data);
    }

    public function packet()
    {
        $data['titlePage'] = 'Home';
        $tents = Packet::where('category_id', '1')->orderBy('position', 'asc')->get();
        $makeups = Packet::where('category_id', '2')->orderBy('position', 'asc')->paginate(10);
        $packets = Packet::where('category_id', '3')->orderBy('position', 'asc')->paginate(10);
        $caterings = Packet::where('category_id', '4')->orderBy('position', 'asc')->paginate(10);
        $accessories = Packet::where('category_id', '5')->orderBy('position', 'asc')->paginate(10);
        return view('pages.frontend.pricelist.packet', $data, compact('packets', 'tents', 'makeups', 'caterings', 'accessories'));
    }

    public function tent()
    {
        $data['titlePage'] = 'Home';
        $tents = Packet::where('category_id', '1')->orderBy('position', 'asc')->get();
        return view('pages.frontend.pricelist.tent', $data, compact('tents'));
    }


    public function galleryDetail($id)
    {
        $galleries = DetailGallery::where('gallery_id', $id)->get();
        return view('pages.frontend.modal_gallery', compact('galleries'));
    }

    public function tentDetail($id)
    {
        $packets = Packet::where('id', '!=', $id)->orderBy('position', 'asc')->get();
        $packet = Packet::findOrFail($id);
        $data['titlePage'] = 'Home';
        return view('pages.frontend.index', $data, compact('packets', 'packet'));
    }

    public function makeup()
    {
        $data['titlePage'] = 'Home';
        $tents = Packet::where('category_id', '1')->orderBy('position', 'asc')->get();
        $makeups = Packet::where('category_id', '2')->orderBy('position', 'asc')->get();
        $packets = Packet::where('category_id', '3')->orderBy('position', 'asc')->get();
        $caterings = Packet::where('category_id', '4')->orderBy('position', 'asc')->get();
        $accessories = Packet::where('category_id', '5')->orderBy('position', 'asc')->get();
        return view('pages.frontend.pricelist.makeup', $data, compact('packets', 'tents', 'makeups', 'caterings', 'accessories'));
    }

    public function makeupDetail($id)
    {
        $packet = Packet::findOrFail($id);
        $packets = Packet::where('id', '!=', $id)->orderBy('position', 'asc')->get();
        $data['titlePage'] = 'Home';
        return view('pages.frontend.pricelist.detail', $data, compact('packet', 'packets'));
    }

    public function accessories()
    {
        $data['titlePage'] = 'Home';
        $tents = Packet::where('category_id', '1')->orderBy('position', 'asc')->get();
        $makeups = Packet::where('category_id', '2')->orderBy('position', 'asc')->get();
        $packets = Packet::where('category_id', '3')->orderBy('position', 'asc')->get();
        $caterings = Packet::where('category_id', '4')->orderBy('position', 'asc')->get();
        $accessories = Packet::where('category_id', '5')->orderBy('position', 'asc')->get();
        return view('pages.frontend.pricelist.accessories', $data, compact('packets', 'tents', 'makeups', 'caterings', 'accessories'));
    }

    public function accessoriesDetail($id)
    {
        $packet = Packet::findOrFail($id);
        $packets = Packet::where('id', '!=', $id)->orderBy('position', 'asc')->get();
        $data['titlePage'] = 'Home';
        return view('pages.frontend.pricelist.detail', $data, compact('packet', 'packets'));
    }
}
