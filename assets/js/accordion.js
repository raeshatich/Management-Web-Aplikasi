var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    for (var j = 0; j < acc.length; j++) {
        if (acc[j] !== this && acc[j].classList.contains("done")) {
            acc[j].classList.remove("done");
            acc[j].nextElementSibling.style.display = "none";
        }
    }

    this.classList.toggle("done");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      } 
  });
}

