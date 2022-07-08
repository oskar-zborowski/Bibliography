let search = '';
let limit = 10;
let page = 1;
let sortBy = 'id';
let sortMethod = 'desc';

$.get('/api/v1/bibliography/index', {
    search: search,
    limit: limit,
    page: page,
    sortBy: sortBy,
    sortMethod: sortMethod
}).done(function(data) {

    const response = JSON.parse(data);

    if (response.length) {
        response.forEach(obj => {
            $('tbody').append('<tr id="base' + obj['id'] + '"><td class="is-chevron-cell base-column" onclick="showDetails(' + obj['id'] + ', true)"><a role="button"><span id="expanderButton' + obj['id'] + '" class="icon"><i class="mdi mdi-chevron-right mdi-24px"></i></span></a></td><td data-label="Nr" class="base-column td-center" onclick="showDetails(' + obj['id'] + ')"><div>' + obj['id'] + '</div></td><td data-label="Autorzy" class="overflow-ellipsis overflow-ellipsis-flag base-column" onclick="showDetails(' + obj['id'] + ')"><span>' + obj['authors'] + '</span></td><td data-label="Tytuł" class="overflow-ellipsis overflow-ellipsis-flag base-column" onclick="showDetails(' + obj['id'] + ')"><span>' + obj['title'] + '</span></td><td data-label="Rok wydania" class="base-column td-center" onclick="showDetails(' + obj['id'] + ')"><div class="td-center">' + obj['publishment_year'] + '</div></td><td data-label="Tytuł tomu / czasopisma" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span>' + obj['issue_title'] + '</span></td><td data-label="Redaktor tomu" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span>' + obj['volume_editor'] + '</span></td><td data-label="Tom" class="expanded-details hide-details hide-details-flag"><span>' + obj['volume'] + '</span></td><td data-label="Zeszyt" class="expanded-details hide-details hide-details-flag"><span>' + obj['notebook'] + '</span></td><td data-label="Tytuł i numer serii" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span>' + obj['series'] + '</span></td><td data-label="Miejsce wydania" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span>' + obj['publication_place'] + '</span></td><td data-label="Wydawnictwo" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span>' + obj['publishing_house'] + '</span></td><td data-label="Rok publikacji" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span>' + obj['publication_year'] + '</span></td><td data-label="Przedział stron" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span>' + obj['page_range'] + '</span></td><td data-label="Liczba ilustracji" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span>' + obj['illustrations_number'] + '</span></td><td data-label="Słowa kluczowe" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span>' + obj['keywords'] + '</span></td><td data-label="ISBN" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span class="elipsis-string-break">' + obj['isbn'] + '</span></td><td data-label="ISSN" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span class="elipsis-string-break">' + obj['issn'] + '</span></td><td data-label="DOI" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span class="elipsis-string-break">' + obj['doi'] + '</span></td><td data-label="Link" class="expanded-details hide-details hide-details-flag"><a href="' + obj['link'] + '" target="_blank">Wyświetl</a></td><td data-label="Plik" class="expanded-details hide-details hide-details-flag"><a href="#">Pobierz</a></td></tr><tr id="expander' + obj['id'] + '" class="detail hide-details"><td colspan="5"><div class="detail-container"><ul><li><span class="details">Tytuł tomu / czasopisma</span><span>' + obj['issue_title'] + '</span></li><li><span class="details">Redaktor tomu</span><span>' + obj['volume_editor'] + '</span></li><li><span class="details">Tom</span><span>' + obj['volume'] + '</span></li><li><span class="details">Zeszyt</span><span>' + obj['notebook'] + '</span></li><li><span class="details">Tytuł i numer serii</span><span>' + obj['series'] + '</span></li><li><span class="details">Miejsce wydania</span><span>' + obj['publication_place'] + '</span></li><li><span class="details">Wydawnictwo</span><span>' + obj['publishing_house'] + '</span></li><li><span class="details">Rok publikacji</span><span>' + obj['publication_year'] + '</span></li><li><span class="details">Przedział stron</span><span>' + obj['page_range'] + '</span></li><li><span class="details">Liczba ilustracji</span><span>' + obj['illustrations_number'] + '</span></li><li><span class="details">Słowa kluczowe</span><span>' + obj['keywords'] + '</span></li><li><span class="details">ISBN</span><span>' + obj['isbn'] + '</span></li><li><span class="details">ISSN</span><span>' + obj['issn'] + '</span></li><li><span class="details">DOI</span><span>' + obj['doi'] + '</span></li><li><span class="details">Link</span><a href="' + obj['link'] + '" target="_blank">Wyświetl</a></li><li><span class="details">Plik</span><a href="#">Pobierz</a></li></ul></div></td></tr>');
        });
    } else {
        $('tbody').append('<tr class="is-empty"><td colspan="5"><section class="section"><div class="content has-text-grey has-text-centered"><p><span class="icon is-large"><i class="mdi mdi-emoticon-sad mdi-48px"></i></span></p><p>Brak wyników wyszukiwania ...</p></div></section></td></tr>');
    }

    $('div.b-table.has-pagination.is-loading').removeClass('is-loading');
});

function showDetails(id, expander = false) {

    if (expander || window.innerWidth > 768) {

        if ($('span#expanderButton' + id).hasClass('is-expanded')) {

            $('span#expanderButton' + id).removeClass('is-expanded');
            $('tr#expander' + id).addClass('hide-details');
            $('tr#base' + id + ' > td.hide-details-flag').addClass('hide-details');

            if (window.innerWidth > 768) {
                $('tr#base' + id + ' > td.overflow-ellipsis-flag').addClass('overflow-ellipsis');
            }

        } else {

            $('span#expanderButton' + id).addClass('is-expanded');
            $('tr#expander' + id).removeClass('hide-details');
            $('tr#base' + id + ' > td.hide-details-flag').removeClass('hide-details');

            if (window.innerWidth > 768) {
                $('tr#base' + id + ' > td.overflow-ellipsis-flag').removeClass('overflow-ellipsis');
            }
        }
    }
}

function changeLengthMenu() {

    $('tbody').empty();
    $('div.b-table.has-pagination').addClass('is-loading');

    limit = $('select#length-menu-selectbox').val();

    $.get('/api/v1/bibliography/index', {
        search: search,
        limit: limit,
        page: page,
        sortBy: sortBy,
        sortMethod: sortMethod
    }).done(function(data) {
    
        const response = JSON.parse(data);
    
        if (response.length) {
            response.forEach(obj => {
                $('tbody').append('<tr id="base' + obj['id'] + '"><td class="is-chevron-cell base-column" onclick="showDetails(' + obj['id'] + ', true)"><a role="button"><span id="expanderButton' + obj['id'] + '" class="icon"><i class="mdi mdi-chevron-right mdi-24px"></i></span></a></td><td data-label="Nr" class="base-column td-center" onclick="showDetails(' + obj['id'] + ')"><div>' + obj['id'] + '</div></td><td data-label="Autorzy" class="overflow-ellipsis overflow-ellipsis-flag base-column" onclick="showDetails(' + obj['id'] + ')"><span>' + obj['authors'] + '</span></td><td data-label="Tytuł" class="overflow-ellipsis overflow-ellipsis-flag base-column" onclick="showDetails(' + obj['id'] + ')"><span>' + obj['title'] + '</span></td><td data-label="Rok wydania" class="base-column td-center" onclick="showDetails(' + obj['id'] + ')"><div class="td-center">' + obj['publishment_year'] + '</div></td><td data-label="Tytuł tomu / czasopisma" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span>' + obj['issue_title'] + '</span></td><td data-label="Redaktor tomu" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span>' + obj['volume_editor'] + '</span></td><td data-label="Tom" class="expanded-details hide-details hide-details-flag"><span>' + obj['volume'] + '</span></td><td data-label="Zeszyt" class="expanded-details hide-details hide-details-flag"><span>' + obj['notebook'] + '</span></td><td data-label="Tytuł i numer serii" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span>' + obj['series'] + '</span></td><td data-label="Miejsce wydania" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span>' + obj['publication_place'] + '</span></td><td data-label="Wydawnictwo" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span>' + obj['publishing_house'] + '</span></td><td data-label="Rok publikacji" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span>' + obj['publication_year'] + '</span></td><td data-label="Przedział stron" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span>' + obj['page_range'] + '</span></td><td data-label="Liczba ilustracji" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span>' + obj['illustrations_number'] + '</span></td><td data-label="Słowa kluczowe" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span>' + obj['keywords'] + '</span></td><td data-label="ISBN" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span class="elipsis-string-break">' + obj['isbn'] + '</span></td><td data-label="ISSN" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span class="elipsis-string-break">' + obj['issn'] + '</span></td><td data-label="DOI" class="overflow-ellipsis expanded-details hide-details hide-details-flag"><span class="elipsis-string-break">' + obj['doi'] + '</span></td><td data-label="Link" class="expanded-details hide-details hide-details-flag"><a href="' + obj['link'] + '" target="_blank">Wyświetl</a></td><td data-label="Plik" class="expanded-details hide-details hide-details-flag"><a href="#">Pobierz</a></td></tr><tr id="expander' + obj['id'] + '" class="detail hide-details"><td colspan="5"><div class="detail-container"><ul><li><span class="details">Tytuł tomu / czasopisma</span><span>' + obj['issue_title'] + '</span></li><li><span class="details">Redaktor tomu</span><span>' + obj['volume_editor'] + '</span></li><li><span class="details">Tom</span><span>' + obj['volume'] + '</span></li><li><span class="details">Zeszyt</span><span>' + obj['notebook'] + '</span></li><li><span class="details">Tytuł i numer serii</span><span>' + obj['series'] + '</span></li><li><span class="details">Miejsce wydania</span><span>' + obj['publication_place'] + '</span></li><li><span class="details">Wydawnictwo</span><span>' + obj['publishing_house'] + '</span></li><li><span class="details">Rok publikacji</span><span>' + obj['publication_year'] + '</span></li><li><span class="details">Przedział stron</span><span>' + obj['page_range'] + '</span></li><li><span class="details">Liczba ilustracji</span><span>' + obj['illustrations_number'] + '</span></li><li><span class="details">Słowa kluczowe</span><span>' + obj['keywords'] + '</span></li><li><span class="details">ISBN</span><span>' + obj['isbn'] + '</span></li><li><span class="details">ISSN</span><span>' + obj['issn'] + '</span></li><li><span class="details">DOI</span><span>' + obj['doi'] + '</span></li><li><span class="details">Link</span><a href="' + obj['link'] + '" target="_blank">Wyświetl</a></li><li><span class="details">Plik</span><a href="#">Pobierz</a></li></ul></div></td></tr>');
            });
        } else {
            $('tbody').append('<tr class="is-empty"><td colspan="5"><section class="section"><div class="content has-text-grey has-text-centered"><p><span class="icon is-large"><i class="mdi mdi-emoticon-sad mdi-48px"></i></span></p><p>Brak wyników wyszukiwania ...</p></div></section></td></tr>');
        }
    
        $('div.b-table.has-pagination.is-loading').removeClass('is-loading');
    });
}
