const body = document.querySelector("body")
      modeToggle = body.querySelector(".mode-toggle");
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle");

let getMode = localStorage.getItem("mode");
if(getMode && getMode ==="dark"){
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}



modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})



function openOptions (){
   const  options = document.getElementById('dropdown-menu');
   if (options.style.display === "none") {
    options.style.display = "block";
    options.style.opacity = '1';
} else {
    options.style.display = "none";
    options.style.opacity = '0';
  }

}

const options = document.querySelector('.dropdown-menu');
const filterBtn = document.querySelector('#filter');
console.log(options, filterBtn)
if (options) {
    filterBtn.onclick = () => {
        options.classList.toggle('active');
    }
}