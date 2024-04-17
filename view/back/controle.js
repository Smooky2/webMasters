function validateForm() {
    var title = document.getElementById('title').value;
    var content = document.getElementById('content').value;

    if (title == "") {
        alert("Le titre est obligatoire.");
        return false;
    }

    if (content == "") {
        alert("Le contenu est obligatoire.");
        return false;
    }

    return true;
}