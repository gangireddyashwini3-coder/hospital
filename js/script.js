// Simple confirmation before delete

function confirmDelete(){
    return confirm("Are you sure you want to delete this record?");
}

// Form validation

function validateDoctor(){
    let name=document.getElementById("doctor_name").value;
    let phone=document.getElementById("phone").value;

    if(name==""){
        alert("Doctor name required");
        return false;
    }

    if(phone.length!=10){
        alert("Enter valid phone number");
        return false;
    }

    return true;
}

function validatePatient(){

    let name=document.getElementById("patient_name").value;
    let age=document.getElementById("age").value;

    if(name==""){
        alert("Patient name required");
        return false;
    }

    if(age<=0){
        alert("Enter valid age");
        return false;
    }

    return true;
}