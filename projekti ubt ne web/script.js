function validateForm(){
    var name = documentElementById('name').value;
    var email = documentElementById('email').value;
    var surname = documentElementById('surname').value;
}

var nameRegex = /^[a-za-Z/s]+$/;
if(!nameRegex.test(name)){
    alert('Please enter a valid name');
    return false;
}

var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
if(!emailRegex.test(email)){
    alert('Please enter a valid email adress');
    return false;
}
