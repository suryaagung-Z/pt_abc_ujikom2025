<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    public function index()
    {
        return view("home");
    }

    public function pegawai(Request $request)
    {
        $query = Pegawai::with('divisi');

        if ($request->nip) {
            $query->where('nip', 'like', '%' . $request->nip . '%');
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('divisi', fn($row) => $row->divisi->nama_divisi)
            ->editColumn('tanggal_lahir', fn($row) => \Carbon\Carbon::parse($row->tanggal_lahir)->translatedFormat('j F Y'))
            ->make(true);
    }
}
