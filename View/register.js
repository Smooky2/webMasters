function verif() {
  var nom = document.getElementById('nom').value;
  var prenom = document.getElementById('prenom').value;
  var email = document.getElementById('emails').value;
  var telephone = document.getElementById('phone').value;
  var adresse = document.getElementById('adresse').value;
  var date_naissance = document.getElementById('dater').value;
  var mot_de_passe = document.getElementById('pass').value;
  var confirm_mot_de_passe = document.getElementById('rpass').value;
  var gender = document.getElementById('gender').value; // Assuming input field id for gender is 'gender'
  var idrole = document.getElementById('idrole').value; // Assuming input field id for role is 'idrole'

  if (nom === '' || prenom === '' || email === '' || telephone === '' || adresse === '' || date_naissance === '' || mot_de_passe === '' || confirm_mot_de_passe === '' || gender === '' || idrole === '') {
      alert('Please fill in all fields');
      return false;
  }

  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailPattern.test(email)) {
      alert('Please enter a valid email address');
      return false;
  }

  if (mot_de_passe !== confirm_mot_de_passe) {
      alert('Passwords do not match');
      return false;
  }

  // Add additional validation for phone number, date format, etc. as needed

  return true;
}
