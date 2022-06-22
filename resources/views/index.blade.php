<!DOCTYPE html>

<!--
        Author:
    Oskar Zborowski
-->

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- Meta -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="author" content="Oskar Zborowski">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('assets/admiko/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admiko/vendors/datatables/DataTables-1.10.21/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admiko/vendors/datatables/Responsive-2.3.0/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admiko/vendors/datatables/FixedHeader-3.2.4/css/fixedHeader.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admiko/vendors/datatables/FixedColumns-4.1.0/css/fixedColumns.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admiko/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admiko/css/bibliography.css') }}">

    <!-- Other -->

    <title>{{ env('APP_NAME') }}</title>
    <link rel="Shortcut icon" href="{{ asset('assets/admiko/images/logo.png') }}">

</head>
<body>
    <div class="container py-5">
        <!-- <header class="text-center text-black">
            <h1 class="display-5">
                <b>{{ env('APP_NAME') }}</b>
            </h1>
        </header> -->
        <div class="row py-5">
            <div class="col-lg-10 mx-auto">
                <div class="card rounded shadow border-0">
                    <div class="card-body p-5 bg-white rounded">
                        <div class="table-responsive">
                            <table id="bibliography" class="row-border hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Lp.</th>
                                        <th>Tytuł</th>
                                        <th>Autorzy</th>
                                        <th>Rok wydania</th>
                                        <th>Słowa kluczowe</th>
                                        <th>Tytuł tomu / czasopisma</th>
                                        <th>Redaktor tomu</th>
                                        <th>Tom</th>
                                        <th>Zeszyt</th>
                                        <th>Tytuł i numer serii</th>
                                        <th>Miejsce wydania</th>
                                        <th>Wydawnictwo</th>
                                        <th>Rok publikacji</th>
                                        <th>Przedział stron</th>
                                        <th>Liczba ilustracji</th>
                                        <th>ISBN</th>
                                        <th>ISSN</th>
                                        <th>DOI</th>
                                        <th>Link</th>
                                        <th>Data dostępu</th>
                                        <th>Plik</th>
                                    </tr>
                                    <tr>
                                        <th>Lp.</th>
                                        <th>Tytuł</th>
                                        <th>Autorzy</th>
                                        <th>Rok wydania</th>
                                        <th>Słowa kluczowe</th>
                                        <th>Tytuł tomu / czasopisma</th>
                                        <th>Redaktor tomu</th>
                                        <th>Tom</th>
                                        <th>Zeszyt</th>
                                        <th>Tytuł i numer serii</th>
                                        <th>Miejsce wydania</th>
                                        <th>Wydawnictwo</th>
                                        <th>Rok publikacji</th>
                                        <th>Przedział stron</th>
                                        <th>Liczba ilustracji</th>
                                        <th>ISBN</th>
                                        <th>ISSN</th>
                                        <th>DOI</th>
                                        <th>Link</th>
                                        <th>Data dostępu</th>
                                        <th>Plik</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ($bibliographies as $bibliography)
                                    <tr>
                                        <td>{{ $bibliography->id }}</td>
                                        <td>{{ $bibliography->title }}</td>
                                        <td>{{ $bibliography->authors }}</td>
                                        <td>{{ $bibliography->publishment_year }}</td>
                                        <td>
                                            @if ($bibliography->keywords)
                                                {{ $bibliography->keywords }}
                                            @endif
                                        </td>
                                        <td>{{ $bibliography->issue_title }}</td>
                                        <td>{{ $bibliography->volume_editor }}</td>
                                        <td>
                                            @if ($bibliography->volume)
                                                {{ $bibliography->volume }}
                                            @else
                                                nie podano
                                            @endif
                                        </td>
                                        <td>
                                            @if ($bibliography->notebook)
                                                {{ $bibliography->notebook }}
                                            @else
                                                nie podano
                                            @endif
                                        </td>
                                        <td>
                                            @if ($bibliography->series)
                                                {{ $bibliography->series }}
                                            @else
                                                nie podano
                                            @endif
                                        </td>
                                        <td>
                                            @if ($bibliography->publication_place)
                                                {{ $bibliography->publication_place }}
                                            @else
                                                nie podano
                                            @endif
                                        </td>
                                        <td>
                                            @if ($bibliography->publishing_house)
                                                {{ $bibliography->publishing_house }}
                                            @else
                                                nie podano
                                            @endif
                                        </td>
                                        <td>
                                            @if ($bibliography->publication_year)
                                                {{ $bibliography->publication_year }}
                                            @else
                                                nie podano
                                            @endif
                                        </td>
                                        <td>{{ $bibliography->page_range }}</td>
                                        <td>
                                            @if ($bibliography->ilustrations_number)
                                                {{ $bibliography->ilustrations_number }}
                                            @else
                                                nie podano
                                            @endif
                                        </td>
                                        <td>{{ $bibliography->isbn }}</td>
                                        <td>{{ $bibliography->issn }}</td>
                                        <td>{{ $bibliography->doi }}</td>
                                        <td>
                                            @if ($bibliography->link)
                                                {{ $bibliography->link }}
                                            @else
                                                nie podano
                                            @endif
                                        </td>
                                        <td>
                                            @if ($bibliography->link && $bibliography->access_date)
                                                {{ $bibliography->access_date }}
                                            @else
                                                nie podano
                                            @endif
                                        </td>
                                        <td>
                                            @if ($bibliography->file)
                                                {{ $bibliography->file }}
                                            @else
                                                brak
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->

    <script src="{{ asset('assets/admiko/vendors/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/admiko/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admiko/vendors/datatables/DataTables-1.10.21/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admiko/vendors/datatables/Responsive-2.3.0/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admiko/vendors/datatables/FixedHeader-3.2.4/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('assets/admiko/vendors/datatables/FixedColumns-4.1.0/js/dataTables.fixedColumns.min.js') }}"></script>
    <script src="{{ asset('assets/admiko/js/bibliography.js') }}"></script>

</body>
</html>
