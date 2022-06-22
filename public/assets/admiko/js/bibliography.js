let shownHeaders = new Array();

$(function() {

    $(document).ready(function() {

        let arrayCounter = 0;
        let shownHeaderCounter = 0;

        const bibliographyTable = $('#bibliography').DataTable({

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
                    data: 18
                },
                {
                    data: 19,
                    render: function (data, type) {

                        if (data != 'brak') {
                            return '<a href="https://dspace.uni.lodz.pl/xmlui/bitstream/handle/11089/28198/Stanisław_Liszewski_51_73.pdf">Pobierz</a>';
                        }

                        return data;
                    }
                },
                {
                    data: 20
                },
                {
                    data: 21
                }
            ],
            columnDefs: [
                // {
                //     targets: [3, 4, 5, 6, 7, 8, 9, 11, 12, 14, 16, 17, 18, 20, 21],
                //     visible: false
                // },
                {
                    targets: [19],
                    searchable: false
                },
                {
                    targets: [0, 1, 2, 10, 13, 15, 19],
                    className: 'dt-head-center dt-body-center'
                }
            ],
            fixedHeader : true,
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

        $('#bibliography thead tr:eq(0) th').each(function () {

            const colId = $(this).index();

            if (bibliographyTable.column(colId).visible() === true) {
                shownHeaders[arrayCounter++] = shownHeaderCounter;
            }

            shownHeaderCounter++;
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
                .column(shownHeaders[$(this).parent().index()])
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
                shownHeaderCounter--;
            } else {
                $(this).html('<input type="hidden" />');
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

    }, 100);
}
