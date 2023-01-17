// Profile icon Dropdown

const personIcon = document.getElementById("person-icon")
const dropdownBtn = document.getElementById("dropdown-btn")

personIcon.addEventListener("click", openDropdownonclick)
dropdownBtn.addEventListener("click", openDropdownonclick)

function openDropdownonclick(e) {
    if(e.composedPath()[0]==this){
        document.getElementById("myDropdown").classList.toggle("show");
    }
}
window.onclick = function(event) {
if (!event.target.matches('.dropbtn')){
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
    var openDropdown = dropdowns[i];
    if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
    }
    }
}
}
