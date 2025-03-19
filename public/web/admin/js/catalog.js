$J(function () {
    Catalogue.init();
});

var Catalogue = {
    data: [],
    tabs: [],
    init: function () {
        console.log(this.data);
        this.setupTabs();
    },

    setupTabs: function () {
        Catalogue.data.filter(cata => { if (cata.parent_id == -1) this.tabs.push(cata) });

        this.tabs.forEach(e => {
            $J('.catalog_tabs').append(
                $J('<div>').addClass('tab')
                    .data('tab-id', e.id)
                    .text(`${e.caption} (${e.id})`)
                    .on('click', this.tabClicked)
            );
        });
    },
    tabClicked: function (e) {
        $J('.tab.selected').removeClass('selected');
        $J(e.target).addClass('selected');
        let page = Catalogue.data.find(cata => cata.parent_id == $J(e.target).data('tab-id')) || Catalogue.data.find(cata => cata.id == $J(e.target).data('tab-id'));
        Catalogue.setPage(page);
        Catalogue.setMenu(page.parent_id);
    },

    setPage: function (page) {
        $J('.catalog_header .icon').css('background-image', `url(../gordon/c_images/catalogue/icon_${page.icon_image}.png)`);
        $J('.catalog_header .headline').css('background-image', `url(../gordon/c_images/catalogue/${page.page_headline}.png)`);
        $J('.catalog_header .caption').text(`${page.caption} (${page.id})`);
        $J('.catalog_header .description').text(`${page.page_text1}`);
    },

    setMenu: function (id) {
        $J('ul.catalog_menu').html('');
        let pages = Catalogue.data.findAll(cata => cata.parent_id == id);
        pages.forEach(p => {
            $J('ul.catalog_menu').append(
                $J('<li>').text(p.caption).prepend($J('<img>').attr('src', `../gordon/c_images/catalogue/icon_${p.icon_image}.png`))
            )
        });
    }
}
