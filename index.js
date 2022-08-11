const d = document,
menu = d.querySelector("header>div"),
nav = d.querySelector("header>nav"),
spans = d.querySelectorAll("div>span"),
ul = nav.querySelector("ul");
headerAnchors = nav.querySelectorAll("ul>li>a");

d.addEventListener("DOMContentLoaded",()=>{
  d.addEventListener("click",click);
  window.addEventListener("resize",resize);
  if(window.innerWidth <= 768){
    menuResponsive();
  }
  
});

const resize = (e) => {
  if(window.innerWidth > 768){
    menuResponsive2();
  }else{
    menuResponsive();
  }
}

const click = (e) => {
  if(e.target.matches(".divMenu") || e.target.matches(".divMenu>*")){
    ["-translate-y-1","rotate-45"].forEach( togCls => {
      spans[0].classList.toggle(togCls);
    });
    ["invisible","opacity-0"].forEach( togCls => {
      spans[1].classList.toggle(togCls);
    });
    ["translate-y-1", "-rotate-45"].forEach( togCls =>{
      spans[2].classList.toggle(togCls);
    });
    nav.classList.toggle("hidden");
  }
}

const menuResponsive = () => {
  menu.classList.remove("hidden");
  nav.classList.add("hidden");
  nav.classList.add("block","absolute","w-full","top-full","left-0");
  ul.classList.add("flex-col","items-stretch");
  headerAnchors.forEach(a => {
    a.classList.add("border-b-2","border-b-slate-50");
    a.classList.remove("rounded-md");
  });
}

const menuResponsive2 = () => {
  menu.classList.add("hidden");
  nav.classList.remove("hidden");
  nav.classList.remove("block","absolute","w-full","top-full","left-0");
  ul.classList.remove("flex-col","items-stretch");
  headerAnchors.forEach(a => {
    a.classList.remove("border-b-2","border-b-slate-50");
    a.classList.add("rounded-md");
  });
  spans[0].classList.remove("-translate-y-1","rotate-45")
  spans[1].classList.remove("invisible","opacity-0");
    spans[2].classList.remove("translate-y-1", "-rotate-45");
}