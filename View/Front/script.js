
function validateForm() {
    let x = document.forms["myForm"]["typer"].value;
    if (x == "") {
        alert("type must be filled out");
        return false;
    }
    let Y = document.forms["myForm"]["sujet"].value;
    if (Y == "") {
        alert("sujet must be filled out");
        return false;
    }

    let Z = document.forms["myForm"]["dess"].value;
    if (Z.trim() === "" || Z.trim().split(/\s+/).length < 3) {
        alert("Description must be filled out with at least three words");
        return false;
    }
    
}