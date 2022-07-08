<?php

namespace App\Http\Controllers\Bibliography;

use App\Http\Controllers\Controller;
use App\Models\Bibliography\Bibliography;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getBibliography(Request $request) {

        if ($request->search !== '') {
            $bibliography = Bibliography::where('id', 'like', "%$request->search%")
                ->orWhere('authors', 'like', "%$request->search%")
                ->orWhere('title', 'like', "%$request->search%")
                ->orWhere('issue_title', 'like', "%$request->search%")
                ->orWhere('volume_editor', 'like', "%$request->search%")
                ->orWhere('volume', 'like', "%$request->search%")
                ->orWhere('notebook', 'like', "%$request->search%")
                ->orWhere('series', 'like', "%$request->search%")
                ->orWhere('publication_place', 'like', "%$request->search%")
                ->orWhere('publishing_house', 'like', "%$request->search%")
                ->orWhere('publishment_year', 'like', "%$request->search%")
                ->orWhere('publication_year', 'like', "%$request->search%")
                ->orWhere('page_range', 'like', "%$request->search%")
                ->orWhere('illustrations_number', 'like', "%$request->search%")
                ->orWhere('keywords', 'like', "%$request->search%")
                ->orWhere('isbn', 'like', "%$request->search%")
                ->orWhere('issn', 'like', "%$request->search%")
                ->orWhere('doi', 'like', "%$request->search%")
                ->orWhere('link', 'like', "%$request->search%")
                ->limit($request->limit)
                ->offset(($request->page - 1) * $request->limit)
                ->orderBy($request->sortBy, $request->sortMethod)
                ->get()
                ->toArray();
        } else {
            $bibliography = Bibliography::limit($request->limit)
                ->offset(($request->page - 1) * $request->limit)
                ->orderBy($request->sortBy, $request->sortMethod)
                ->get()
                ->toArray();
        }

        echo json_encode($bibliography);
        die;
    }
}
