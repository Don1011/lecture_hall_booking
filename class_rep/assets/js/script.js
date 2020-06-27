var courseFormContainer = document.getElementById("courseFormContainer");

//Function to bring up the edit course form immediately the edit button is clicked
function editCourse(){
    if(courseFormContainer.style.height != 0){
        courseFormContainer.style.height = 0;
    }else{
        courseFormContainer.style.height = "100%";
    }
}

var timeFormContainer = document.getElementById("timeFormContainer");

//Function to bring up the edit course form immediately the edit button is clicked
function editTime(){
    if(timeFormContainer.style.height != 0){
        timeFormContainer.style.height = 0;
    }else{
        timeFormContainer.style.height = "100%";
    }
}

var dateFormContainer = document.getElementById("dateFormContainer");

//Function to bring up the edit course form immediately the edit button is clicked
function editDate(){
    if(dateFormContainer.style.height != 0){
        dateFormContainer.style.height = 0;
    }else{
        dateFormContainer.style.height = "100%";
    }
}

document.getElementById("searchForm").reset();


function search(){
    var query = document.getElementById("searchQuery").value;
    if(query != ""){

        var search = new XMLHttpRequest();
        search.open("GET", "ajax_processes.php?query="+query, true);

        search.onload = function(){
            document.getElementById("display").innerHTML = this.responseText;
        }

        search.send();
    }
}
// document.getElementById("bookForm").addEventListener("submit", hallBooking);
function hallBooking(id){
    
    var hall = document.getElementById(`hall${id}`).value;
    var course = document.getElementById(`course${id}`).value;
    var time = document.getElementById(`time${id}`).value;
    var date = document.getElementById(`date${id}`).value;
    var duration = document.getElementById(`duration${id}`).value;

    if(hall != "" && course != "" && time != "" && date != "" && duration != ""){
        
        location.replace(`process_booking.php?hall=${hall}&course=${course}&time=${time}&date=${date}&duration=${duration}`);

    }else{
        alert("COMPLETE FILLING THE FORM BEFORE SUBMITTING");
    }

}

document.getElementById("searchForm").reset();


function search(){
    var query = document.getElementById("searchQuery").value;
    if(query != ""){
        
        var search = new XMLHttpRequest();
        search.open("GET", "ajax_processes.php?query="+query, true);

        search.onload = function(){
            document.getElementById("display").innerHTML = this.responseText;
        }

        search.send();
    }
}
// document.getElementById("inputContainer").style ="height: 0";

function displayInputFields(itemId){
    document.getElementById("dateContainer"+itemId).style.height = "50px";
    document.getElementById("timeContainer"+itemId).style.height = "50px";
    document.getElementById("hallsContainer"+itemId).style.height = "50px";
    document.getElementById("submitContainer"+itemId).style.height = "50px";
    document.getElementById("durationContainer"+itemId).style.height = "50px";
}

function submitForm(formId){
    var newDate = document.getElementById("date"+formId).value;
    var newTime = document.getElementById("time"+formId).value;
    var newHall = document.getElementById("hall"+formId).value;
    var newDuration = document.getElementById("duration"+formId).value;
    var form = document.getElementById("editForm"+formId);

    if(newDate == "" || newTime == "" || newHall == "" || newDuration == ""){
        alert("Complete Filling The Form Before Submitting");
    }else{
        // location.replace(`process_booking.php?booking_id=${formId}&new_date=${newDate}&new_time=${newTime}&new_hall=${newHall}&new_duartion=${newDuration}`);
        form.submit();
    }
}