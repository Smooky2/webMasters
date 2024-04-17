function validateForm1() {
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var cin = document.getElementById('cin').value;
    var Adr_mail = document.getElementById('Adr_mail').value;
    var tel = document.getElementById('telephone').value;
    var age = document.getElementById('age').value;
    var sexe = document.getElementById('sexe').value;
    var MDP = document.getElementById('MDP').value;

    // Vous pouvez ajouter ici des validations supplémentaires

    // Exemple de validation simple
    if (nom === "" || prenom === "" || cin === "" ||  Adr_mail === "" || tel === "" || age === "" || sexe === "" || MDP === "") {
        alert("Veuillez remplir tous les champs.");
        return false;
    }

    // Redirection vers la page d'accueil
    window.location.href = "index.php"; // Remplacez "index.html" par le chemin de votre page d'accueil

    // Soumettre le formulaire si tout est valide
    return true;
}

function submitForm() {
    var Adr_mail = document.getElementById("Adr_mail").value;
    var MDP = document.getElementById("MDP").value;

    // Envoyer les données au serveur (à implémenter en utilisant AJAX ou une autre méthode)

    // Exemple simple : vérifier si le nom d'utilisateur est "user" et le mot de passe est "password"
    if (Adr_mail === "Adr_mail" && MDP === "MDP") {
        alert("Connexion réussie !");
    } else {
        alert("Échec de la connexion. Veuillez vérifier vos informations.");
    }
}

function validateRecaptcha() {
    // Validate reCAPTCHA
    var response = grecaptcha.getResponse();
    if (response.length === 0) {
        alert("Veuillez cocher la case reCAPTCHA.");
        return false;
    }

    // Allow form submission to proceed if reCAPTCHA is valid
    return true;
}

function validateRecaptcha() {
    // Valider le reCAPTCHA
    var response = grecaptcha.getResponse();
    if (response.length === 0) {
        alert("Veuillez cocher la case reCAPTCHA.");
        return false;
    }

    // Soumettre le formulaire si le reCAPTCHA est valide
    return true;
}
