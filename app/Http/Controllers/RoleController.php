<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Role Index')->only('index');
        $this->middleware('can:Role Create')->only(['create', 'store']);
        $this->middleware('can:Role Edit')->only(['edit', 'update']);
        $this->middleware('can:Role Delete')->only('destroy');
    }

    public function index()
    {
        $items = Role::orderBy('name', 'ASC')->get();
        return view('pages.role.index', [
            'title' => 'Role',
            'items' => $items
        ]);
    }

    public function create()
    {
        DB::statement("SET SQL_MODE=''");
        $role_permission = Permission::select('name', 'id')->groupBy('name')->get();

        $custom_permission = array();

        foreach ($role_permission as $per) {
            // Mencari indeks karakter spasi pertama
            $space_index = strpos($per->name, " ");

            // Mengecek apakah ditemukan karakter spasi
            if ($space_index !== false) {
                // Jika ada karakter spasi, ambil substring dari awal hingga karakter spasi
                $key = substr($per->name, 0, $space_index);
            } else {
                // Jika tidak ada karakter spasi, gunakan seluruh nama sebagai kunci
                $key = $per->name;
            }

            $custom_permission[$key][] = $per;
        }


        return view('pages.role.create', [
            'title' => 'Tambah Role',
            'permissions' => $custom_permission
        ]);
    }

    public function store()
    {

        request()->validate([
            'name' => ['required', 'unique:roles,name'],
            'permissions' => ['required', 'array']
        ]);

        DB::beginTransaction();
        try {
            $permissions = request('permissions');
            $data = request()->only(['name']);
            $role  = Role::create($data);
            $role->givePermissionTo($permissions);
            DB::commit();
            return redirect()->route('roles.index')->with('success', 'Role berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        DB::statement("SET SQL_MODE=''");
        $role_permission = Permission::select('name', 'id')->groupBy('name')->get();

        $custom_permission = array();
        foreach ($role_permission as $per) {
            // Mencari indeks karakter spasi pertama
            $space_index = strpos($per->name, " ");

            // Mengecek apakah ditemukan karakter spasi
            if ($space_index !== false) {
                // Jika ada karakter spasi, ambil substring dari awal hingga karakter spasi
                $key = substr($per->name, 0, $space_index);
            } else {
                // Jika tidak ada karakter spasi, gunakan seluruh nama sebagai kunci
                $key = $per->name;
            }
            $custom_permission[$key][] = $per;
        }
        $item = Role::findById($id);
        if ($item->name === 'superadmin')
            return redirect()->back()->with('error', 'Tidak Ada Akses!');
        return view('pages.role.edit', [
            'title' => 'Edit Role',
            'item' => $item,
            'permissions' => $custom_permission
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'name' => ['required', 'unique:roles,name,' . $id . ''],
            'permissions' => ['required', 'array']
        ]);

        DB::beginTransaction();
        try {
            $item = Role::findOrFail($id);
            $data = request()->only(['name']);
            $permissions = request('permissions');
            $item->update($data);
            $item->syncPermissions($permissions);
            DB::commit();
            return redirect()->route('roles.index')->with('success', 'Role berhasil diupdate.');
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
            $item = Role::findById($id);
            $item->delete();
            DB::commit();
            return redirect()->route('roles.index')->with('success', 'Role berhasil dihapus.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
