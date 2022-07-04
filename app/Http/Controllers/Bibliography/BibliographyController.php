<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Bibliography;
use App\Http\Controllers\Controller;
use App\Models\Bibliography\Bibliography;
use Illuminate\Http\Request;
use App\Http\Requests\Bibliography\BibliographyRequest;
use Gate;

class BibliographyController extends Controller
{

    public function index()
    {
        if (Gate::none(['bibliography_allow', 'bibliography_edit'])) {
            return redirect(route("bibliography.home"));
        }
        $admiko_data['sideBarActive'] = "bibliography";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data["fileInfo"] = Bibliography::$admiko_file_info;
        $tableData = Bibliography::orderByDesc("id")->get();
        return view("bibliography.bibliography.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['bibliography_allow'])) {
            return redirect(route("bibliography.bibliography.index"));
        }
        $admiko_data['sideBarActive'] = "bibliography";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("bibliography.bibliography.store");
        $admiko_data["fileInfo"] = Bibliography::$admiko_file_info;
        
        return view("bibliography.bibliography.manage")->with(compact('admiko_data'));
    }

    public function store(BibliographyRequest $request)
    {
        if (Gate::none(['bibliography_allow'])) {
            return redirect(route("bibliography.bibliography.index"));
        }
        $data = $request->all();
        
        $Bibliography = Bibliography::create($data);
        
        return redirect(route("bibliography.bibliography.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Bibliography = Bibliography::find($id);
        if (Gate::none(['bibliography_allow', 'bibliography_edit']) || !$Bibliography) {
            return redirect(route("bibliography.bibliography.index"));
        }

        $admiko_data['sideBarActive'] = "bibliography";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("bibliography.bibliography.update", [$Bibliography->id]);
        $admiko_data["fileInfo"] = Bibliography::$admiko_file_info;
        
        $data = $Bibliography;
        return view("bibliography.bibliography.manage")->with(compact('admiko_data', 'data'));
    }

    public function update(BibliographyRequest $request,$id)
    {
        if (Gate::none(['bibliography_allow', 'bibliography_edit'])) {
            return redirect(route("bibliography.bibliography.index"));
        }
        $data = $request->all();
        $Bibliography = Bibliography::find($id);
        $Bibliography->update($data);
        
        return back();
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['bibliography_allow'])) {
            return redirect(route("bibliography.bibliography.index"));
        }
        Bibliography::destroy($request->idDel);
        return back();
    }
    
    
    
}
