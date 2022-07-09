<?php

namespace App\Http\Controllers\Bibliography;

use App\Http\Controllers\Controller;
use App\Models\Bibliography\Bibliography;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getBibliography(Request $request) {

        $search = trim($request->search);

        if ($search != '') {

            $bibliography = Bibliography::where('id', 'like', "%$search%")
                ->orWhere('authors', 'like', "%$search%")
                ->orWhere('title', 'like', "%$search%")
                ->orWhere('issue_title', 'like', "%$search%")
                ->orWhere('volume_editor', 'like', "%$search%")
                ->orWhere('volume', 'like', "%$search%")
                ->orWhere('notebook', 'like', "%$search%")
                ->orWhere('series', 'like', "%$search%")
                ->orWhere('publication_place', 'like', "%$search%")
                ->orWhere('publishing_house', 'like', "%$search%")
                ->orWhere('publishment_year', 'like', "%$search%")
                ->orWhere('publication_year', 'like', "%$search%")
                ->orWhere('page_range', 'like', "%$search%")
                ->orWhere('illustrations_number', 'like', "%$search%")
                ->orWhere('keywords', 'like', "%$search%")
                ->orWhere('isbn', 'like', "%$search%")
                ->orWhere('issn', 'like', "%$search%")
                ->orWhere('doi', 'like', "%$search%")
                ->orWhere('link', 'like', "%$search%")
                ->limit($request->limit)
                ->offset(($request->page - 1) * $request->limit)
                ->orderBy($request->sortBy, $request->sortMethod)
                ->get()
                ->toArray();

            $bibliographyCount = Bibliography::where('id', 'like', "%$search%")
                ->orWhere('authors', 'like', "%$search%")
                ->orWhere('title', 'like', "%$search%")
                ->orWhere('issue_title', 'like', "%$search%")
                ->orWhere('volume_editor', 'like', "%$search%")
                ->orWhere('volume', 'like', "%$search%")
                ->orWhere('notebook', 'like', "%$search%")
                ->orWhere('series', 'like', "%$search%")
                ->orWhere('publication_place', 'like', "%$search%")
                ->orWhere('publishing_house', 'like', "%$search%")
                ->orWhere('publishment_year', 'like', "%$search%")
                ->orWhere('publication_year', 'like', "%$search%")
                ->orWhere('page_range', 'like', "%$search%")
                ->orWhere('illustrations_number', 'like', "%$search%")
                ->orWhere('keywords', 'like', "%$search%")
                ->orWhere('isbn', 'like', "%$search%")
                ->orWhere('issn', 'like', "%$search%")
                ->orWhere('doi', 'like', "%$search%")
                ->orWhere('link', 'like', "%$search%")
                ->get()
                ->toArray();

        } else {

            $bibliography = Bibliography::limit($request->limit)
                ->offset(($request->page - 1) * $request->limit)
                ->orderBy($request->sortBy, $request->sortMethod)
                ->get()
                ->toArray();

            $bibliographyCount = Bibliography::get()->toArray();
        }

        $bibliographyRecordsNumer = count($bibliographyCount);

        foreach ($bibliography as &$b) {

            if ($b['issue_title'] === null) {
                $b['issue_title'] = 'nie podano';
            }

            if ($b['volume_editor'] === null) {
                $b['volume_editor'] = 'nie podano';
            }

            if ($b['volume'] === null) {
                $b['volume'] = 'nie podano';
            }

            if ($b['notebook'] === null) {
                $b['notebook'] = 'nie podano';
            }

            if ($b['series'] === null) {
                $b['series'] = 'nie podano';
            }

            if ($b['publication_place'] === null) {
                $b['publication_place'] = 'nie podano';
            }

            if ($b['publishing_house'] === null) {
                $b['publishing_house'] = 'nie podano';
            }

            if ($b['publication_year'] === null) {
                $b['publication_year'] = 'nie podano';
            }

            if ($b['page_range'] === null) {
                $b['page_range'] = 'nie podano';
            }

            if ($b['illustrations_number'] === null) {
                $b['illustrations_number'] = 'nie podano';
            }

            if ($b['keywords'] === null) {
                $b['keywords'] = 'nie podano';
            }

            if ($b['isbn'] === null) {
                $b['isbn'] = 'nie podano';
            }

            if ($b['issn'] === null) {
                $b['issn'] = 'nie podano';
            }

            if ($b['doi'] === null) {
                $b['doi'] = 'nie podano';
            }
        }

        echo json_encode([
            'data' => $bibliography,
            'metadata' => [
                'bibliographyRecordsNumer' => $bibliographyRecordsNumer,
                'bibliographyPagesNumer' => ceil($bibliographyRecordsNumer / $request->limit),
            ]
        ]);
        die;
    }
}
