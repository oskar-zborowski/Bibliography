{{--IMPORTANT: this page will be overwritten and any change will be lost!! Use custom_sidebar_bottom.blade.php and custom_sidebar_top.blade.php--}}

@if(Gate::any(['bibliographies_allow', 'bibliographies_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "bibliographies" ? " active" : "" }}"><a class="nav-link" href="{{route('bibliography.bibliographies.index')}}"><i class="fas fa-book fa-fw"></i>Bibliografie</a></li>
@endIf