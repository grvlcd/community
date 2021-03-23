function btnReply(id, user) {
    let form = document.getElementById(id);
    if (form.style.display === "none") {
        form.style.display = "block";
    } else {
        form.style.display = "none";
    }
}
