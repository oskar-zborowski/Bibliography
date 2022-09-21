<?php

namespace App\Http\Controllers\Bibliography;

use App\Http\Controllers\Controller;
use App\Models\Bibliography\Bibliography;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                $b['issue_title'] = '';
            }

            if ($b['volume_editor'] === null) {
                $b['volume_editor'] = '';
            }

            if ($b['volume'] === null) {
                $b['volume'] = '';
            }

            if ($b['notebook'] === null) {
                $b['notebook'] = '';
            }

            if ($b['series'] === null) {
                $b['series'] = '';
            }

            if ($b['publication_place'] === null) {
                $b['publication_place'] = '';
            }

            if ($b['publishing_house'] === null) {
                $b['publishing_house'] = '';
            }

            if ($b['publication_year'] === null) {
                $b['publication_year'] = '';
            }

            if ($b['page_range'] === null) {
                $b['page_range'] = '';
            }

            if ($b['illustrations_number'] === null) {
                $b['illustrations_number'] = '';
            }

            if ($b['keywords'] === null) {
                $b['keywords'] = '';
            }

            if ($b['isbn'] === null) {
                $b['isbn'] = '';
            }

            if ($b['issn'] === null) {
                $b['issn'] = '';
            }

            if ($b['doi'] === null) {
                $b['doi'] = '';
            }

            if ($b['file'] === null) {
                $b['file'] = '';
            }

            if ($b['link'] === null) {
                $b['link'] = '';
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

    public function uploadBibliographyFromTxt(Request $request) {

        $fileName = 'Bibliografia.txt';

        $data = fread(fopen($fileName, 'r'), filesize($fileName));
        $dataLength = strlen($data);
        $counter = 0;
        $array = [];

        for ($i=0; $i<$dataLength; $i++) {

            if ($data[$i] == "\n") {
                $counter++;
            } else {
                if (!isset($array[$counter])) {
                    $array[$counter] = $data[$i];
                } else {
                    $array[$counter] .= $data[$i];
                }
            }
        }

        for ($i=$counter-1; $i>=0; $i--) {
            DB::table('bibliography')->insert([
                'title' => $array[$i],
            ]);
        }
    }
}
