$(function() {

    $(document).ready(function() {

        const bibliographyTable = $('#bibliography').DataTable({
            // autoWidth: false,
            columns: [
                {
                    data: 0
                },
                {
                    data: 1
                },
                {
                    data: 2
                },
                {
                    data: 3
                },
                {
                    data: 4
                },
                {
                    data: 5
                },
                {
                    data: 6
                },
                {
                    data: 7
                },
                {
                    data: 8
                },
                {
                    data: 9
                },
                {
                    data: 10
                },
                {
                    data: 11
                },
                {
                    data: 12
                },
                {
                    data: 13
                },
                {
                    data: 14
                },
                {
                    data: 15
                },
                {
                    data: 16
                },
                {
                    data: 17
                },
                {
                    data: 18,
                    render: function (data, type) {

                        if (data != 'nie podano') {
                            return '<a href="' + data + '">Kliknij</a>';
                        }

                        return data;
                    }
                },
                {
                    data: 19
                },
                {
                    data: 20,
                    render: function (data, type) {

                        if (data != 'brak') {
                            return '<a href="' + data + '">Pobierz</a>';
                        }

                        return data;
                    }
                }
            ],
            columnDefs: [
                {
                    targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
                    className: 'dt-head-center dt-body-center'
                },
                {
                    targets: [0],
                    visible: false
                },
                {
                    targets: [19],
                    searchable: false
                }
            ],
            fixedColumns: true,
            fixedHeader: true,
            language: {
                // aria: {
                //     sortAscending: ": sortowanie rosnąco",
                //     sortDescending: ": sortowanie malejąco"
                // },
                // decimal: ",",
                // emptyTable: "Nie znaleziono wyników",
                // info: "Strona _PAGE_ z _PAGES_",
                // infoEmpty: "Strona 0 z 0",
                // infoFiltered: "(przeszukano wśród _MAX_ pozycji)",
                // infoPostFix: "",
                // lengthMenu: "Wyświetlanych wyników: _MENU_",
                // loadingRecords: "Ładowanie ...",
                // paginate: {
                //     first: "Pierwsza",
                //     last: "Ostatnia",
                //     next: "Następna",
                //     previous: "Poprzednia"
                // },
                // processing: "",
                // search: "Szukaj:",
                // thousands: ".",
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/pl.json'
            },
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            order: [[0, 'desc']],
            responsive: true
            // stateSave: true
        });

        windowResize()

        $('#bibliography tbody').on('mouseenter', 'td', function () {
            const colId = bibliographyTable.cell(this).index().column;
            $(bibliographyTable.cells().nodes()).removeClass('highlight');
            $(bibliographyTable.cells().nodes()).removeClass('centerHighlight');
            $(bibliographyTable.column(colId).nodes()).addClass('highlight');
            $(this).addClass('centerHighlight');
        });

        $('#bibliography thead').on('mouseenter', 'th', function () {
            const colId = bibliographyTable.column(this).index();
            $(bibliographyTable.cells().nodes()).removeClass('highlight');
            $(bibliographyTable.cells().nodes()).removeClass('centerHighlight');
            $(bibliographyTable.column(colId).nodes()).addClass('highlight');
        });

        $('#bibliography').on('mouseout', 'tr', function () {
            const colId = $('#bibliography').dataTable().fnSettings().aaSorting[0][0];
            $(bibliographyTable.cells().nodes()).removeClass('highlight');
            $(bibliographyTable.cells().nodes()).removeClass('centerHighlight');
            $(bibliographyTable.column(colId).nodes()).addClass('highlight');
        });

        $('#bibliography thead').on('keyup', '.column-search', function () {
            bibliographyTable
                .column($(this).parent().index()+1)
                .search(this.value)
                .draw();
        });

        $(window).resize(function() {
            windowResize();
        });

        $(window).on('orientationchange', function(event) {
            windowResize();
        });
    });
});

function windowResize() {

    let shownHeaderCounter = 0;

    setTimeout(function () {

        $('#bibliography thead tr:eq(1) th').each(function () {
            shownHeaderCounter++;
        });

        $('#bibliography thead tr:eq(1) th.dtr-hidden').each(function () {
            shownHeaderCounter--;
        });

        $('#bibliography thead tr:eq(0) th').each(function () {
            if (shownHeaderCounter > 0) {
                $(this).html('<input type="text" class="column-search" />');
                $(this).removeClass('dtr-hidden');
                $(this).css({"width": "", "display": ""});
                shownHeaderCounter--;
            } else {
                $(this).addClass('dtr-hidden');
                $(this).css({"width": "0px", "display": "none"});
            }
        });

        $('#bibliography thead tr:eq(1) th').each(function () {

            const colId = $(this).index();
            const sortedId = $('#bibliography').dataTable().fnSettings().aaSorting[0][0];

            if (colId == sortedId) {
                $(this).trigger('click');
                $(this).trigger('click');
            }
        });

    }, 300);
}
