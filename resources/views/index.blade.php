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
    <link rel="stylesheet" href="{{ asset('assets/admiko/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admiko/css/bibliography.css') }}">

    <!-- Other -->

    <title>{{ env('APP_NAME') }}</title>
    <link rel="Shortcut icon" href="{{ asset('assets/admiko/images/logo.png') }}">

</head>
<body>
    <div class="container py-5">
        <header class="text-center text-black">
            <h1 class="display-5">
                <b>{{ env('APP_NAME') }}</b>
            </h1>
        </header>
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
                                        <th>Liczba stron</th>
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
                                        <th>Plik</th>
                                        <th>Link</th>
                                        <th>Data dostępu</th>
                                    </tr>
                                    <tr>
                                        <th>Lp.</th>
                                        <th>Tytuł</th>
                                        <th>Autorzy</th>
                                        <th>Rok wydania</th>
                                        <th>Liczba stron</th>
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
                                        <th>Plik</th>
                                        <th>Link</th>
                                        <th>Data dostępu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>O pieniążkach wykopanych pod Zaniemyślem</td>
                                        <td>Borys Paszkiewicz, Jan Kowalski, Zofia Nowak</td>
                                        <td>2012</td>
                                        <td>6</td>
                                        <td>numizmatyka, archeologia</td>
                                        <td>Acta Archaeologica Carpathica</td>
                                        <td>Paweł Valde-Nowak</td>
                                        <td>13</td>
                                        <td>3</td>
                                        <td>Studia z dziejów górnictwa 13</td>
                                        <td>Poznań</td>
                                        <td>Nowa Era</td>
                                        <td>2016</td>
                                        <td>201-206</td>
                                        <td>3</td>
                                        <td>918-2-56319-989-4</td>
                                        <td>0001-5237</td>
                                        <td>10.4463/00065129AAC.21.023.15251</td>
                                        <td>abc</td>
                                        <td>https://dspace.uni.lodz.pl/xmlui/bitstream/handle/11089/28198/Stanisław_Liszewski_51_73.pdf</td>
                                        <td>21.06.2022</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>O pieniążkach wykopanych pod Zaniemyślem</td>
                                        <td>Borys Paszkiewicz, Jan Kowalski, Zofia Nowak</td>
                                        <td>2012</td>
                                        <td>6</td>
                                        <td>numizmatyka, archeologia</td>
                                        <td>Acta Archaeologica Carpathica</td>
                                        <td>Paweł Valde-Nowak</td>
                                        <td>13</td>
                                        <td>3</td>
                                        <td>Studia z dziejów górnictwa 13</td>
                                        <td>Poznań</td>
                                        <td>Nowa Era</td>
                                        <td>2016</td>
                                        <td>201-206</td>
                                        <td>3</td>
                                        <td>918-2-56319-989-4</td>
                                        <td>0001-5237</td>
                                        <td>10.4463/00065129AAC.21.023.15251</td>
                                        <td>abc</td>
                                        <td>https://dspace.uni.lodz.pl/xmlui/bitstream/handle/11089/28198/Stanisław_Liszewski_51_73.pdf</td>
                                        <td>21.06.2022</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>O pieniążkach wykopanych pod Zaniemyślem</td>
                                        <td>Borys Paszkiewicz, Jan Kowalski, Zofia Nowak</td>
                                        <td>2012</td>
                                        <td>6</td>
                                        <td>numizmatyka, archeologia</td>
                                        <td>Acta Archaeologica Carpathica</td>
                                        <td>Paweł Valde-Nowak</td>
                                        <td>13</td>
                                        <td>3</td>
                                        <td>Studia z dziejów górnictwa 13</td>
                                        <td>Poznań</td>
                                        <td>Nowa Era</td>
                                        <td>2016</td>
                                        <td>201-206</td>
                                        <td>3</td>
                                        <td>918-2-56319-989-4</td>
                                        <td>0001-5237</td>
                                        <td>10.4463/00065129AAC.21.023.15251</td>
                                        <td>abc</td>
                                        <td>https://dspace.uni.lodz.pl/xmlui/bitstream/handle/11089/28198/Stanisław_Liszewski_51_73.pdf</td>
                                        <td>21.06.2022</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>O pieniążkach wykopanych pod Zaniemyślem</td>
                                        <td>Borys Paszkiewicz, Jan Kowalski, Zofia Nowak</td>
                                        <td>2012</td>
                                        <td>6</td>
                                        <td>numizmatyka, archeologia</td>
                                        <td>Acta Archaeologica Carpathica</td>
                                        <td>Paweł Valde-Nowak</td>
                                        <td>13</td>
                                        <td>3</td>
                                        <td>Studia z dziejów górnictwa 13</td>
                                        <td>Poznań</td>
                                        <td>Nowa Era</td>
                                        <td>2016</td>
                                        <td>201-206</td>
                                        <td>3</td>
                                        <td>918-2-56319-989-4</td>
                                        <td>0001-5237</td>
                                        <td>10.4463/00065129AAC.21.023.15251</td>
                                        <td>abc</td>
                                        <td>https://dspace.uni.lodz.pl/xmlui/bitstream/handle/11089/28198/Stanisław_Liszewski_51_73.pdf</td>
                                        <td>21.06.2022</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>O pieniążkach wykopanych pod Zaniemyślem</td>
                                        <td>Borys Paszkiewicz, Jan Kowalski, Zofia Nowak</td>
                                        <td>2012</td>
                                        <td>6</td>
                                        <td>numizmatyka, archeologia</td>
                                        <td>Acta Archaeologica Carpathica</td>
                                        <td>Paweł Valde-Nowak</td>
                                        <td>13</td>
                                        <td>3</td>
                                        <td>Studia z dziejów górnictwa 13</td>
                                        <td>Poznań</td>
                                        <td>Nowa Era</td>
                                        <td>2016</td>
                                        <td>201-206</td>
                                        <td>3</td>
                                        <td>918-2-56319-989-4</td>
                                        <td>0001-5237</td>
                                        <td>10.4463/00065129AAC.21.023.15251</td>
                                        <td>abc</td>
                                        <td>https://dspace.uni.lodz.pl/xmlui/bitstream/handle/11089/28198/Stanisław_Liszewski_51_73.pdf</td>
                                        <td>21.06.2022</td>
                                    </tr>
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
    <script src="{{ asset('assets/admiko/js/bibliography.js') }}"></script>

</body>
</html>
