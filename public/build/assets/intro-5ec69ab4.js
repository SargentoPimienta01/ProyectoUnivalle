let s=document.querySelector(".intro"),o=document.querySelectorAll(".logo-parts");window.addEventListener("DOMContentLoaded",()=>{setTimeout(()=>{o.forEach((e,t)=>{setTimeout(()=>{e.classList.add("active")},(t+1)*100)}),setTimeout(()=>{o.forEach((e,t)=>{setTimeout(()=>{e.classList.remove("active"),e.classList.add("fade")},(t+1)*50)})},2e3),setTimeout(()=>{s.style.top="100vh"},2300)})});
