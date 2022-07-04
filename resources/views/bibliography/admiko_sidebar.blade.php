{{--IMPORTANT: this page will be overwritten and any change will be lost!! Use custom_sidebar_bottom.blade.php and custom_sidebar_top.blade.php--}}

@if(Gate::any(['bibliography_allow', 'bibliography_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "bibliography" ? " active" : "" }}"><a class="nav-link" href="{{route('bibliography.bibliography.index')}}"><i class="fas fa-book fa-fw"></i>Bibliografia</a></li>
@endIf