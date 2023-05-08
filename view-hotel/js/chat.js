const searchBar = document.querySelector(".search input"),
  searchIcon = document.querySelector(".search button"),
  usersList = document.querySelector(".users-list");

searchIcon.onclick = () => {
  searchBar.classList.toggle("show");
  searchIcon.classList.toggle("active");
  searchBar.focus();
  if (searchBar.classList.contains("active")) {
    searchBar.value = "";
    searchBar.classList.remove("active");
  }
};
$(document).ready(function () {
  if (document.getElementById("scroll_messages")) {
    let div = document.getElementById("scroll_messages");
    div.scrollTop = div.scrollHeight;
  }
});
function search() {
  let filter = document.getElementById("find").value.toUpperCase();
  let hotel = document.querySelectorAll(".finder");
  let tag = document.getElementsByTagName("span");

  for (var i = 0; i <= tag.length; i++) {
    let x = hotel[i].getElementsByTagName("span")[0];
    let value = x.innerHTML || x.innerText || x.textContent;

    if (value.toUpperCase().indexOf(filter) > -1) {
      hotel[i].style.display = "";
    } else {
      hotel[i].style.display = "none";
    }
  }
}