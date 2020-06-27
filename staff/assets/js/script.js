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