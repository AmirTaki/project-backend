const searchIconInput = document.querySelector(".searchIcon input")
const iconSearch = document.querySelector(".searchIcon .bi-search")
const iconSidebar = document.querySelector(".iconSidebar i")
const containterHeader = document.querySelector('.containterHeader')
const deleteContainer = document.querySelector(".deleteContainer i")
const itemSidertoSider = document.querySelectorAll('.itemSidertoSider')
const SideToinSide = document.querySelectorAll(".SideToinSide")
const backSideToSide = document.querySelectorAll(".backSideToSide")
const exitSidebbar = document.querySelectorAll('.exitSidebbar');
const containerSideToinSide = document.querySelectorAll(".containerSideToinSide")

searchIconInput.addEventListener("focus", (e)=> {
    iconSearch.style.opacity = 0
})

searchIconInput.addEventListener("focusout", (e)=> {
    iconSearch.style.opacity = 1
})

const HideFlexInputSearchHeader = () =>{
    searchIconInput.style.animation  = "searchInputReverse .5s linear forwards "
    setTimeout(() => {
        searchIconInput.style.display = "none"
    }, 500);
}

iconSearch.addEventListener('click', (e)=>{
    if(searchIconInput.style.display == "none"){
        searchIconInput.style.display = "flex"
        searchIconInput.style.animation  = "searchInput .5s linear forwards " 
    } 
    else {
        HideFlexInputSearchHeader ();
    }
})

const resizeItem = () => {
    containterHeader.style.display  =  window.innerWidth < 750 ?  "none" : 'flex'
}

iconSidebar.addEventListener("click", (e)=>{
    containterHeader.style.animation  = "sidebarMove .3s linear forwards"
    containterHeader.style.display  = "inline"
})

deleteContainer.addEventListener('click', (e)=>{
    containterHeader.style.animation  = "sidebarMoveReverse .3s linear forwards"
})


const closeSideToInSide = () => {
    for (let i = 0; i < SideToinSide.length ; i++){
        SideToinSide[i].style.display = "none"
        itemSidertoSider[i].style.backgroundColor = "rgb(249, 249, 249)"
    }
}

for(let i = 0; i < itemSidertoSider.length; i++){
    itemSidertoSider[i].addEventListener("mousemove", (e)=>{
        if(window.innerWidth > 750){
            closeSideToInSide()
            SideToinSide[i].style.display = "block"
            itemSidertoSider[i].style.backgroundColor = "rgb(237, 237, 237)"
        }
    })
}
// for(let i = 0; i < containerSideToinSide.length; i++){
//     containerSideToinSide[i].addEventListener("mouseleave", (e)=>{
//         if(window.innerWidth > 750){
//             SideToinSide[i].style.display = "none"
//         }
//     })
// }


for(let i = 0; i < itemSidertoSider.length; i++){        
    itemSidertoSider[i].addEventListener("click", (e)=>{
        if(window.innerWidth <= 750){
            SideToinSide[i].style.animation = "moveSideToSide .3s linear forwards"  
            SideToinSide[i].style.display = "block"
        }
    })  
}


for(let i = 0; i < backSideToSide.length ; i++){
    backSideToSide[i].addEventListener("click", (e)=>{
    SideToinSide[i].style.animation = "moveSideToSideReverse .3s linear forwards"
    setTimeout(() => {
        SideToinSide[i].style.display = "none"
    }, 300);
    })
}

const closeSideToinSide = () => {
    for(let i = 0; i < backSideToSide.length ; i++){
        SideToinSide[i].style.display = "none"
    }
}

for(let i = 0; i < exitSidebbar.length; i++){
    exitSidebbar[i].addEventListener('click', (e)=>{
        containterHeader.style.animation  = "sidebarMoveReverse .3s linear forwards"
        closeSideToinSide()
    })
}

const displaySideToinSide = () => {
    window.innerWidth > 750 ? "flex" : "none"
}

window.addEventListener("resize", (e)=>{
    HideFlexInputSearchHeader()
    resizeItem()
    closeSideToinSide()
})

