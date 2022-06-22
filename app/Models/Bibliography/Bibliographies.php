<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Bibliography;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Http\Controllers\Traits\Bibliography\AdmikoFileUploadTrait;
use App\Http\Controllers\Traits\Bibliography\AdmikoAuditableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bibliographies extends Model
{
    use AdmikoFileUploadTrait,AdmikoAuditableTrait,SoftDeletes;

    public $table = 'bibliographies';
    
    
	static $admiko_file_info = [
		"file"=>[
			"original"=>["folder"=>"upload/"]
		]
	];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"authors",
		"title",
		"issue_title",
		"volume_editor",
		"volume",
		"notebook",
		"series",
		"publication_place",
		"publishing_house",
		"publishment_year",
		"publication_year",
		"page_range",
		"illustrations_number",
		"keywords",
		"isbn",
		"issn",
		"doi",
		"file",
		"file_admiko_delete",
		"link",
		"access_date",
    ];
    public function setFileAttribute()
    {
        if (request()->hasFile('file')) {
            $this->attributes['file'] = $this->fileUpload(request()->file("file"), Bibliographies::$admiko_file_info["file"], $this->getOriginal('file'));
        }
    }
    public function setFileAdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('file') && request()->file_admiko_delete == 1) {
            $this->attributes['file'] = $this->fileUpload('', Bibliographies::$admiko_file_info["file"], $this->getOriginal('file'), $value);
        }
    }
	public function getAccessDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('admiko_config.table_date_format')) : null;
    }
    public function setAccessDateAttribute($value)
    {
        $this->attributes['access_date'] = $value ? Carbon::createFromFormat(config('admiko_config.table_date_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}