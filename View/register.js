// Fonction pour valider le formulaire
function verif() {
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var email = document.getElementById("emails").value;
    var phone = document.getElementById("phone").value;
    var adresse = document.getElementById("adresse").value;
    var dater = document.getElementById("dater").value;
    var pass = document.getElementById("pass").value;
    var rpass = document.getElementById("rpass").value;

    // Vérifier si tous les champs sont remplis
    if (nom == "" || prenom == "" || email == "" || phone == "" || adresse == "" || dater == "" || pass == "" || rpass == "") {
        alert("Tous les champs doivent être remplis");
        return false;
    }

    // Vérifier si les mots de passe correspondent
    if (pass != rpass) {
        alert("Les mots de passe ne correspondent pas");
        return false;
    }

    return true;
}

// Attacher la fonction de validation au formulaire
document.getElementById("registrationForm").addEventListener("submit", function(event) {
    // Empêcher la soumission du formulaire si la validation échoue
    if (!validateForm()) {
        event.preventDefault();
    }
});
