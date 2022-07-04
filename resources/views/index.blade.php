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

    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

    <link rel="stylesheet" href="{{ asset('assets/admiko/css/bulma.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admiko/css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admiko/css/bibliography.css') }}">

    <!-- Other -->

    <title>{{ env('APP_NAME') }}</title>
    <link rel="Shortcut icon" href="{{ asset('assets/admiko/images/icon.png') }}">

</head>

<body>

    <section class="hero is-light is-main">
        <div class="hero-body">
            <div class="container">
                <h1 class="title has-text-centered">
                    {{ env('APP_NAME') }}
                </h1>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="b-table has-pagination"> <!-- is-loading -->
                <div class="table-wrapper has-mobile-cards">
                    <table class="table is-fullwidth is-striped is-hoverable">
                        <thead>
                            <tr>
                                <th class="is-chevron-cell"></th>
                                <th class="is-current-sort is-sortable" style="width: 70px;">
                                    <div class="th-wrap">
                                        Lp.<span class="icon is-small"><i class="mdi mdi-arrow-down"></i></span>
                                    </div>
                                </th>
                                <th class="is-sortable" style="width: 25%;">
                                    <div class="th-wrap" style="min-width: 140px;">
                                        Autorzy<!-- <span class="icon is-small"><i class="mdi mdi-arrow-up"></i></span> -->
                                    </div>
                                </th>
                                <th class="is-sortable" style="width: 75%;">
                                    <div class="th-wrap">
                                        Tytuł<!-- <span class="icon is-small"><i class="mdi mdi-arrow-up"></i></span> -->
                                    </div>
                                </th>
                                <th class="is-sortable">
                                    <div class="th-wrap" style="white-space: nowrap;">
                                        Rok wydania<!-- <span class="icon is-small"><i class="mdi mdi-arrow-up"></i></span> -->
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="is-chevron-cell">
                                    <a role="button">
                                        <span class="icon is-expanded"><i class="mdi mdi-chevron-right mdi-24px"></i></span>
                                    </a>
                                </td>
                                <!-- <td class="expanded-details">
                                    <div style="display: flex; flex-direction: row; width: 100% !important; gap: 5px">
                                        <div style="flex: 0; font-weight: 500;">DOI</div>
                                        <div class="overflow-ellipsis" style="flex: 1;"><span style="left: 0">10.4463/00065129AAC .21.023.15252</span></div>
                                    </div>
                                </td> -->
                                <td data-label="Lp." style="vertical-align: middle;"><div class="td-center">1</div></td>
                                <td data-label="Autorzy" class="overflow-ellipsis" style="vertical-align: middle;"><span>Borys Paszkiewicz, Zofia Nowak</span></td>
                                <td data-label="Tytuł" class="overflow-ellipsis" style="vertical-align: middle;"><span>Silesiorum moneta, czyli mennictwo śląskie w późnym średniowieczu (1419-1526) z katalogiem monet śląskich, kłodzkich i łużyckich z lat 1327-1526</span></td>
                                <td data-label="Rok wydania" style="vertical-align: middle;"><div class="td-center">2012</div></td>
                                <td data-label="Tytuł tomu / czasopisma" class="overflow-ellipsis expanded-details" style="vertical-align: middle;"><span>Acta Geologica Polonica</span></td>
                                <td data-label="Redaktor tomu" class="overflow-ellipsis expanded-details" style="vertical-align: middle;"><span>Piotr Kowalski</span></td>
                                <td data-label="Tom" class="overflow-ellipsis expanded-details" style="vertical-align: middle;"><span>13</span></td>
                                <td data-label="Zeszyt" class="overflow-ellipsis expanded-details" style="vertical-align: middle;"><span>3</span></td>
                                <td data-label="Tytuł i numer serii" class="overflow-ellipsis expanded-details" style="vertical-align: middle;"><span>Studia z dziejów górnictwa 13</span></td>
                                <td data-label="Miejsce wydania" class="overflow-ellipsis expanded-details" style="vertical-align: middle;"><span>Warszawa</span></td>
                                <td data-label="Wydawnictwo" class="overflow-ellipsis expanded-details" style="vertical-align: middle;"><span>Wydawnictwo Uniwersytetu Jagiellońskiego</span></td>
                                <td data-label="Rok publikacji" class="overflow-ellipsis expanded-details" style="vertical-align: middle;"><span>2016</span></td>
                                <td data-label="Przedział stron" class="overflow-ellipsis expanded-details" style="vertical-align: middle;"><span>201-206</span></td>
                                <td data-label="Liczba ilustracji" class="overflow-ellipsis expanded-details" style="vertical-align: middle;"><span>3</span></td>
                                <td data-label="Słowa kluczowe" class="overflow-ellipsis expanded-details" style="vertical-align: middle;"><span>numizmatyka, archeologia</span></td>
                                <td data-label="ISBN" class="overflow-ellipsis expanded-details" style="vertical-align: middle;"><span>918-2-56319-989-4</span></td>
                                <td data-label="ISSN" class="overflow-ellipsis expanded-details" style="vertical-align: middle;"><span>0001-5237</span></td>
                                <td data-label="DOI" class="overflow-ellipsis expanded-details" style="vertical-align: middle;"><span style="word-break: break-all;">10.4463/00065129AAC.21.023.15252</span></td>
                                <td data-label="Link" class="overflow-ellipsis expanded-details" style="vertical-align: middle;"><a href="#">Wyświetl</a></td>
                                <td data-label="Plik" class="overflow-ellipsis expanded-details" style="vertical-align: middle;"><a href="#">Pobierz</a></td>
                            </tr>
                            <tr class="detail">
                                <td colspan="5">
                                    <div class="detail-container">
                                        <ul>
                                            <li><b>Tytuł tomu / czasopisma</b>&emsp;<span>Acta Geologica Polonica</span></li>
                                            <li><b>Redaktor tomu</b>&emsp;<span>Piotr Kowalski</span></li>
                                            <li><b>Tom</b>&emsp;<span>13</span></li>
                                            <li><b>Zeszyt</b>&emsp;<span>3</span></li>
                                            <li><b>Tytuł i numer serii</b>&emsp;<span>Studia z dziejów górnictwa 13</span></li>
                                            <li><b>Miejsce wydania</b>&emsp;<span>Warszawa</span></li>
                                            <li><b>Wydawnictwo</b>&emsp;<span>Wydawnictwo Uniwersytetu Jagiellońskiego</span></li>
                                            <li><b>Rok publikacji</b>&emsp;<span>2016</span></li>
                                            <li><b>Przedział stron</b>&emsp;<span>201-206</span></li>
                                            <li><b>Liczba ilustracji</b>&emsp;<span>3</span></li>
                                            <li><b>Słowa kluczowe</b>&emsp;<span>numizmatyka, archeologia</span></li>
                                            <li><b>ISBN</b>&emsp;<span>918-2-56319-989-4</span></li>
                                            <li><b>ISSN</b>&emsp;<span>0001-5237</span></li>
                                            <li><b>DOI</b>&emsp;<span>10.4463/00065129AAC.21.023.15252</span></li>
                                            <li><b>Link</b>&emsp;<a href="#">Wyświetl</a></li>
                                            <li><b>Plik</b>&emsp;<a href="#">Pobierz</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="is-chevron-cell">
                                    <a role="button">
                                        <span class="icon"><i class="mdi mdi-chevron-right mdi-24px"></i></span>
                                    </a>
                                </td>
                                <td data-label="Lp." style="vertical-align: middle;"><div class="td-center">2</div></td>
                                <td data-label="Autorzy" class="overflow-ellipsis" style="vertical-align: middle;"><span>Borys Paszkiewicz</span></td>
                                <td data-label="Tytuł" class="overflow-ellipsis" style="vertical-align: middle;"><span>Silesiorum moneta, czyli mennictwo śląskie w późnym średniowieczu (1419-1526) z katalogiem monet śląskich, kłodzkich i łużyckich z lat 1327-1526</span></td>
                                <td data-label="Rok wydania" style="vertical-align: middle;"><div class="td-center">2014</div></td>
                            </tr>
                            <tr>
                                <td class="is-chevron-cell">
                                    <a role="button">
                                        <span class="icon"><i class="mdi mdi-chevron-right mdi-24px"></i></span>
                                    </a>
                                </td>
                                <td data-label="Lp." style="vertical-align: middle;"><div class="td-center">3</div></td>
                                <td data-label="Autorzy" class="overflow-ellipsis" style="vertical-align: middle;"><span>Borys Paszkiewicz</span></td>
                                <td data-label="Tytuł" class="overflow-ellipsis" style="vertical-align: middle;"><span>Silesiorum moneta, czyli mennictwo śląskie w późnym średniowieczu (1419-1526) z katalogiem monet śląskich, kłodzkich i łużyckich z lat 1327-1526</span></td>
                                <td data-label="Rok wydania" style="vertical-align: middle;"><div class="td-center">2014</div></td>
                            </tr>
                            <tr>
                                <td class="is-chevron-cell">
                                    <a role="button">
                                        <span class="icon"><i class="mdi mdi-chevron-right mdi-24px"></i></span>
                                    </a>
                                </td>
                                <td data-label="Lp." style="vertical-align: middle;"><div class="td-center">4</div></td>
                                <td data-label="Autorzy" class="overflow-ellipsis" style="vertical-align: middle;"><span>Borys Paszkiewicz</span></td>
                                <td data-label="Tytuł" class="overflow-ellipsis" style="vertical-align: middle;"><span>Silesiorum moneta, czyli mennictwo śląskie w późnym średniowieczu (1419-1526) z katalogiem monet śląskich, kłodzkich i łużyckich z lat 1327-1526</span></td>
                                <td data-label="Rok wydania" style="vertical-align: middle;"><div class="td-center">2014</div></td>
                            </tr>
                            <tr>
                                <td class="is-chevron-cell">
                                    <a role="button">
                                        <span class="icon"><i class="mdi mdi-chevron-right mdi-24px"></i></span>
                                    </a>
                                </td>
                                <td data-label="Lp." style="vertical-align: middle;"><div class="td-center">5</div></td>
                                <td data-label="Autorzy" class="overflow-ellipsis" style="vertical-align: middle;"><span>Borys Paszkiewicz</span></td>
                                <td data-label="Tytuł" class="overflow-ellipsis" style="vertical-align: middle;"><span>Silesiorum moneta, czyli mennictwo śląskie w późnym średniowieczu (1419-1526) z katalogiem monet śląskich, kłodzkich i łużyckich z lat 1327-1526</span></td>
                                <td data-label="Rok wydania" style="vertical-align: middle;"><div class="td-center">2014</div></td>
                            </tr>
                            <!-- <tr class="is-empty">
                                <td colspan="7">
                                    <section class="section">
                                        <div class="content has-text-grey has-text-centered">
                                        <p><span class="icon is-large"><i class="mdi mdi-emoticon-sad mdi-48px"></i></span></p>
                                        <p>Nothing's there&hellip;</p>
                                        </div>
                                    </section>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
                <div class="notification">
                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                                <small>Strona 1 z 3</small>
                            </div>
                        </div>
                        <div class="level-right">
                            <div class="level-item">
                            <div class="buttons has-addons">
                                <button type="button" class="button is-active">1</button>
                                <button type="button" class="button">2</button>
                                <button type="button" class="button">3</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        Array.from(document.querySelectorAll('th.is-sortable, button.button')).forEach(function (el) {
            el.addEventListener('click', function (e) {
            e.preventDefault();
            console.log('jfdjf')
            alert('Sortowanie, filtrowanie i paginację trzeba dorobić.');
            });
        });
    </script>

</body>
</html>
