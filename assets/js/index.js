const el = document.getElementById('box');
console.log(el); // 👉️ div

const p = document.createElement('p');
console.log(p);
// ✅ works
el.appendChild(p);