addEventListener('submit', () => {
    let time = new Date()
    let d = `${time.getDate()}/${time.getMonth() + 1}/${time.getFullYear()}`
    let h = `${time.getHours()} : ${time.getMinutes()}`
    document.getElementById("date").value = d;
    document.getElementById("hour").value = h;
})