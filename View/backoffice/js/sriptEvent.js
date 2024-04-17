function validerNom() {
    const nom = document.getElementById('nom').value.trim();
    const errorNom = document.getElementById('errorNom');

    if (nom === '') {
        errorNom.textContent = 'Le nom est requis';
        return false;
    }

    const pattern = /^[A-Za-zA-ÖØ-öø-ÿ\s']+$/;
    if (!nom.match(pattern)) {
        errorNom.textContent = 'Veuillez entrer un nom valide (lettres uniquement)';
        return false;
    }

    errorNom.textContent = '';
    return true;
}

function validerDate() {
    const date = document.getElementById('date').value.trim();
    const errorDate = document.getElementById('errorDate');

    if (date === '') {
        errorDate.textContent = 'La date est requise';
        return false;
    }

    // Add your date validation logic here

    errorDate.textContent = '';
    return true;
}

function validerLieu() {
    const lieu = document.getElementById('lieu').value.trim();
    const errorLieu = document.getElementById('errorLieu');

    if (lieu === '') {
        errorLieu.textContent = 'Le lieu est requis';
        return false;
    }

    // Add your lieu validation logic here

    errorLieu.textContent = '';
    return true;
}

function validerDescp() {
    const descp = document.getElementById('descp').value.trim();
    const errorDescp = document.getElementById('errorDescp');

    // Add your descp validation logic here

    errorDescp.textContent = '';
    return true;
}

function validerCatego() {
    const catego = document.getElementById('catego').value.trim();
    const errorCatego = document.getElementById('errorCatego');

    // Add your catego validation logic here

    errorCatego.textContent = '';
    return true;
}

function validerFrais() {
    const frais = document.getElementById('frais').value.trim();
    const errorFrais = document.getElementById('errorFrais');

    // Add your frais validation logic here

    errorFrais.textContent = '';
    return true;
}

function validerHeure() {
    const heure = document.getElementById('heure').value.trim();
    const errorHeure = document.getElementById('errorHeure');

    if (heure === '') {
        errorHeure.textContent = 'L\'heure est requise';
        return false;
    }

    const pattern = /^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/; // Matches HH:mm format (24-hour clock)
    if (!heure.match(pattern)) {
        errorHeure.textContent = 'Veuillez entrer une heure valide (format HH:mm)';
        return false;
    }

    errorHeure.textContent = '';
    return true;
}

function validateEventForm() {
    const isNomValid = validerNom();
    const isDateValid = validerDate();
    const isLieuValid = validerLieu();
    const isDescpValid = validerDescp();
    const isCategoValid = validerCatego();
    const isFraisValid = validerFrais();
    const isHeureValid = validerHeure();

    return isNomValid && isDateValid && isLieuValid && isDescpValid && isCategoValid && isFraisValid && isHeureValid;
}

