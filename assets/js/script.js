const addBtn = document.querySelector(".add");
const input = document.querySelector(".row");



function addInput(){
    const architecture_id = document.createElement("input");
    architecture_id.type="text";
    
    const object_pin_name = document.createElement("input");
    object_pin_name.type="text";

    const btn=document.createElement("a");
    btn.className="delete";
    btn.innerHTML="&times";

    const flex=document.createElement("div");
    flex.className="flex";

    input.appendChild(flex);
    input.appendChild(architecture_id);
    input.appendChild(object_pin_name);
    input.appendChild(btn);
}
addBtn.addEventListener("click", addInput);
