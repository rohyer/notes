$('.delete-note').click(function(event) {
    let attributeNote = $(this).attr('data-id');
    let yesDeleteNote = doc.getElementById('yes-delete-note');
    yesDeleteNote.href = "./src/model/processing/delete-note.php?idnote=" + attributeNote;
    $('#delete-note-modal').modal('show');
})

const doc = document;

function closeOpenProfile() {
    const profile = doc.getElementById('profile');
    profile.addEventListener('click', function() {
        
        const mainProfileBox = doc.getElementsByClassName('main-profile-box')[0];
        const mainProfileBoxLen = mainProfileBox.classList.length;
        console.log(mainProfileBoxLen);

        if (mainProfileBoxLen == 1) {
            mainProfileBox.classList.add('show-profile');
        } else {
            mainProfileBox.classList.remove('show-profile');
        }
    });
}
closeOpenProfile();

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

function closeOpenCategories() {
    const category = doc.getElementById('category');
    category.addEventListener("click", function() {
        const allCategories = doc.getElementById('all-categories');
        const allCategoriesLen = allCategories.classList.length;

        const categoryArrow = doc.getElementById('category-arrow');
        
        if (allCategoriesLen == 0) {
            allCategories.classList.add("open-all-categories");
            categoryArrow.classList.remove('fa-caret-down');
            categoryArrow.classList.add('fa-caret-up');
        } else {
            allCategories.classList.remove("open-all-categories");
            categoryArrow.classList.remove('fa-caret-up');
            categoryArrow.classList.add('fa-caret-down');
        }
    });
}
closeOpenCategories();

function loadTheme() {
    window.addEventListener("load", function() {
        const themeValue = doc.getElementById('theme-value').value;
        const body = doc.getElementsByTagName('body')[0]

        if (themeValue == 0) {
            body.classList.remove('dark-theme')
        } else {
            body.classList.add('dark-theme')
        }
    })
}

loadTheme();


// FUNÇÃO PARA DELETAR NOTA
// function deleteNote() {
//     const note = doc.getElementsByClassName('delete-note');

//     for (let i = 0; i < note.length; i++) {
//         note[i].addEventListener("click", function() {
            
//             // get modals
//             const modals = document.getElementById('delete-note-modal');

//             // on every modal change state like in hidden modal
//             modals.classList.add('show');
//             modals.setAttribute('aria-hidden', 'false');
//             modals.setAttribute('style', 'display: block');
            

//             let attributeNote = note[i].getAttribute('data-id');
//             let yesDeleteNote = doc.getElementById('yes-delete-note');
//             yesDeleteNote.href = "./src/model/processing/delete-note.php?idnote=" + attributeNote;
//         });
//     }
// }
// deleteNote();

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