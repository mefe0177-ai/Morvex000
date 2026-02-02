document.querySelectorAll('button').forEach(b=>{
 b.onmouseenter=()=>b.style.transform='scale(1.05)';
 b.onmouseleave=()=>b.style.transform='scale(1)';
});