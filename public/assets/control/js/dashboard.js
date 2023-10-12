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



//   Departments


  let department_textBtn = document.querySelectorAll("#department_text");

  department_textBtn.forEach(function(button){
    button.addEventListener("click",function(){
        let department_id = button.getAttribute("data-departmentId");
        let department_modalId = document.querySelector("#exampleModalIconText input[name='department_id']");
        department_modalId.value = department_id;
        let departmentLang = document.querySelector("#departmentLang option[name='lang']");

        let langParam = new URLSearchParams(window.location.search).get("lang");
        let selectedLang = langParam || "az";

        fetch("/admin/findDepartmentLang/" + selectedLang)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    departmentLang.value = data.lang.lang
                    departmentLang.textContent = data.lang.name
                })

    })
  })

  let deleteDepartment = document.querySelectorAll("#deleteDepartment");

  deleteDepartment.forEach(function(button) {
      button.addEventListener("click", function() {
          let departmentId = button.getAttribute("data-departmentId");
          let departmentIdInput = document.querySelector(
              " #deleteDepartmentModal input[name='id']");
          departmentIdInput.value = departmentId;

      })
  })



});


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
