// window.addEventListener("DOMContentLoaded", function () {
//     // var updatePostButton = document.getElementById("updatePostButton");
//     // var updatePostForm = document.getElementById("updatePostForm");
//     // updatePostButton.addEventListener("click", function () {
//     //     updatePostForm.submit();
//     // });
//     var replyBtns = document.querySelectorAll(".replyBtn");
//     var replyField = document.querySelector(".replyField");
//     replyBtns.forEach(function (replyBtn) {
//         replyBtn.addEventListener("click", function () {
//             var forms = document.getElementsByClassName("replyForm");
//             forms.forEach((form) => {
//                 if (form.style.display === "none") {
//                     form.style.display = "block";
//                 } else {
//                     form.style.display = "none";
//                 }
//             });
//         });
//     });
// });

function btnReply(id, user) {
    let form = document.getElementById(id);
    if (form.style.display === "none") {
        form.style.display = "block";
    } else {
        form.style.display = "none";
    }
}
