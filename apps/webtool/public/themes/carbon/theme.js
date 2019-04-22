/**
 * theme.js
 * 
 * Script para inicializações 
 */

// Obtem a URL base do tema
var baseURL = manager.loader.getBase('theme.js');
console.log(manager.version + ' - Theme in: ' + baseURL);

// Define o elemento default para o conteudo obtido via Ajax-GET 
manager.contentElement = 'centerPane';

// Define o nome da aplicação, caso não esteja na URL
manager.defaultApp = 'webtool';

jQuery(function ($) {
    // Remove a mensagem de loading
    // $("#loader").hide();
    console.log('theme.js');
    if ( $( "#sideMenu" ).length ) {
        var SideMenu = CarbonComponents.SideNav;
        const sideMenuElement = document.getElementById('sideMenu');
        const sideMenuInstance = SideMenu.create(sideMenuElement);
        sideMenuInstance.changeState(SideMenu.state.EXPANDED);
        console.log(sideMenuInstance.isNavExpanded() ? 'expanded' : 'collapsed');

        manager.registerEvent({
            id: 'sideMenuToogle',
            event: 'click',
            handler: function () {
                console.log('toogle clicked');
                sideMenuInstance.changeState(sideMenuInstance.isNavExpanded() ? SideMenu.state.COLLAPSED : SideMenu.state.EXPANDED);
                $(sideMenuElement).toggleClass('bx--side-nav--expanded ', sideMenuInstance.isNavExpanded());
                $('#centerPane').toggleClass('bx--content__side-nav--expanded', sideMenuInstance.isNavExpanded());
                if ($('#commonLayout')) {
                    $('#commonLayout').layout("resize");
                }
            }
        })
    }
});
