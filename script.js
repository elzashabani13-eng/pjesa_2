document.addEventListener("DOMContentLoaded",()=>{
    let i=0;
    const slides=document.querySelectorAll(".slide");
    if(slides.length===0) return;
    function show(n){
        slides.forEach((s,idx)=>s.style.display=idx===n?"block":"none");
    }
    show(i);
    setInterval(()=>{ i=(i+1)%slides.length; show(i); },3000);
});