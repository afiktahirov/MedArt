tinymce.init({
    selector: ".editor",
    theme: "modern",
    height: 120,
    images_upload_url: "https://labco.az/admin/upload",
    automatic_uploads: false,
    relative_urls: false,
    remove_script_host: false,
    convert_urls: true,
    images_upload_handler: function (blobInfo, success, failure) {
        const xhr = new XMLHttpRequest();
        xhr.withCredentials = true;
        var csrfToken = document.querySelector(
            'meta[name="csrf-token"]'
        ).content;
        xhr.open("POST", "https://labco.az/admin/upload");
        xhr.setRequestHeader("X-CSRF-TOKEN", csrfToken);

        xhr.onload = function () {
            let json;
            if (xhr.status !== 200) {
                failure("HTTP Error: " + xhr.status);
                return;
            }
            json = JSON.parse(xhr.responseText);
            if (!json || typeof json.location !== "string") {
                failure("Invalid JSON: " + xhr.responseText);
                return;
            }
            success(json.location);
        };
        const formData = new FormData();
        formData.append("file", blobInfo.blob(), blobInfo.filename());
        xhr.send(formData);
    },
    image_class_list: [
        { title: "Align", value: "" },
        { title: "center", value: "center" },
        { title: "left", value: "left" },
        { title: "right", value: "right" },
    ],
    plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template paste textcolor colorpicker",
    ],
    toolbar:
        "sizeselect | bold italic | fontselect |  fontsizeselect | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
});
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
