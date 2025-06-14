const searchIconInput = document.querySelector(".searchIcon input")
const iconSearch = document.querySelector(".searchIcon .bi-search")
const iconSidebar = document.querySelector(".iconSidebar i")

//RESIZE ADD EVENT LISTER SIZE 
window.addEventListener("resize", (e)=>{
    HideFlexInputSearchHeader()
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
// MOVE SIDEBAR ANIMATION
iconSidebar.addEventListener("click", (e)=>{
    containterHeader.style.animation  = "sidebarMove .3s linear forwards"
    containterHeader.style.display  = "inline"
})