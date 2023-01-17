const navBtns = document.querySelectorAll(".navigation-btn");
const profileShowCase = document.querySelector(".profile-section-container");


const selectSectionByID = (clickedBtnID) => {
    const sectionView = views[clickedBtnID];
    profileShowCase.innerHTML = "";
    profileShowCase.insertAdjacentHTML("beforeend", sectionView)
}
navBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        const clickedBtnID = btn.id;
        navBtns.forEach(button => {
            return button.classList.remove("active")
        })
        btn.classList.add("active")
        selectSectionByID(clickedBtnID)
    })
})
const DEFAULT_SECTION = "overview"
document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("overview").classList.add("active")
    selectSectionByID(DEFAULT_SECTION)
})