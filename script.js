const iconMenu = document.querySelector(".iconMenu")
const sidebar = document.querySelector(".sidebar")
const cross = document.querySelector(".crossIcon")
iconMenu.addEventListener("click", (e)=>{
    sidebar.style.animation = " sidebarMove .5s linear  forwards "
    sidebar.style.display = "block"
})
cross.addEventListener("click", (e)=>{
    sidebar.style.animation = " sidebarMoveReverse .5s linear  forwards "
    setTimeout(() => {
        sidebar.style.display = "none"
    }, 1000);

})

window.addEventListener("resize", (e)=>{
    if(window.innerWidth < 750){
        sidebar.style.display = "none"
    }
    else {
        sidebar.style.display = "flex"
    }
})