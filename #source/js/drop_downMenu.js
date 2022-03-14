
for (const IdLi in Anchors) {
    let parent = $(`#${IdLi}`)
    let bodyMenu = $('<div></div>')
    let anchorUl = $('<div></div>');

    anchorUl.addClass('DDmenuUl');
    bodyMenu.addClass('DDmenu');
    bodyMenu.append(anchorUl);
    parent.append(bodyMenu);
    for (let i = 1; i < Object.keys(Anchors[IdLi]).length; ++i) {
        let anchorLi = $('<li></li>');
        let anchor = $('<a></a>');
        anchor.text(Anchors[IdLi][i]["text"]);
        anchor.attr('href', '/website/' + Anchors[IdLi]["docName"] + '#'
            + Anchors[IdLi][i]["anchName"]);
        anchor.attr('class', 'DDmenu_el');
        anchorLi.append(anchor);
        anchorUl.append(anchorLi);
    }
}