@extends("bibliography.layouts.default")
@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page">Bibliografie</li>
@endsection
@section('pageTitle')
<h1>Bibliografie</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{route("bibliography.home")}}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card bibliographies_index admikoIndex">
    <div class="card-body">
        <div class="tableBox" id="tableBox">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <div class="pb-2 pb-sm-0">
                        <div class="lengthTable"></div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-start justify-content-sm-end">
                    @if(Gate::allows('bibliographies_allow'))
                    <div class="row multiDeleteButton" style="display: none">
                        <div class="col-12 text-end">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteConfirm" class="btn btn-danger" role="button"><i class="fas fa-trash fa-fw"></i> {{trans('admiko.delete_delete_btn')}}</a>
                        </div>
                    </div>
                    @endIf
                            <div class="searchTable">
					<div class="input-group ps-2">
                        <input type="text" name="admiko_search" class="form-control searchTableInput" placeholder="Search" value="">
                    </div></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tableLayout pb-2">
                                <table class="table tableSort" style="width:100%" data-dom="ltrip">
                    <thead>
                        <tr data-sort-method='thead'>
							<th scope="col" class="w-5" data-sort-method="number" >Lp.</th>
							<th scope="col" class="text-nowrap">Autorzy</th>
							<th scope="col" class="text-nowrap d-none d-sm-table-cell">Tytuł</th>
							<th scope="col" class="text-nowrap d-none d-md-table-cell">Rok wydania</th>
							<th scope="col" class="text-nowrap d-none d-lg-table-cell">Słowa kluczowe</th>
                            <th scope="col" class="w-5 no-sort" data-orderable="false">{{trans("admiko.table_edit")}}</th>
                            @if(Gate::allows('bibliographies_allow'))
                            <th scope="col" class="w-5 no-sort deleteSelectAll" data-orderable="false"><i class="fas fa-check-double"></i> {{trans('admiko.table_delete')}}</th>
                            @endIf
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tableData as $data)
                        <tr>
							<td class="w-5"><a href="{{route("bibliography.bibliographies.edit",[$data->id])}}">{{$data->id}}</a></td>
							<td class="text-nowrap">{{$data->authors}}</td>
							<td class="text-nowrap d-none d-sm-table-cell">{{$data->title}}</td>
							<td class="text-nowrap d-none d-md-table-cell">{{$data->publishment_year}}</td>
							<td class="text-nowrap d-none d-lg-table-cell">{{$data->keywords}}</td>
                            <td class="w-5 no-sort"><a href="{{route("bibliography.bibliographies.edit",[$data->id])}}"><i class="fas fa-edit fa-fw"></i></a></td>
                            @if(Gate::allows(['bibliographies_allow']))
                            <td class="w-5 no-sort"><div class="form-check form-checkbox">
                                <input type="checkbox" value="{{$data->id}}" class="form-check-input deleteSelectMe" id="multiple_delete_{{$data->id}}">
                            </div></td>
                            @endIf
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
                    @if(Gate::allows('bibliographies_allow'))
                    <div class="row multiDeleteButton" style="display: none">
                        <div class="col-12 text-end">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteConfirm" class="btn btn-danger" role="button"><i class="fas fa-trash fa-fw"></i> {{trans('admiko.delete_delete_btn')}}</a>
                        </div>
                    </div>
                    @endIf
            <div class="row">
                <div class="col-12 col-sm order-3 order-sm-0 pt-2">
                    @if(Gate::any(['bibliographies_allow']))
                        <a href="{{route('bibliography.bibliographies.create')}}" class="btn btn-primary" role="button"><i class="fas fa-plus fa-fw"></i> {{trans('admiko.table_add')}}</a>
                    @endIf
                </div>
                <div class="col-12 col-sm-auto order-0 order-sm-3 pt-2 align-self-center paginationInfo"></div>
                <div class="col-12 col-sm-auto order-0 order-sm-3 pt-2 text-end paginationBox"></div>
            </div>
        </div>
    </div>
    @if(Gate::allows('bibliographies_allow'))
    <!-- Delete confirm -->
    <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="deleteConfirm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="post" class="w-100" action="{{route("bibliography.bibliographies.delete")}}">
            @method('DELETE')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('admiko.delete_confirm')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">{{trans('admiko.delete_message')}}</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('admiko.delete_close_btn')}}</button>
                    <button type="submit" class="btn btn-danger deleteSoft">{{trans('admiko.delete_delete_btn')}}</button>
                </div>
            </div>
            <div class="dataDelete"></div>
            </form>
        </div>
    </div>
    @endIf
    
</div>
@endsection