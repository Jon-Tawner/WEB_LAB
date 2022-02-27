var anchArts = $('.anchorArt');
let ulList = $('.list');

anchArts.each(function(i) {
    let anchEl = $('<li></li>');
    let anchor = $('<a></a>');

    anchor.text(anchArts[i].text());
    anchor.attr('href', '#' + anchArts[i].getAttribute('name'));
    anchEl.addClass('element');

    ulList.eq(i).append(anchEl);
    let listEl = $('.element:last-child');
    listEl.append(anchor);
})

