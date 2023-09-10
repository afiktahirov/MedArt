// tinymce.init({
//     selector: ".editor",
//     height: 120,
//     height: 500,
//     width: 500,
//     plugins: [
//         "advlist textcolor autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
//         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
//         "save table contextmenu directionality emoticons template paste  colorpicker",
//     ],
//     toolbar:
//         "textcolor | sizeselect | bold italic | fontselect |  fontsizeselect | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",


//         tinycomments_mode: 'embedded',
//         tinycomments_author: 'Author name',
//         mergetags_list: [{
//                 value: 'First.Name',
//                 title: 'First Name'
//             },
//             {
//                 value: 'Email',
//                 title: 'Email'
//             },
//         ],

//     });



$(".switch__language li").click(function () {
    const lang = $(this).data().target;
    $('[class^="lang__"].active').removeClass("active");
    $(`.${lang}`).addClass("active");
    $(".switch__language li.active").removeClass("active");
    $(this).addClass("active");
});

$("[data-bs-target='#deleteModal']").click(function () {
    $("#delete__item__name").text(
        $(this).closest("tr").find("td:first").text()
    );
    $("#delete__item__id").val($(this).data().id);
});


    document.addEventListener("DOMContentLoaded", function() {
        var addLanguageModal = new bootstrap.Modal(document.getElementById("addBannerLanguage"));
        var languageButtons = document.querySelectorAll(".add-language-button");
        var languageEditButtons = document.querySelectorAll(".editBanner");
        var LanguageBannerLang = document.querySelector("#addBannerLanguage option[id='lang']");

        // Deaktive banner
        let deactivateBannerModalElement = document.getElementById("bannerDisableModal");
        let deactivateBannerModal;

        if (deactivateBannerModalElement) {
            deactivateBannerModal = new bootstrap.Modal(deactivateBannerModalElement);
        }

        if (deactivateBannerModal) {
            let deactivateBannerButton = document.querySelectorAll(".deactivateButton");
            deactivateBannerButton.forEach(function(button) {
                button.addEventListener("click", function() {
                    let sliderId = button.getAttribute("data-sliderid");
                    let sliderIdInput = document.querySelector(
                        "#bannerDisableModal input[name='slider_id']");
                    sliderIdInput.value = sliderId;

                    deactivateBannerModal.show();
                });
            });
        }
        // Active Banner
        let activateBannerModalElement = document.getElementById("bannerActivateModal");
        let activateBannerModal;

        if (activateBannerModalElement) {
            activateBannerModal = new bootstrap.Modal(activateBannerModalElement);
        }
        if (activateBannerModal) {
            let activateBannerButton = document.querySelectorAll(".activateButton");
            activateBannerButton.forEach(function(button) {
                button.addEventListener("click", function() {
                    let sliderId = button.getAttribute("data-sliderid");
                    let sliderIdInput = document.querySelector(
                        "#bannerActivateModal input[name='slider_id']");
                    sliderIdInput.value = sliderId;

                    activateBannerModal.show();
                });
            });
        }





        var langParamadd = new URLSearchParams(window.location.search).get("lang");
        var selectedLangadd = langParamadd || "az";


        languageButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var sliderId = button.getAttribute("data-sliderid")
                let sliderIdInput = document.querySelector(
                    " #addBannerLanguage input[name='slider_id']");
                sliderIdInput.value = sliderId;
                fetch("/admin/findSliderContent/" + selectedLangadd)
                    .then(response => response.json())
                    .then(data => {

                        LanguageBannerLang.value = data.lang.lang
                        LanguageBannerLang.textContent = data.lang.name
                    })
            })
        })


        languageEditButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var sliderId = button.getAttribute("data-sliderid");
                var sliderIdInput = document.querySelector(
                    "#EditBannerText input[name='slider_id']"
                );
                sliderIdInput.value = sliderId;
            })
        })





        let deleteSliderButtons = document.querySelectorAll("#deleteSlider");

        deleteSliderButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                let sliderId = button.getAttribute("data-id");
                let sliderIdInput = document.querySelector(
                    " #deleteSliderModal input[name='id']");
                sliderIdInput.value = sliderId;

            })
        })
    });


    document.addEventListener("DOMContentLoaded", function() {
        var alertDiv = document.getElementById("myAlert");

        if (alertDiv) {
            var alertLink = alertDiv.querySelector(".close_alert");

            if (alertLink) {
                alertLink.addEventListener("click", function(event) {
                    event.preventDefault();
                    window.location.reload();
                });
            }

            setTimeout(function() {
                alertDiv.style.display = "none";
            }, 1000);


        }
        ClassicEditor
            .create(document.querySelector('#editor_add'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor_edit'))
            .then(newEditor => {
                editorEdit = newEditor;
            })
            .catch(error => {
                console.error(error);
            });;

        var editBannerModal = new bootstrap.Modal(document.getElementById("EditBannerText"));
        var editorEdit = document.querySelector('#editor_edit');
        var langParam = new URLSearchParams(window.location.search).get("lang");
        var selectedLang = langParam || "az";
        var selectLang = document.querySelector('#EditBannerText select[name="lang"]');
        var editBannerLang = document.querySelector("#EditBannerLang option[name='lang']");

        var editBannerButtons = document.querySelectorAll(".editBanner");

        editBannerButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var sliderId = button.getAttribute("data-sliderid");

                fetch('/admin/getSliderContent/' +
                        sliderId + '/' + selectedLang
                    )
                    .then(response => response.json())
                    .then(data => {
                        editorEdit.setData(data.text);
                        editBannerLang.value = data.lang.lang
                        editBannerLang.textContent = data.lang.name
                    });

                editBannerModal.show();
            });
        });




    });
