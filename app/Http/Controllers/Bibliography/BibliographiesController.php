<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Bibliography;
use App\Http\Controllers\Controller;
use App\Models\Bibliography\Bibliographies;
use Illuminate\Http\Request;
use App\Http\Requests\Bibliography\BibliographiesRequest;
use Gate;

class BibliographiesController extends Controller
{

    public function index()
    {
        if (Gate::none(['bibliographies_allow', 'bibliographies_edit'])) {
            return redirect(route("bibliography.home"));
        }
        $admiko_data['sideBarActive'] = "bibliographies";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data["fileInfo"] = Bibliographies::$admiko_file_info;
        $tableData = Bibliographies::orderByDesc("id")->get();
        return view("bibliography.bibliographies.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['bibliographies_allow'])) {
            return redirect(route("bibliography.bibliographies.index"));
        }
        $admiko_data['sideBarActive'] = "bibliographies";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("bibliography.bibliographies.store");
        $admiko_data["fileInfo"] = Bibliographies::$admiko_file_info;
        
        return view("bibliography.bibliographies.manage")->with(compact('admiko_data'));
    }

    public function store(BibliographiesRequest $request)
    {
        if (Gate::none(['bibliographies_allow'])) {
            return redirect(route("bibliography.bibliographies.index"));
        }
        $data = $request->all();
        
        $Bibliographies = Bibliographies::create($data);
        
        return redirect(route("bibliography.bibliographies.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Bibliographies = Bibliographies::find($id);
        if (Gate::none(['bibliographies_allow', 'bibliographies_edit']) || !$Bibliographies) {
            return redirect(route("bibliography.bibliographies.index"));
        }

        $admiko_data['sideBarActive'] = "bibliographies";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("bibliography.bibliographies.update", [$Bibliographies->id]);
        $admiko_data["fileInfo"] = Bibliographies::$admiko_file_info;
        
        $data = $Bibliographies;
        return view("bibliography.bibliographies.manage")->with(compact('admiko_data', 'data'));
    }

    public function update(BibliographiesRequest $request,$id)
    {
        if (Gate::none(['bibliographies_allow', 'bibliographies_edit'])) {
            return redirect(route("bibliography.bibliographies.index"));
        }
        $data = $request->all();
        $Bibliographies = Bibliographies::find($id);
        $Bibliographies->update($data);
        
        return back();
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['bibliographies_allow'])) {
            return redirect(route("bibliography.bibliographies.index"));
        }
        Bibliographies::destroy($request->idDel);
        return back();
    }
    
    
    
}
