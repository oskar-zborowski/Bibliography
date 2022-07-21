let search = '';
let limit = 10;
let page = 1;
let sortBy = 'id';
let sortMethod = 'desc';

function sendRequest() {

    $('div.b-table.has-pagination').addClass('is-loading');

    $.get('/api/v1/bibliography/index', {
        search: search,
        limit: limit,
        page: page,
        sortBy: sortBy,
        sortMethod: sortMethod
    }).done(function(data) {

        $('tbody').empty();
    
        const response = JSON.parse(data);

        if (response['data'].length) {

            let counter = 0;

            response['data'].forEach(obj => {

                let appendedData;

                if (counter % 2 == 0) {
                    appendedData += '<tr id="base' + obj['id'] + '" class="highlighted-color">';
                } else {
                    appendedData += '<tr id="base' + obj['id'] + '">';
                }

                appendedData += '<td class="is-chevron-cell base-column" onclick="showDetails(' + obj['id'] + ', true)"><a role="button"><span id="expanderButton' + obj['id'] + '" class="icon"><i class="mdi mdi-chevron-right mdi-24px"></i></span></a></td><td data-label="Nr" class="base-column td-center" onclick="showDetails(' + obj['id'] + ')"><div>' + obj['id'] + '</div></td><td data-label="Autorzy" class="overflow-ellipsis overflow-ellipsis-flag base-column td-center" onclick="showDetails(' + obj['id'] + ')"><span>' + obj['authors'] + '</span></td><td data-label="Tytuł" class="overflow-ellipsis overflow-ellipsis-flag base-column td-center" onclick="showDetails(' + obj['id'] + ')"><span>' + obj['title'] + '</span></td><td data-label="Rok wydania" class="base-column td-center" onclick="showDetails(' + obj['id'] + ')"><div class="td-center">' + obj['publishment_year'] + '</div></td>';

                if (obj['issue_title'] != '') {
                    appendedData += '<td data-label="Tytuł tomu / czasopisma" class="expanded-details hide-details hide-details-flag" onclick="showDetails(' + obj['id'] + ')"><span>' + obj['issue_title'] + '</span></td>';
                }

                if (obj['volume_editor'] != '') {
                    appendedData += '<td data-label="Redaktor tomu" class="expanded-details hide-details hide-details-flag" onclick="showDetails(' + obj['id'] + ')"><span>' + obj['volume_editor'] + '</span></td>';
                }

                if (obj['volume'] != '') {
                    appendedData += '<td data-label="Tom" class="expanded-details hide-details hide-details-flag" onclick="showDetails(' + obj['id'] + ')"><span>' + obj['volume'] + '</span></td>';
                }

                if (obj['notebook'] != '') {
                    appendedData += '<td data-label="Zeszyt" class="expanded-details hide-details hide-details-flag" onclick="showDetails(' + obj['id'] + ')"><span>' + obj['notebook'] + '</span></td>';
                }

                if (obj['series'] != '') {
                    appendedData += '<td data-label="Tytuł i numer serii" class="expanded-details hide-details hide-details-flag" onclick="showDetails(' + obj['id'] + ')"><span>' + obj['series'] + '</span></td>';
                }

                if (obj['publication_place'] != '') {
                    appendedData += '<td data-label="Miejsce wydania" class="expanded-details hide-details hide-details-flag" onclick="showDetails(' + obj['id'] + ')"><span>' + obj['publication_place'] + '</span></td>';
                }

                if (obj['publishing_house'] != '') {
                    appendedData += '<td data-label="Wydawnictwo" class="expanded-details hide-details hide-details-flag" onclick="showDetails(' + obj['id'] + ')"><span>' + obj['publishing_house'] + '</span></td>';
                }

                if (obj['publication_year'] != '') {
                    appendedData += '<td data-label="Rok publikacji" class="expanded-details hide-details hide-details-flag" onclick="showDetails(' + obj['id'] + ')"><span>' + obj['publication_year'] + '</span></td>';
                }

                if (obj['page_range'] != '') {
                    appendedData += '<td data-label="Przedział stron" class="expanded-details hide-details hide-details-flag" onclick="showDetails(' + obj['id'] + ')"><span>' + obj['page_range'] + '</span></td>';
                }

                if (obj['illustrations_number'] != '') {
                    appendedData += '<td data-label="Liczba ilustracji" class="expanded-details hide-details hide-details-flag" onclick="showDetails(' + obj['id'] + ')"><span>' + obj['illustrations_number'] + '</span></td>';
                }

                if (obj['keywords'] != '') {
                    appendedData += '<td data-label="Słowa kluczowe" class="expanded-details hide-details hide-details-flag" onclick="showDetails(' + obj['id'] + ')"><span>' + obj['keywords'] + '</span></td>';
                }

                if (obj['isbn'] != '') {
                    appendedData += '<td data-label="ISBN" class="expanded-details hide-details hide-details-flag" onclick="showDetails(' + obj['id'] + ')"><span class="elipsis-string-break">' + obj['isbn'] + '</span></td>';
                }

                if (obj['issn'] != '') {
                    appendedData += '<td data-label="ISSN" class="expanded-details hide-details hide-details-flag" onclick="showDetails(' + obj['id'] + ')"><span class="elipsis-string-break">' + obj['issn'] + '</span></td>';
                }

                if (obj['doi'] != '') {
                    appendedData += '<td data-label="DOI" class="expanded-details hide-details hide-details-flag" onclick="showDetails(' + obj['id'] + ')"><span class="elipsis-string-break">' + obj['doi'] + '</span></td>';
                }

                if (obj['link'] != '') {
                    appendedData += '<td data-label="Link" class="expanded-details hide-details hide-details-flag" onclick="showDetails(' + obj['id'] + ')"><a href="' + obj['link'] + '" target="_blank">Wyświetl</a></td>';
                }

                if (obj['file'] != '') {
                    appendedData += '<td data-label="Plik" class="expanded-details hide-details hide-details-flag" onclick="showDetails(' + obj['id'] + ')"><a href="' + obj['file'] + '" target="_blank">Pobierz</a></td>';
                }

                appendedData += '</tr><tr id="expander' + obj['id'] + '" class="detail hide-details"><td colspan="5"><div class="detail-container"><ul>';

                if (obj['issue_title'] != '') {
                    appendedData += '<li><div class="right-align"><span class="details">Tytuł tomu / czasopisma</span></div><span>' + obj['issue_title'] + '</span></li>';
                }

                if (obj['volume_editor'] != '') {
                    appendedData += '<li><div class="right-align"><span class="details">Redaktor tomu</span></div><span>' + obj['volume_editor'] + '</span></li>';
                }

                if (obj['volume'] != '') {
                    appendedData += '<li><div class="right-align"><span class="details">Tom</span></div><span>' + obj['volume'] + '</span></li>';
                }

                if (obj['notebook'] != '') {
                    appendedData += '<li><div class="right-align"><span class="details">Zeszyt</span></div><span>' + obj['notebook'] + '</span></li>';
                }

                if (obj['series'] != '') {
                    appendedData += '<li><div class="right-align"><span class="details">Tytuł i numer serii</span></div><span>' + obj['series'] + '</span></li>';
                }

                if (obj['publication_place'] != '') {
                    appendedData += '<li><div class="right-align"><span class="details">Miejsce wydania</span></div><span>' + obj['publication_place'] + '</span></li>';
                }

                if (obj['publishing_house'] != '') {
                    appendedData += '<li><div class="right-align"><span class="details">Wydawnictwo</span></div><span>' + obj['publishing_house'] + '</span></li>';
                }

                if (obj['publication_year'] != '') {
                    appendedData += '<li><div class="right-align"><span class="details">Rok publikacji</span></div><span>' + obj['publication_year'] + '</span></li>';
                }

                if (obj['page_range'] != '') {
                    appendedData += '<li><div class="right-align"><span class="details">Przedział stron</span></div><span>' + obj['page_range'] + '</span></li>';
                }

                if (obj['illustrations_number'] != '') {
                    appendedData += '<li><div class="right-align"><span class="details">Liczba ilustracji</span></div><span>' + obj['illustrations_number'] + '</span></li>';
                }

                if (obj['keywords'] != '') {
                    appendedData += '<li><div class="right-align"><span class="details">Słowa kluczowe</span></div><span>' + obj['keywords'] + '</span></li>';
                }

                if (obj['isbn'] != '') {
                    appendedData += '<li><div class="right-align"><span class="details">ISBN</span></div><span>' + obj['isbn'] + '</span></li>';
                }

                if (obj['issn'] != '') {
                    appendedData += '<li><div class="right-align"><span class="details">ISSN</span></div><span>' + obj['issn'] + '</span></li>';
                }

                if (obj['doi'] != '') {
                    appendedData += '<li><div class="right-align"><span class="details">DOI</span></div><span>' + obj['doi'] + '</span></li>';
                }

                if (obj['link'] != '') {
                    appendedData += '<li><div class="right-align"><span class="details">Link</span></div><a href="' + obj['link'] + '" target="_blank">Wyświetl</a></li>';
                }

                if (obj['file'] != '') {
                    appendedData += '<li><div class="right-align"><span class="details">Plik</span></div><a href="' + obj['file'] + '" target="_blank">Pobierz</a></li>';
                }

                appendedData += '</ul></div></td></tr>';

                $('tbody').append(appendedData);

                counter++;
            });

            $('#page-display').text('Strona ' + page + ' z ' + response['metadata']['bibliographyPagesNumer']);
            $('#result-counter').text(response['metadata']['bibliographyRecordsNumer'] + ' wyników');

        } else {
            $('tbody').append('<tr class="is-empty"><td colspan="5"><section class="section"><div class="content has-text-grey has-text-centered"><p><span class="icon is-large"><i class="mdi mdi-emoticon-sad mdi-48px"></i></span></p><p>Brak wyników wyszukiwania ...</p></div></section></td></tr>');
            $('#page-display').text('Strona 0 z 0');
            $('#result-counter').text('0 wyników');
        }

        if (page == 1 || response['metadata']['bibliographyRecordsNumer'] == 0) {
            $('#previous-page').prop('disabled', true);
        } else {
            $('#previous-page').prop('disabled', false);
        }

        if (page == response['metadata']['bibliographyPagesNumer'] || response['metadata']['bibliographyRecordsNumer'] == 0) {
            $('#next-page').prop('disabled', true);
        } else {
            $('#next-page').prop('disabled', false);
        }

        $('div.b-table.has-pagination.is-loading').removeClass('is-loading');
    });
}

function showDetails(id, expander = false) {

    if ($('span#expanderButton' + id).hasClass('is-expanded')) {

        $('span#expanderButton' + id).removeClass('is-expanded');
        $('tr#expander' + id).addClass('hide-details');
        $('tr#base' + id + ' > td.hide-details-flag').addClass('hide-details');

        $('tr#base' + id + ' > td.overflow-ellipsis-flag').addClass('overflow-ellipsis');

    } else {

        $('span#expanderButton' + id).addClass('is-expanded');
        $('tr#expander' + id).removeClass('hide-details');
        $('tr#base' + id + ' > td.hide-details-flag').removeClass('hide-details');

        $('tr#base' + id + ' > td.overflow-ellipsis-flag').removeClass('overflow-ellipsis');
    }
}

function changeLengthMenu() {
    page = 1;
    limit = $('select#length-menu-selectbox').val();
    sendRequest();
}

function sort(sortByField) {

    page = 1;
    sortBy = sortByField;

    if ($('th#sort-' + sortBy + ' > div > span > i').hasClass('mdi-arrow-up')) {
        sortMethod = 'desc';
        $('table > thead > tr > th > div > span').remove();
        $('table > thead > tr > th').removeClass('is-current-sort');
        $('th#sort-' + sortBy + ' > div').append('<span class="icon is-small"><i class="mdi mdi-arrow-down"></i></span>');
        $('th#sort-' + sortBy).addClass('is-current-sort');
    } else {
        sortMethod = 'asc';
        $('table > thead > tr > th > div > span').remove();
        $('table > thead > tr > th').removeClass('is-current-sort');
        $('th#sort-' + sortBy + ' > div').append('<span class="icon is-small"><i class="mdi mdi-arrow-up"></i></span>');
        $('th#sort-' + sortBy).addClass('is-current-sort');
    }

    sendRequest();
}

function paginate(paginate) {

    if (paginate == 'previous') {

        page = page - 1;

        if (page < 1) {
            page = 1;
        }

    } else {
        page = page + 1;
    }

    sendRequest();
}

function searchDB() {

    page = 1;
    const lastSearch = search;

    search = $('input#search-input').val();
    search = search.trim();
    $('input#search-input').val('');

    if (search != '' || search != lastSearch) {
        sendRequest();
    }
}

sendRequest();
