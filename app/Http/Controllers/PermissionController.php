<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Permission Index')->only('index');
        $this->middleware('can:Permission Create')->only(['create', 'store']);
        $this->middleware('can:Permission Edit')->only(['edit', 'update']);
        $this->middleware('can:Permission Delete')->only('destroy');
    }

    public function index()
    {
        $items = Permission::orderBy('name', 'ASC')->get();
        return view('pages.permission.index', [
            'title' => 'Permission',
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('pages.permission.create', [
            'title' => 'Tambah item'
        ]);
    }

    public function store()
    {

        request()->validate([
            'name' => ['required', 'unique:permissions,name'],
        ]);

        DB::beginTransaction();
        try {
            $data = request()->only(['name']);
            Permission::create($data);

            DB::commit();
            return redirect()->route('permissions.index')->with('success', 'Permission berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        $item = Permission::findById($id);
        return view('pages.permission.edit', [
            'title' => 'Edit Permission',
            'item' => $item
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'name' => ['required', 'unique:permissions,name,' . $id . ''],
        ]);

        DB::beginTransaction();
        try {
            $item = Permission::findOrFail($id);
            $data = request()->only(['name']);
            $item->update($data);

            DB::commit();
            return redirect()->route('permissions.index')->with('success', 'Permission berhasil diupdate.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {

        DB::beginTransaction();
        try {
            $item = Permission::findById($id);
            $item->delete();
            DB::commit();
            return redirect()->route('permissions.index')->with('success', 'Permission berhasil dihapus.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
