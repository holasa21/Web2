
//------------------------------Manager home page--------------------------------------

function validateForm() {
    
    let t = document.forms["request"]["type"].value;
    let d = document.forms["request"]["description"].value;
    let f1 = document.forms["request"]["myfile1"].value;
    let f2 = document.forms["request"]["myfile2"].value;
 
    if (t == "") {
        alert("You must choose a type of your requst!");
        return false;
    }
    if (d == "") {
        alert("You must add a description of your requst!");
        return false;
    }

    if (f1 == "" && f2 == "") {
        alert("You must add at least one attachment in your requst!");
        return false;
    }
    location.href = './Request_information_page.html';
}


//--------------------------------------Add new request--------------------------------------


