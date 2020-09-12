// document.getElementById('user-menu-toggle').onclick = function(){
//     document.getElementById("user-menu-context").classList.toggle("hidden");
// }
//
// document.getElementById('nav-toggle').onclick = function(){
//     document.getElementById("nav-context").classList.toggle("hidden");
// }


$('#user-menu-toggle').click(function () {
    $('#user-menu-context').toggle('.hidden');
})

$('#nav-toggle').click(function () {
    $('#nav-context').toggle('.hidden');
})

// window.addEventListener('click', function(e) {
//     // var els = document.getElementsByClassName('c-tw-js');
//     //
//     // for (var i = 0; i < els.length; i++) {
//     //     if (els[i].contains(e.target)) {
//     //         // Clicked on dropdown
//     //     } else {
//     //         // Clicked outside the dropdown
//     //         els[i].classList.remove('active');
//     //     }
//     // }
//
//     var els = document.querySelectorAll('.c-tw-js.hidden');
//
//     for (var i = 0; i < els.length; i++) {
//         if (els[i].contains(e.target)) {
//             // Clicked on dropdown
//         } else {
//             // Clicked outside the dropdown
//             els[i].toggle('.hidden')
//         }
//     }
// });
