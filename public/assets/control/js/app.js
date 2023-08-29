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


  // images_upload_url: "https://labco.az/admin/upload",
    // automatic_uploads: false,
    // relative_urls: false,
    // remove_script_host: false,
    // convert_urls: true,
    // images_upload_handler: function (blobInfo, success, failure) {
    //     const xhr = new XMLHttpRequest();
    //     xhr.withCredentials = true;
    //     var csrfToken = document.querySelector(
    //         'meta[name="csrf-token"]'
    //     ).content;
    //     xhr.open("POST", "https://labco.az/admin/upload");
    //     xhr.setRequestHeader("X-CSRF-TOKEN", csrfToken);

    //     xhr.onload = function () {
    //         let json;
    //         if (xhr.status !== 200) {
    //             failure("HTTP Error: " + xhr.status);
    //             return;
    //         }
    //         json = JSON.parse(xhr.responseText);
    //         if (!json || typeof json.location !== "string") {
    //             failure("Invalid JSON: " + xhr.responseText);
    //             return;
    //         }
    //         success(json.location);
    //     };
    //     const formData = new FormData();
    //     formData.append("file", blobInfo.blob(), blobInfo.filename());
    //     xhr.send(formData);
    // },
    // image_class_list: [
    //     { title: "Align", value: "" },
    //     { title: "center", value: "center" },
    //     { title: "left", value: "left" },
    //     { title: "right", value: "right" },
    // ],
