// Notifications icon Dropdown

const notificationsIcon = document.getElementById("notifications-icon")
const dropdownBtnNotifications = document.getElementById("dropdown-btn-notifications")

if(notificationsIcon){
    notificationsIcon.addEventListener("click", openDropdownonclickNotifications)
    dropdownBtnNotifications.addEventListener("click", openDropdownonclickNotifications)
    
    function openDropdownonclickNotifications(e) {
        if(e.composedPath()[0]==this){
            document.getElementById("myDropdown-notifications").classList.toggle("show-notifications");
        }
    } 
}

// Profile icon Dropdown

const personIcon = document.getElementById("person-icon")
const dropdownBtnPerson = document.getElementById("dropdown-btn-person")

personIcon.addEventListener("click", openDropdownonclickPerson)
dropdownBtnPerson.addEventListener("click", openDropdownonclickPerson)

function openDropdownonclickPerson(e) {
    if(e.composedPath()[0]==this){
        document.getElementById("myDropdown-person").classList.toggle("show-person");
    }
}
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn-person')){
        var dropdownsPerson = document.getElementsByClassName("dropdown-content-person");
        var i;
        for (i = 0; i < dropdownsPerson.length; i++) {
            var openDropdownPerson = dropdownsPerson[i];
            if (openDropdownPerson.classList.contains('show-person')) {
                openDropdownPerson.classList.remove('show-person');
            }
        }
    }
    if (!event.target.matches('.dropbtn-notifications')){
        var dropdownsNotifications = document.getElementsByClassName("dropdown-content-notifications");
        var i;
        for(i = 0; i < dropdownsNotifications.length; i++) {
            var openDropdownNotification = dropdownsNotifications[i];
            if (openDropdownNotification.classList.contains('show-notifications')) {
                openDropdownNotification.classList.remove('show-notifications');
            }
        }
    }
}