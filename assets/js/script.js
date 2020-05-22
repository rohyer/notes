// $(document).ready(function () {
//     $("#btn-change-password").click(function () {
//         var form = new FormData($("#form-change-password")[0]);
//         $.ajax({
//             url: 'http://localhost/notes/src/model/processing/ajaxDatas.php',
//             type: 'post',
//             dataType: 'json',
//             cache: false,
//             processData: false,
//             contentType: false,
//             data: form,
//             timeout: 8000,
//             success: function(resultado) {
//                 $("#resposta").html(resultado);
//             }
//         })
//     })
// })


// FUNÇÃO PARA ENVIAR NOTA PARA LIXEIRA (DELETAR)
$('.delete-note').click(function(event) {
    let attributeNote = $(this).attr('data-id');
    let yesDeleteNote = doc.getElementById('yes-delete-note');
    yesDeleteNote.href = "./src/model/processing/processing.php?iddeletenote=" + attributeNote;
    $('#delete-note-modal').modal('show');
})

// FUNÇÃO PARA DELETAR A NOTA DA LIXEIRA PERMANENTEMENTE
$('.delete-trash-note').click(function(event) {
    let attributeNote = $(this).attr('data-id');
    let yesDeleteNote = doc.getElementById('yes-delete-note');
    yesDeleteNote.href = "./src/model/processing/processing.php?idmaindeletenote=" + attributeNote;
    $('#delete-note-modal').modal('show');
})

const doc = document;

const body = doc.getElementsByTagName('body')[0].className;
const bodyClass = body.split(' ');

// FUNÇÕES PARA DEIXAR O MENU ABERTO OU FECHADO CASO SEJA DESKTOP OU MOBILE
function verifySizeWindow() {
    const windowWidth = window.innerWidth;
    const mainMenu = doc.getElementById('main-menu');
    
    if (windowWidth >= 992) {
        mainMenu.classList.add('opened-main-menu');
    } else {
        mainMenu.classList.add('closed-main-menu');
    }
}

function verifySizeWindowProfile() {
    const windowWidth = window.innerWidth;
    const userMenu = doc.getElementById('user-menu');

    if (windowWidth >= 992) {
        userMenu.classList.add('opened-main-menu');
    } else {
        userMenu.classList.add('closed-main-menu');
    }
    
}

// FUNÇÕES PARA ABRIR OU FECHAR O MENU CASO A JANELA SEJA REDIMENSIONADA
function verifyResizeWindow() {
    const body = doc.getElementsByTagName('body')[0];
    const mainMenu = doc.getElementById('main-menu');

    window.addEventListener('resize', function(e) {
        if (window.innerWidth >= 992) {
            mainMenu.classList.remove('closed-main-menu');
            mainMenu.classList.add('opened-main-menu');
        } else if (window.innerWidth <= 991) {
            body.classList.remove('opened-main-menu-body');
            mainMenu.classList.remove('opened-main-menu');
            mainMenu.classList.add('closed-main-menu');
        }
    });
}

function verifyResizeWindowProfile() {
    const body = doc.getElementsByTagName('body')[0];
    const userMenu = doc.getElementById('user-menu');

    window.addEventListener('resize', function(e) {
        if (window.innerWidth >= 992) {
            mainMenu.classList.remove('closed-main-menu');
            mainMenu.classList.add('opened-main-menu');
        } else if (window.innerWidth <= 991) {
            body.classList.remove('opened-main-menu-body');
            mainMenu.classList.remove('opened-main-menu');
            mainMenu.classList.add('closed-main-menu');
        }
    });
}


// FUNÇÃO PARA ABRIR E FECHAR MENU
function closeOpenMenu() {
    const hamburger = doc.getElementById('hamburger');
    hamburger.addEventListener('click', function(e) {
        const body = doc.getElementsByTagName('body')[0];
        const mainMenu = doc.getElementById('main-menu');
        const mainContent = doc.getElementsByClassName('main-content')[0];
        
        if (mainMenu.classList == 'opened-main-menu') {
            body.classList.remove('opened-main-menu-body');
            mainMenu.classList.remove('opened-main-menu');
            mainContent.classList.remove('open-menu-for-content');
            mainMenu.classList.add('closed-main-menu');
            mainContent.classList.add('open-menu-for-content-2');
        } else {
            mainMenu.classList.remove('closed-main-menu');
            mainContent.classList.remove('open-menu-for-content-2');
            body.classList.add('opened-main-menu-body');
            mainMenu.classList.add('opened-main-menu');
            mainContent.classList.add('open-menu-for-content');
        }
    });
}

// FUNÇÃO PARA ABRIR E FECHAR MENU DO PROFILE
function closeOpenProfileMenu() {
    const hamburger = doc.getElementById('hamburger');
    hamburger.addEventListener('click', function(e) {
        const mainMenu = doc.getElementById('user-menu');
        const mainContent = doc.getElementsByClassName('main-user-content')[0];
        
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

// FUNÇÃO PARA ABRIR E FECHAR A LISTA DE CATEGORIAS
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

// FUNÇÃO PARA CARREGAR TEMA
function loadTheme() {
    window.addEventListener("load", function() {
        const themeValue = doc.getElementById('theme-value').value;
        const body = doc.getElementsByTagName('body')[0]

        if (themeValue == 0) {
            body.classList.remove('dark-theme')
        } else {
            body.classList.add('dark-theme')
        }
    });
}
loadTheme();

// FUNÇÃO PARA ATUALIZAR NOTA
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

// FUNÇÃO PARA ATUALIZAR CATEGORIA
function updateCategory() {
    const updateCategory = doc.getElementsByClassName('update-category');
    const updateCategoryLen = updateCategory.length;
    for (let i = 0; i < updateCategoryLen; i++) {
        updateCategory[i].addEventListener("click", function(event) {
            const idCategory = updateCategory[i].getAttribute("data-id");
            const nameCategory = updateCategory[i].getAttribute("data-name");
            const idUserCategoryUpdate = doc.getElementById('id-category-update');
            const nameCategoryUpdate = doc.getElementById('name-category-update');

            idUserCategoryUpdate.value = idCategory;
            nameCategoryUpdate.value = nameCategory;
            
        })
    }
}

// FUNÇÃO PARA DELETAR CATEGORIA
function deleteCategory() {
    const deleteCategory = doc.getElementsByClassName("delete-category");
    deleteCategoryLen = deleteCategory.length;
    for (let i = 0; i < deleteCategoryLen; i++) {
        deleteCategory[i].addEventListener("click", function(e) {
            deleteCategoryID = deleteCategory[i].getAttribute("data-id");
            yesDeleteCategory = doc.getElementById("yes-delete-category");
            
            yesDeleteCategory.href = "./src/model/processing/processing.php?idmaindeletecategory=" + deleteCategoryID;
            
        });
    }
}

// FUNÇÃO PARA ATUALIZAR DADOS DO USUÁRIO
function updateUser() {
    const btnUpdateUser = doc.getElementById("btn-update-user");
    btnUpdateUser.addEventListener("click", function() {
        
        const mainNameUser = doc.getElementById("main-name-user").innerHTML;
        const mainEmailUser = doc.getElementById("main-email-user").innerHTML;
        const mainSexUser = doc.getElementById("main-sex-user").innerText;
        const mainCellphoneUser = doc.getElementById("main-cellphone-user").innerHTML;
        const mainStateUser = doc.getElementById("main-state-user").innerText;
        const mainCityUser = doc.getElementById("main-city-user").innerHTML;

        const nameUpdateUser = doc.getElementById("name-update-user").value = mainNameUser;
        const emailUpdateUser = doc.getElementById("email-update-user").value = mainEmailUser;
        const sexUpdateUser = doc.getElementById("sex-update-user").value = mainSexUser;
        const cellphoneUpdateUser = doc.getElementById("cellphone-update-user").value = mainCellphoneUser;
        const stateUpdateUser = doc.getElementById("state-update-user").value = mainStateUser;
        const cityUpdateUser = doc.getElementById("city-update-user").value = mainCityUser;
    })
}

// FUNÇÃO PARA ATUALIZAR SENHA
function changePassword() {
    const btnChangePassword = doc.querySelector("#btn-change-password");
    btnChangePassword.addEventListener("click", function(event) {

        const idUser = doc.querySelector("#id-user").value;
        const currentPassword = doc.querySelector("#current-password").value;
        const newPassword = doc.querySelector("#new-password").value;
        const newPasswordRepeated = doc.querySelector("#new-password-repeated").value;
        const passwordChangedResponse = doc.querySelector("#password-changed-response");

        var ajax = new XMLHttpRequest();
        
        ajax.open("POST", "http://localhost/notes/src/model/processing/ajaxDatas.php");
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.responseType = 'json';
        ajax.send("id-user=" + idUser + "&current-password=" + currentPassword + "&new-password=" + newPassword + "&new-password-repeated=" + newPasswordRepeated);

        ajax.addEventListener("readystatechange", function () {
            if (ajax.readyState === 4 && ajax.status === 200) {
                console.log(ajax);
                console.log(ajax.responseType);
                console.log(ajax.response);

                if (ajax.response == 1) {
                    passwordChangedResponse.innerHTML = "Senha alterada com sucesso";
                } else if (ajax.response == 2) {
                    passwordChangedResponse.innerHTML = "Senha repetida não confere";
                } else if (ajax.response == 3) {
                    passwordChangedResponse.innerHTML = "Senha atual não confere";
                } else {
                    passwordChangedResponse.innerHTML = "Erro ao alterar a senha";
                }
            }
        })
    })
}

// CHAMADA DAS FUNÇÕES
if (bodyClass == "body-pages-in") {
    verifySizeWindow();
    verifyResizeWindow()
    closeOpenMenu();
    closeOpenCategories();
    updateNote();
    updateCategory();
    deleteCategory();
}
if (bodyClass == "body-profile-page") {
    updateUser();
    closeOpenProfileMenu();
    verifySizeWindowProfile();
}
if (bodyClass == "body-profile-password-page") {
    changePassword();
    closeOpenProfileMenu();
    verifySizeWindowProfile();
}