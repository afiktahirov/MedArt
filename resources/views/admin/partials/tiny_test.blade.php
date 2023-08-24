<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.tiny.cloud/1/5bc9of2zzrr1q2zpsgfqxkirxmypgu00kqkso1hziyd8st9h/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
</head>

<body>
    <textarea id="myTextarea" style="width: 500px; height: 500px;">
    Welcome to TinyMCE!
  </textarea>
    <button id="sendButton">Gönder</button>
    <div id="contentDiv" style="display: none;">
        <h1>İçerik:</h1>
        <div id="contentPlaceholder"></div>
    </div>

    <script>
        tinymce.init({
            selector: 'textarea',
            height: 500,
            width: 500,
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],

        });

        document.getElementById('sendButton').addEventListener('click', function() {
            var content = tinymce.get('myTextarea').getContent();
            var con = document.getElementById('contentPlaceholder');
            con.textContent = content;
            document.getElementById('contentDiv').style.display = 'block';
        });
    </script>
</body>

</html>
