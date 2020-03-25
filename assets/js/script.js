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
            
            // get modals
            const modals = document.getElementById('delete-note-modal');

            // on every modal change state like in hidden modal
            modals.classList.add('show');
            modals.setAttribute('aria-hidden', 'false');
            modals.setAttribute('style', 'display: block');
            

            let attributeNote = note[i].getAttribute('data-id');
            let yesDeleteNote = doc.getElementById('yes-delete-note');
            yesDeleteNote.href = "./src/model/processing/delete-note.php?idnote=" + attributeNote;
        });
    }
}
deleteNote();

function updateNote() {
    const note = doc.getElementsByClassName('single-note');

    for (let i = 0; i < note.length; i++) {
        note[i].addEventListener("click", function(e) {
             if (e.target.classList.contains('single-note') || e.target.classList.contains('title-single-note') || e.target.classList.contains('description-single-note')) {

                let idSingleNote = note[i].getAttribute('data-id');
                let titleSingleNote = doc.getElementsByClassName('title-single-note')[i].innerHTML;
                let categorySingleNote = doc.getElementsByClassName('category-single-note')[i].value;
                let markedSingleNote = doc.getElementsByClassName('marked-single-note-value')[i].value;
                let descriptionSingleNote = doc.getElementsByClassName('description-single-note')[i].innerHTML;
                
                let idUpdateModal = doc.getElementById('id-update-modal').value = idSingleNote;
                let titleUpdateModal = doc.getElementById('title-update-modal').value = titleSingleNote;
                let categoryUpdateModal = doc.getElementById('category-update-modal').value = categorySingleNote;
                let descriptionUpdateModal = doc.getElementById('description-update-modal').value = descriptionSingleNote;
                let markedUpdateModal = doc.getElementById('marked-update-modal');

                if (markedSingleNote == 1) {
                    markedUpdateModal.checked = true;
                } else {
                    markedUpdateModal.checked = false;
                }

            } else {
                e.stopPropagation();
            }
        })
    }
}
updateNote();
    


//RESET FORM NOTE AND CATEGORY AFTER SUBMIT
// window.addEventListener('load', function(e) {
//     doc.getElementById('form-add-note').reset();
//     console.log("a");
// })