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
        document.getElementById('sendButton').addEventListener('click', function() {
            var content = tinymce.get('myTextarea').getContent();
            var con = document.getElementById('contentPlaceholder');
            con.textContent = content;
            document.getElementById('contentDiv').style.display = 'block';
        });
    </script>
</body>

</html>
