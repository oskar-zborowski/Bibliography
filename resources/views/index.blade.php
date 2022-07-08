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
                    <label for="length-menu-selectbox" class="label selectbox-label">Pokaż</label>
                </div>
                <div class="field-body">
                    <div class="field is-narrow">
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select id="length-menu-selectbox" onchange="changeLengthMenu()">
                                    <option>10</option>
                                    <option>25</option>
                                    <option>50</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field-label is-normal after-select">
                    <label for="length-menu-selectbox" class="label selectbox-label">pozycji</label>
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

            <div class="b-table has-pagination is-loading">

                <div class="table-wrapper has-mobile-cards">

                    <table class="table is-fullwidth is-striped is-hoverable">

                        <thead>
                            <tr>
                                <th class="is-chevron-cell"></th>
                                <th class="is-current-sort is-sortable" style="width: 70px;">
                                    <div class="th-wrap">
                                        Nr<span class="icon is-small"><i class="mdi mdi-arrow-down"></i></span>
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

                        <tbody></tbody>

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

    <!-- Scripts -->

    <script src="{{ asset('assets/admiko/vendors/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/admiko/js/bibliography.js') }}"></script>

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
