const iconMenu = document.querySelector(".iconMenu")
const sidebar = document.querySelector(".sidebar")
iconMenu.addEventListener("click", (e)=>{
    sidebar.style.animation = " sidebarMove .5s linear  forwards "
    sidebar.style.display = "block"
})