@extends("bibliography.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("bibliography.bibliographies.index") }}">Bibliografie</a></li>
    @if(isset($data))
		<li class="breadcrumb-item active" aria-current="page">{{$data->title}}</li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Bibliografie</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("bibliography.bibliographies.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage bibliographies_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row admiko_separator">
                        <label class="col-12 col-form-label">Podstawowe informacje</label>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="authors" class="col-md-2 col-form-label">Autorzy:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="authors" name="authors" required="true" placeholder="Autorzy"  value="{{{ old('authors', isset($data)?$data->authors : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('authors')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="authors_help" class="text-muted">np. Jan Kowalski, Zofia Nowak</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label">Tytuł:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="title" name="title" required="true" placeholder="Tytuł"  value="{{{ old('title', isset($data)?$data->title : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('title')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="title_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="issue_title" class="col-md-2 col-form-label">Tytuł tomu / czasopisma:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="issue_title" name="issue_title" required="true" placeholder="Tytuł tomu / czasopisma"  value="{{{ old('issue_title', isset($data)?$data->issue_title : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('issue_title')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="issue_title_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="volume_editor" class="col-md-2 col-form-label">Redaktor tomu:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="volume_editor" name="volume_editor" required="true" placeholder="Redaktor tomu"  value="{{{ old('volume_editor', isset($data)?$data->volume_editor : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('volume_editor')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="volume_editor_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="volume" class="col-md-2 col-lg-4 col-form-label">Tom:</label>
                        <div class="col-md-10 col-lg-8">
                            <input type="number" class="form-control limitPozNegNumbers numbersWidth" id="volume" name="volume"  placeholder="Tom"
                                   step="1" 
                                   value="{{{ old('volume', isset($data)?$data->volume : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('volume')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="volume_help" class="text-muted">np. 13</small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="notebook" class="col-md-2 col-lg-4 col-form-label">Zeszyt:</label>
                        <div class="col-md-10 col-lg-8">
                            <input type="number" class="form-control limitPozNegNumbers numbersWidth" id="notebook" name="notebook"  placeholder="Zeszyt"
                                   step="1" 
                                   value="{{{ old('notebook', isset($data)?$data->notebook : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('notebook')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="notebook_help" class="text-muted">np. 3</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="series" class="col-md-2 col-form-label">Tytuł i numer serii:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="series" name="series"  placeholder="Tytuł i numer serii"  value="{{{ old('series', isset($data)?$data->series : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('series')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="series_help" class="text-muted">np. Studia z dziejów górnictwa 13</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="publication_place" class="col-md-2 col-form-label">Miejsce wydania:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="publication_place" name="publication_place"  placeholder="Miejsce wydania"  value="{{{ old('publication_place', isset($data)?$data->publication_place : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('publication_place')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="publication_place_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="publishing_house" class="col-md-2 col-form-label">Wydawnictwo:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="publishing_house" name="publishing_house"  placeholder="Wydawnictwo"  value="{{{ old('publishing_house', isset($data)?$data->publishing_house : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('publishing_house')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="publishing_house_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="publishment_year" class="col-md-2 col-lg-4 col-form-label">Rok wydania:*</label>
                        <div class="col-md-10 col-lg-8">
                            <input type="number" class="form-control limitPozNegNumbers numbersWidth" id="publishment_year" name="publishment_year" required="true" placeholder="Rok wydania"
                                   step="1" 
                                   value="{{{ old('publishment_year', isset($data)?$data->publishment_year : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('publishment_year')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="publishment_year_help" class="text-muted">np. 2012</small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="publication_year" class="col-md-2 col-lg-4 col-form-label">Rok publikacji:</label>
                        <div class="col-md-10 col-lg-8">
                            <input type="number" class="form-control limitPozNegNumbers numbersWidth" id="publication_year" name="publication_year"  placeholder="Rok publikacji"
                                   step="1" 
                                   value="{{{ old('publication_year', isset($data)?$data->publication_year : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('publication_year')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="publication_year_help" class="text-muted">np. 2016</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row admiko_separator">
                        <label class="col-12 col-form-label">Szczegółowe informacje</label>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="page_range" class="col-md-2 col-lg-4 col-form-label">Przedział stron:*</label>
                        <div class="col-md-10 col-lg-8">
                            <input type="text" class="form-control" id="page_range" name="page_range" required="true" placeholder="Przedział stron"  value="{{{ old('page_range', isset($data)?$data->page_range : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('page_range')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="page_range_help" class="text-muted">np. 201-206</small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="illustrations_number" class="col-md-2 col-lg-4 col-form-label">Liczba ilustracji:</label>
                        <div class="col-md-10 col-lg-8">
                            <input type="number" class="form-control limitPozNegNumbers numbersWidth" id="illustrations_number" name="illustrations_number"  placeholder="Liczba ilustracji"
                                   step="1" 
                                   value="{{{ old('illustrations_number', isset($data)?$data->illustrations_number : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('illustrations_number')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="illustrations_number_help" class="text-muted">np. 3</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="keywords" class="col-md-2 col-form-label">Słowa kluczowe:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="keywords" name="keywords"  placeholder="Słowa kluczowe"  value="{{{ old('keywords', isset($data)?$data->keywords : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('keywords')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="keywords_help" class="text-muted">np. numizmatyka, archeologia</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="isbn" class="col-md-2 col-form-label">ISBN:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="isbn" name="isbn" required="true" placeholder="ISBN"  value="{{{ old('isbn', isset($data)?$data->isbn : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('isbn')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="isbn_help" class="text-muted">np. 918-2-56319-989-4</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="issn" class="col-md-2 col-form-label">ISSN:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="issn" name="issn" required="true" placeholder="ISSN"  value="{{{ old('issn', isset($data)?$data->issn : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('issn')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="issn_help" class="text-muted">np. 0001-5237</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="doi" class="col-md-2 col-form-label">DOI:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="doi" name="doi" required="true" placeholder="DOI"  value="{{{ old('doi', isset($data)?$data->doi : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('doi')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="doi_help" class="text-muted">np. 10.4463/00065129AAC.21.023.15251</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row admiko_separator">
                        <label class="col-12 col-form-label">Załączniki</label>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="file" class="col-md-2 col-form-label">Plik:</label>
                        <div class="col-md-10">
                            @if (isset($data->file) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["file"]['original']["folder"].$data->file))
                            <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["file"]['original']["folder"].$data->file)}}" target="_blank">{{$data->file}}</a><br>
                                <div class="form-check form-checkbox">
                                <input class="form-check-input" type="checkbox" name="file_admiko_delete" id="file_admiko_delete" value="1">
                                <label class="form-check-label" for="file_admiko_delete"> {{trans('admiko.remove_file')}}</label>
                            </div>
                            @endif
                            <input type="file" class="fileUpload mt-1" id="file" accept=".pdf,.docx,.doc,.rtf,.txt,.xml,.html,.htm,.mht" data-type=".pdf,.docx,.doc,.rtf,.txt,.xml,.html,.htm,.mht" data-size="20" name="file" >
                            <input type="hidden" id="file_admiko_current" name="file_admiko_current" value="{{$data->file??''}}">
                            <div class="invalid-feedback @if ($errors->has('file')) d-block @endif" data-required="{{trans('admiko.required_text')}}" data-size="{{trans('admiko.required_size')}}" data-type="{{trans('admiko.required_type')}}">
                                @if ($errors->has('file')){{ $errors->first('file') }}@endif
                            </div>
                            <small id="file_help" class="text-muted">File size limit: 20 MB. {{trans("admiko.file_extension_limit")}}.pdf,.docx,.doc,.rtf,.txt,.xml,.html,.htm,.mht. </small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="link" class="col-md-2 col-form-label">Link:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="link" name="link"  placeholder="Link"  value="{{{ old('link', isset($data)?$data->link : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('link')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="link_help" class="text-muted">np. https://dspace.uni.lodz.pl/xmlui/bitstream/handle/11089/28198/Stanisław_Liszewski_51_73.pdf</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="access_date" class="col-md-2 col-form-label">Data dostępu:</label>
                        <div class="col-md-10">
                            <div class="input-group" id="datePicker_access_date" data-target-input="nearest">
                                <input type="text" autocomplete="off" style="max-width: 170px;border-right: unset;"
                                       data-date_time_format="{{config('admiko_config.form_date_format')}}"
                                       class="form-control datetimepicker-input datePicker"
                                       data-target="#datePicker_access_date"  id="access_date" data-toggle="datetimepicker"
                                       placeholder="Data dostępu" name="access_date" value="{{{ old('access_date', isset($data)?$data->access_date : '') }}}">
                                <div class="input-group-append input-group-text" data-target="#datePicker_access_date" data-toggle="datetimepicker">
                                    <i class="fas fa-calendar-alt fa-fw"></i>
                                </div>
                            </div>
                            <div class="invalid-feedback @if ($errors->has('access_date')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="access_date_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer form-actions" id="form-group-buttons">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary float-start me-1 mb-1 mb-sm-0 save-button">{{trans('admiko.table_save')}}</button>
                    <a href="{{ route("bibliography.bibliographies.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection