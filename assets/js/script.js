// CLOSE-OPEN MENU
const hamburger = window.document.getElementById('hamburger');
hamburger.addEventListener('click', function(e) {
    const mainMenu = window.document.getElementById('main-menu');
    
    if (mainMenu.classList == 'opened-main-menu') {
        mainMenu.classList.remove('opened-main-menu');
        mainMenu.classList.add('closed-main-menu');
    } else {
        mainMenu.classList.remove('closed-main-menu');
        mainMenu.classList.add('opened-main-menu');
    }
})
