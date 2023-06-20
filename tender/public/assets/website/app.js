// var searchBtn = document.getElementById("search-btn");
// var searchform = document.querySelector(".search-form");
// let latestAds = document.querySelectorAll(".latest-ads");
// let seebtn = document.getElementById("seebn");
// // searchBtn.addEventListener("click",()=>{
// //  document.querySelector(".header1 .search-form").classList.add("serch-form-active")
// // })
// searchBtn.onclick = () => {
//   searchform.classList.toggle("active");
// };
// window.onscroll = () => {
//   searchform.classList.remove("active");
//   if (window.scrollY > 140) {
//     document.querySelector("header .header2").classList.add("active");
//   } else {
//     document.querySelector("header .header2").classList.remove("active");
//   }
// };
// window.onload = () => {
//   if (window.scrollY > 80) {
//     document.querySelector("header .header2").classList.add("active");
//   } else {
//     document.querySelector("header .header2").classList.remove("active");
//   }
// };

// //login form
// var loginbtn = document.querySelector("#user");
// var crossbtn = document.querySelector("#cross");
// var loginform = document.querySelector(".login-form-container");
// loginbtn.addEventListener("click", () => {
//   loginform.classList.toggle("active");
// });
// crossbtn.addEventListener("click", () => {
//   loginform.classList.remove("active");
// });

// // swiper slide

// var swiper = new Swiper(".book-side", {
//   loop: true,
//   centeredSlides: true,
//   autoplay: {
//     delay: 9500,
//     disableOnInteraction: false,
//   },

//   breakpoints: {
//     0: {
//       slidesPerView: 1,
//       // spaceBetween: 20,
//     },
//     768: {
//       slidesPerView: 2,
//       // spaceBetween: 20,
//     },
//     1024: {
//       slidesPerView: 3,
//       // spaceBetween: 20,
//     },
//   },
// });

// //navigation slider

// var swiper = new Swiper(".featured-slider", {
//   spaceBetween: 10,
//   loop: true,
//   centeredSlides: true,
//   autoplay: {
//     delay: 9500,
//     disableOnInteraction: false,
//   },
//   navigation: {
//     nextEl: ".swiper-button-next",
//     prevEl: ".swiper-button-prev",
//   },
//   breakpoints: {
//     0: {
//       slidesPerView: 1,
//       // spaceBetween: 20,
//     },
//     768: {
//       slidesPerView: 2,
//       // spaceBetween: 20,
//     },
//     1024: {
//       slidesPerView: 3,
//       // spaceBetween: 20,
//     },
//   },
// });

// var swiper = new Swiper(".arrival-slider", {
//   spaceBetween: 10,
//   loop: true,
//   centeredSlides: true,
//   autoplay: {
//     delay: 9500,
//     disableOnInteraction: false,
//   },

//   breakpoints: {
//     0: {
//       slidesPerView: 1,
//       // spaceBetween: 20,
//     },
//     768: {
//       slidesPerView: 2,
//       // spaceBetween: 20,
//     },
//     1024: {
//       slidesPerView: 3,
//       // spaceBetween: 20,
//     },
//   },
// });

// var swiper = new Swiper(".review-parent", {
//   spaceBetween: 10,
//   loop: true,
//   centeredSlides: true,
//   autoplay: {
//     delay: 9500,
//     disableOnInteraction: false,
//   },

//   breakpoints: {
//     0: {
//       slidesPerView: 1,
//       // spaceBetween: 20,
//     },
//     768: {
//       slidesPerView: 2,
//       // spaceBetween: 20,
//     },
//     1024: {
//       slidesPerView: 3,
//       // spaceBetween: 20,
//     },
//   },
// });

// latestAds[0].style.display = "block";
// latestAds[1].style.display = "block";
// latestAds[2].style.display = "block";
// latestAds[3].style.display = "block";

// let showdiv = 3;
// seebtn.addEventListener("click", () => {
//   for (var i = showdiv; i <= showdiv + 4; i++) {
//     latestAds[i].style.display = "block";
//   }
//   showdiv = showdiv + 4;
// });
