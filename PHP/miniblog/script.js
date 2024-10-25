addEventListener('submit', () => {
    let time = new Date()
    let d = `${time.getDate()}/${time.getMonth() + 1}/${time.getFullYear()}`
    let h = `${time.getHours()} : ${time.getMinutes()}`
    document.getElementById("date").value = d;
    document.getElementById("hour").value = h;
})
document.getElementById("menu-button").addEventListener("click", function() {
    const menu = document.getElementById("menu-options");
    menu.style.display = menu.style.display === "block" ? "none" : "block";
});
  
window.addEventListener("click", function(event) {
    const menu = document.getElementById("menu-options");
    if (event.target !== document.getElementById("menu-button")) {
      menu.style.display = "none";
    }
});
