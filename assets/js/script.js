const doc = document;

// $('#meuModal').on('shown.bs.modal', function () {
//     $('#meuInput').trigger('focus')
// })

// CLOSE-OPEN MENU
const hamburger = doc.getElementById('hamburger');
hamburger.addEventListener('click', function(e) {
    const mainMenu = doc.getElementById('main-menu');
    const mainContent = doc.getElementsByClassName('main-content')[0];
    
    if (mainMenu.classList == 'opened-main-menu') {
        mainMenu.classList.remove('opened-main-menu');
        mainContent.classList.remove('open-menu-for-content');
        mainMenu.classList.add('closed-main-menu');
        mainContent.classList.add('open-menu-for-content-2');
    } else {
        mainMenu.classList.remove('closed-main-menu');
        mainContent.classList.remove('open-menu-for-content-2');
        mainMenu.classList.add('opened-main-menu');
        mainContent.classList.add('open-menu-for-content');
    }
})

let allOptionsSingleNote = doc.getElementsByClassName('all-options-single-note');
for (let i = 0; i <= allOptionsSingleNote.length; i++) {
    allOptionsSingleNote[i].addEventListener('click', function(e) {
        let optionsSingleNote = doc.getElementsByClassName('options-single-note');

        let allClass = allOptionsSingleNote[i].className.split(" ");

        if (allClass.length == 1) {
            allOptionsSingleNote[i].classList.add('visible-container-all-options');
        } else {
            allOptionsSingleNote[i].classList.remove('visible-container-all-options');
        }        
    });
}


//RESET FORM NOTE AND CATEGORY AFTER SUBMIT
// window.addEventListener('load', function(e) {
//     doc.getElementById('form-add-note').reset();
//     console.log("a");
// })