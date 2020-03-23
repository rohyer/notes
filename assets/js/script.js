const doc = document;

// $('#meuModal').on('shown.bs.modal', function () {
//     $('#meuInput').trigger('focus')
// })

// FUNÇÃO PARA ABRIR E FECHAR MENU
function closeOpenMenu() {
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
    });
}
closeOpenMenu();

// FUNÇÃO PARA DELETAR NOTA
function deleteNote() {
    const note = doc.getElementsByClassName('delete-note');

    for (let i = 0; i < note.length; i++) {
        note[i].addEventListener("click", function() {
            let attributeNote = note[i].getAttribute('data-id');
            let yesDeleteNote = doc.getElementById('yes-delete-note');
            yesDeleteNote.href = "./src/model/processing/delete-note.php?idnote=" + attributeNote;
        });
    }
}
deleteNote();
    


//RESET FORM NOTE AND CATEGORY AFTER SUBMIT
// window.addEventListener('load', function(e) {
//     doc.getElementById('form-add-note').reset();
//     console.log("a");
// })