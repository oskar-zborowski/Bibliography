<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Requests\Bibliography;
use Illuminate\Foundation\Http\FormRequest;
use Response;

class BibliographiesRequest extends FormRequest
{
    public function rules()
    {
        $id = $this->route("bibliographies") ?? null;
		return [
            "authors"=>[
				"string",
				"required"
			],
			"title"=>[
				"string",
				"required"
			],
			"issue_title"=>[
				"string",
				"required"
			],
			"volume_editor"=>[
				"string",
				"required"
			],
			"volume"=>[
				"integer",
				"nullable"
			],
			"notebook"=>[
				"integer",
				"nullable"
			],
			"series"=>[
				"string",
				"nullable"
			],
			"publication_place"=>[
				"string",
				"nullable"
			],
			"publishing_house"=>[
				"string",
				"nullable"
			],
			"publishment_year"=>[
				"integer",
				"required"
			],
			"publication_year"=>[
				"integer",
				"nullable"
			],
			"page_range"=>[
				"string",
				"required"
			],
			"illustrations_number"=>[
				"integer",
				"nullable"
			],
			"keywords"=>[
				"string",
				"nullable"
			],
			"isbn"=>[
				"string",
				"required"
			],
			"issn"=>[
				"string",
				"required"
			],
			"doi"=>[
				"string",
				"unique:bibliographies,doi,".$id.",id,deleted_at,NULL",
				"required"
			],
			"file"=>[
				"file",
				"max:20560",
				"file_extension:pdf,docx,doc,rtf,txt,xml,html,htm,mht",
				"mimes:pdf,docx,doc,rtf,txt,xml,html,htm,mht",
				"nullable"
			],
			"link"=>[
				"string",
				"nullable"
			],
			"access_date"=>[
				'date_format:"'.config('admiko_config.table_date_format').'"',
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "authors"=>"Autorzy",
			"title"=>"Tytuł",
			"issue_title"=>"Tytuł tomu / czasopisma",
			"volume_editor"=>"Redaktor tomu",
			"volume"=>"Tom",
			"notebook"=>"Zeszyt",
			"series"=>"Tytuł i numer serii",
			"publication_place"=>"Miejsce wydania",
			"publishing_house"=>"Wydawnictwo",
			"publishment_year"=>"Rok wydania",
			"publication_year"=>"Rok publikacji",
			"page_range"=>"Przedział stron",
			"illustrations_number"=>"Liczba ilustracji",
			"keywords"=>"Słowa kluczowe",
			"isbn"=>"ISBN",
			"issn"=>"ISSN",
			"doi"=>"DOI",
			"file"=>"Plik",
			"link"=>"Link",
			"access_date"=>"Data dostępu"
        ];
    }
    public function messages()
    {
        return [
            "file.required_without"=>trans("validation.required")
        ];
    }


    public function authorize()
    {
        if (!auth("admin")->check()) {
            return false;
        }
        return true;
    }
}