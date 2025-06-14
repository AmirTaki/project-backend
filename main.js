const searchIconInput = document.querySelector(".searchIcon input")
const iconSearch = document.querySelector(".searchIcon .bi-search")
const iconSidebar = document.querySelector(".iconSidebar i")
const megaMenu = document.querySelector(".megaMenu")
const containerCross = document.querySelector(".containerCross i")
//RESIZE ADD EVENT LISTER SIZE 
window.addEventListener("resize", (e)=>{
    HideFlexInputSearchHeader()          // HIDE FLEX SEARCH INPUT
    hiddenSidebarResize()               // HIDEEN SIDEBAR MEGEMENE RESIZE AT WIDTH < 750PX
   
})

// INPUT SERACH & ICON SEARCH : FOCUS
searchIconInput.addEventListener("focus", (e)=> {
    iconSearch.style.opacity = 0
})
// INPUT SERACH & ICON SEARCH : FOCUSOUT
searchIconInput.addEventListener("focusout", (e)=> {
    iconSearch.style.opacity = 1
})
// HIDE FLEX SEARCH INPUT
const HideFlexInputSearchHeader = () =>{
    searchIconInput.style.animation  = "searchInputReverse .5s linear forwards "
    setTimeout(() => {
        searchIconInput.style.display = "none"
    }, 500);
}
// VIEW FLEX SEARCH INPUT
iconSearch.addEventListener('click', (e)=>{
    if(searchIconInput.style.display == "none"){
        searchIconInput.style.display = "flex"
        searchIconInput.style.animation  = "searchInput .5s linear forwards " 
    } 
    else {
        HideFlexInputSearchHeader ();
    }
})
// ICON SIDEBAR ANIMATION MEGAMENU
iconSidebar.addEventListener("click", (e)=>{
    megaMenu.style.animation  = "megaMenuMove .3s linear forwards"
    megaMenu.style.display  = "flex"
})
// ICON SIDEBAR ANIMATION MEGAMENU
containerCross.addEventListener('click', (e)=>{
    megaMenu.style.animation  = "sidebarMoveReverse .3s linear forwards"
})
// HIDEEN SIDEBAR MEGEMENE RESIZE AT WIDTH < 750PX
function hiddenSidebarResize (){
    megaMenu.style.display = window.innerWidth < 750 ? "none" : "flex";
}