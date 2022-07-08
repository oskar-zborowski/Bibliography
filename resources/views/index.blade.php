<!DOCTYPE html>

<!--
        Authors:
    Oskar Zborowski
   Krystian Borowicz
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

    <link rel="Shortcut icon" href="{{ asset('assets/admiko/images/icon.png') }}">
    <title>{{ env('APP_NAME') }}</title>

</head>

<body>

    <section class="hero is-light is-main parallax">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    <span class="capitalic">B</span>IBLIOGRAFIA <span class="capitalic">B</span>ORYSA <span class="capitalic">P</span>ASZKIEWICZA
                </h1>
            </div>
        </div>
    </section>

    <section class="section">

        <div class="container">

            <div class="field is-horizontal length-menu">
                <div class="field-label is-normal before-select">
                    <label class="label">Pokaż</label>
                </div>
                <div class="field-body">
                    <div class="field is-narrow">
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select>
                                    <option>25</option>
                                    <option>50</option>
                                    <option>100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field-label is-normal after-select">
                    <label class="label">pozycji</label>
                </div>
            </div>

            <div class="field has-addons search">
                <div class="control">
                    <input class="input" type="text" placeholder="np. mennictwo">
                </div>
                <div class="control">
                    <a class="button is-dark">Szukaj</a>
                </div>
            </div>

            <div style="clear: both;"></div>

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
                                        Tytuł
                                    </div>
                                </th>
                                <th class="is-sortable">
                                    <div class="th-wrap" style="white-space: nowrap;">
                                        Rok wydania
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
                                <td data-label="Lp." class="base-column"><div>1</div></td>
                                <td data-label="Autorzy" class="overflow-ellipsis base-column"><span>Borys Paszkiewicz, Zofia Nowak</span></td>
                                <td data-label="Tytuł" class="overflow-ellipsis base-column"><span>Silesiorum moneta, czyli mennictwo śląskie w późnym średniowieczu (1419-1526) z katalogiem monet śląskich, kłodzkich i łużyckich z lat 1327-1526</span></td>
                                <td data-label="Rok wydania" class="base-column"><div class="td-center">2012</div></td>
                                <td data-label="Tytuł tomu / czasopisma" class="overflow-ellipsis expanded-details"><span>Acta Geologica Polonica</span></td>
                                <td data-label="Redaktor tomu" class="overflow-ellipsis expanded-details"><span>Piotr Kowalski</span></td>
                                <td data-label="Tom" class="expanded-details"><span>13</span></td>
                                <td data-label="Zeszyt" class="expanded-details"><span>3</span></td>
                                <td data-label="Tytuł i numer serii" class="overflow-ellipsis expanded-details"><span>Studia z dziejów górnictwa 13</span></td>
                                <td data-label="Miejsce wydania" class="overflow-ellipsis expanded-details"><span>Warszawa</span></td>
                                <td data-label="Wydawnictwo" class="overflow-ellipsis expanded-details"><span>Wydawnictwo Uniwersytetu Jagiellońskiego</span></td>
                                <td data-label="Rok publikacji" class="overflow-ellipsis expanded-details"><span>2016</span></td>
                                <td data-label="Przedział stron" class="overflow-ellipsis expanded-details"><span>201-206</span></td>
                                <td data-label="Liczba ilustracji" class="overflow-ellipsis expanded-details"><span>3</span></td>
                                <td data-label="Słowa kluczowe" class="overflow-ellipsis expanded-details"><span>numizmatyka, archeologia</span></td>
                                <td data-label="ISBN" class="overflow-ellipsis expanded-details"><span class="elipsis-string-break">918-2-56319-989-4</span></td>
                                <td data-label="ISSN" class="overflow-ellipsis expanded-details"><span class="elipsis-string-break">0001-5237</span></td>
                                <td data-label="DOI" class="overflow-ellipsis expanded-details"><span class="elipsis-string-break">10.4463/00065129AAC.21.023.15252</span></td>
                                <td data-label="Link" class="expanded-details"><a href="#">Wyświetl</a></td>
                                <td data-label="Plik" class="expanded-details"><a href="#">Pobierz</a></td>
                            </tr>

                            <tr class="detail">
                                <td colspan="5">
                                    <div class="detail-container">
                                        <ul>
                                            <li><span class="details">Tytuł tomu / czasopisma</span><span>Acta Geologica Polonica</span></li>
                                            <li><span class="details">Redaktor tomu</span><span>Piotr Kowalski</span></li>
                                            <li><span class="details">Tom</span><span>13</span></li>
                                            <li><span class="details">Zeszyt</span><span>3</span></li>
                                            <li><span class="details">Tytuł i numer serii</span><span>Studia z dziejów górnictwa 13</span></li>
                                            <li><span class="details">Miejsce wydania</span><span>Warszawa</span></li>
                                            <li><span class="details">Wydawnictwo</span><span>Wydawnictwo Uniwersytetu Jagiellońskiego</span></li>
                                            <li><span class="details">Rok publikacji</span><span>2016</span></li>
                                            <li><span class="details">Przedział stron</span><span>201-206</span></li>
                                            <li><span class="details">Liczba ilustracji</span><span>3</span></li>
                                            <li><span class="details">Słowa kluczowe</span><span>numizmatyka, archeologia</span></li>
                                            <li><span class="details">ISBN</span><span>918-2-56319-989-4</span></li>
                                            <li><span class="details">ISSN</span><span>0001-5237</span></li>
                                            <li><span class="details">DOI</span><span>10.4463/00065129AAC.21.023.15252</span></li>
                                            <li><span class="details">Link</span><a href="#">Wyświetl</a></li>
                                            <li><span class="details">Plik</span><a href="#">Pobierz</a></li>
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
                                <td data-label="Lp." class="base-column"><div>1</div></td>
                                <td data-label="Autorzy" class="overflow-ellipsis base-column"><span>Borys Paszkiewicz, Zofia Nowak</span></td>
                                <td data-label="Tytuł" class="overflow-ellipsis base-column"><span>Silesiorum moneta, czyli mennictwo śląskie w późnym średniowieczu (1419-1526) z katalogiem monet śląskich, kłodzkich i łużyckich z lat 1327-1526</span></td>
                                <td data-label="Rok wydania" class="base-column"><div class="td-center">2012</div></td>
                            </tr>

                            <!-- <tr class="is-empty">
                                <td colspan="5">
                                    <section class="section">
                                        <div class="content has-text-grey has-text-centered">
                                            <p><span class="icon is-large"><i class="mdi mdi-emoticon-sad mdi-48px"></i></span></p>
                                            <p>Brak wyników wyszukiwania ...</p>
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
                                <small>Strona 2 z 5</small>
                            </div>
                        </div>
                        <div class="level-right paginator">
                            <div class="level-item">
                                <div class="buttons has-addons">
                                    <button type="button" class="button">Poprzednia</button>
                                    <button type="button" class="button">Następna</button>
                                </div>
                            </div>
                        </div>
                        <div class="level-right">
                            <div class="level-item">
                                <small>217 wyników</small>
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
