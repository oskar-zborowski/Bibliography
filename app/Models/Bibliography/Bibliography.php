<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Bibliography;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Traits\Bibliography\AdmikoFileUploadTrait;
use App\Http\Controllers\Traits\Bibliography\AdmikoAuditableTrait;
use App\Http\Controllers\Traits\Bibliography\AdmikoMultiTenantModeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bibliography extends Model
{
    use AdmikoFileUploadTrait,AdmikoAuditableTrait,AdmikoMultiTenantModeTrait,SoftDeletes;

    public $table = 'bibliography';
    
    
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
    ];
    public function setFileAttribute()
    {
        if (request()->hasFile('file')) {
            $this->attributes['file'] = $this->fileUpload(request()->file("file"), Bibliography::$admiko_file_info["file"], $this->getOriginal('file'));
        }
    }
    public function setFileAdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('file') && request()->file_admiko_delete == 1) {
            $this->attributes['file'] = $this->fileUpload('', Bibliography::$admiko_file_info["file"], $this->getOriginal('file'), $value);
        }
    }
}