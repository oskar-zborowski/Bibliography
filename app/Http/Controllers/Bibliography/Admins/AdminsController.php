<?php
/** Manage users for CMS area. **/
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Bibliography\Admins;
use App\Http\Controllers\Controller;
use App\Models\Bibliography\Admins\Admins;
use App\Models\Bibliography\Admins\AdminRoles;
use Illuminate\Http\Request;
use App\Http\Requests\Bibliography\Admins\AdminsRequest;
use Illuminate\Support\Facades\Storage;

class AdminsController extends Controller
{
    public function index()
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("bibliography.home"));
        }
        $admiko_data['sideBarActive'] = "admikoAdmins";
        $admiko_data['sideBarActiveFolder'] = "";
        $tableData = Admins::all()->load('AdminsRole');
        return view("bibliography.admins.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("bibliography.home"));
        }
        $admiko_data['sideBarActive'] = "admikoAdmins";
        $admiko_data['sideBarActiveFolder'] = "";
        $admiko_data['formAction'] = route("bibliography.admins.store");
        $themes = Storage::disk('admiko_api_import')->directories('public/assets/admiko/css/theme');
        $themes = array_map('basename', $themes);
        $role_all = AdminRoles::all()->pluck("title", "id")->sortBy("title");
        $multi_tenancy_all = Admins::all()->sortBy("name")->pluck("name", "id");
        return view("bibliography.admins.manage")->with(compact('admiko_data', 'role_all', 'themes', 'multi_tenancy_all'));
    }

    public function store(AdminsRequest $request)
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("bibliography.home"));
        }
        $data = $request->all();
        $Admins = Admins::create($data);
        if ($Admins->role_id != 1) {
            $Admins->multi_tenancy_access()->sync([$Admins->id]);
        }
        return redirect(route("bibliography.admins.index"));
    }

    public function show($id)
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("bibliography.home"));
        }
        return redirect(route("bibliography.admins.index"));
    }

    public function edit(Admins $Admins)
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("bibliography.home"));
        }
        $admiko_data['sideBarActive'] = "admikoAdmins";
        $admiko_data['sideBarActiveFolder'] = "";
        $admiko_data['formAction'] = route("bibliography.admins.update", $Admins->id);
        if ($Admins->id == 1) {
            $role_all = AdminRoles::where('id', 1)->pluck("title", "id")->sortBy("title");
        } else {
            $role_all = AdminRoles::all()->pluck("title", "id")->sortBy("title");
        }
        $AdminsRole = $Admins->load('AdminsRole');
        $themes = Storage::disk('admiko_api_import')->directories('public/assets/admiko/css/theme');
        $themes = array_map('basename', $themes);
        $data = $Admins;
        $multi_tenancy_all = Admins::all()->sortBy("name")->pluck("name", "id");
        return view("bibliography.admins.manage")->with(compact('admiko_data', 'data', 'role_all', 'AdminsRole', 'themes', 'multi_tenancy_all'));
    }

    public function update(AdminsRequest $request, Admins $Admins)
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("bibliography.home"));
        }
        $data = $request->all();
        $Admins->update($data);
        $Admins->multi_tenancy_access()->sync($request->input("multi_tenancy", []));
        return redirect(route("bibliography.admins.index"));
    }

    public function destroy(Request $request)
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("bibliography.home"));
        }
        Admins::destroy($request->idDel);
        return back();
    }
}
