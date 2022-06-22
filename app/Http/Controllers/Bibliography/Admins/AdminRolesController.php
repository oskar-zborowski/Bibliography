<?php
/** Manage roles for users. **/
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Bibliography\Admins;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\Bibliography\AdmikoHelperTrait;
use App\Models\Bibliography\Admins\AdminRoles;
use Illuminate\Http\Request;
use App\Http\Requests\Bibliography\Admins\AdminRolesRequest;

class AdminRolesController extends Controller
{
    use AdmikoHelperTrait;

    public function index()
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("bibliography.home"));
        }
        $admiko_data['sideBarActive'] = "admikoAdmins";
        $admiko_data['sideBarActiveFolder'] = "";
        $tableData = AdminRoles::where('id', '>', 1)->get();
        return view("bibliography.admins.role.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("bibliography.home"));
        }
        $admiko_data['sideBarActive'] = "admikoAdmins";
        $admiko_data['sideBarActiveFolder'] = "";
        $admiko_data['formAction'] = route("bibliography.admin_roles.store");
        $permission_all = $this->listRouteNames();
        return view("bibliography.admins.role.manage")->with(compact('admiko_data', 'permission_all'));
    }

    public function store(AdminRolesRequest $request)
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("bibliography.home"));
        }
        $data = $request->all();
        $AdminRoles = AdminRoles::create($data);
        $AdminRoles->permission_many()->sync($request->input("permission", []));
        return redirect(route("bibliography.admin_roles.index"));
    }

    public function show($id)
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("bibliography.home"));
        }
        return redirect(route("bibliography.admin_roles.index"));
    }

    public function edit(AdminRoles $AdminRoles)
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("bibliography.home"));
        }
        if ($AdminRoles->id == 1) {
            return redirect(route("bibliography.admin_roles.index"));
        }
        $admiko_data['sideBarActive'] = "admikoAdmins";
        $admiko_data['sideBarActiveFolder'] = "";
        $admiko_data['formAction'] = route("bibliography.admin_roles.update", $AdminRoles->id);
        $permission_all = $this->listRouteNames();
        $data = $AdminRoles;
        return view("bibliography.admins.role.manage")->with(compact('admiko_data', 'data', 'permission_all'));
    }

    public function update(AdminRolesRequest $request, AdminRoles $AdminRoles)
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("bibliography.home"));
        }
        $data = $request->all();
        $AdminRoles->find($AdminRoles->id)->update($data);
        $AdminRoles->permission_many()->sync($request->input("permission", []));
        return redirect(route("bibliography.admin_roles.index"));
    }

    public function destroy(Request $request)
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("bibliography.home"));
        }
        AdminRoles::destroy($request->idDel);
        return back();
    }
}
