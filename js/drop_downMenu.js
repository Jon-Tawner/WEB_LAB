for(const e in Anchors){let a=$(`#${e}`),n=$("<div></div>"),t=$("<div></div>");t.addClass("DDmenuUl"),n.addClass("DDmenu"),n.append(t),a.append(n);for(let a=1;a<Object.keys(Anchors[e]).length;++a){let n=$("<li></li>"),d=$("<a></a>");d.text(Anchors[e][a].text),d.attr("href",Anchors[e].docName+"#"+Anchors[e][a].anchName),d.attr("class","DDmenu_el"),n.append(d),t.append(n)}}