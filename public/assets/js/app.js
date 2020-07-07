const notification = document.getElementById("notification");

if (notification) {
    notification.innerHTML += '<p id="off">X</p>';
    const off = document.getElementById("off");
    off.style.cursor = "pointer";

    off.addEventListener("click", e => {
        e.preventDefault()

        notification.style.display = "none";
    });
}