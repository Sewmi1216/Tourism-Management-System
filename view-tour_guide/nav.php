  <div class="sidebar">
      <div class="intro">
          <div class="welcome">WELCOME !!!</div>
          <i class="fa-solid fa-bars" style="color:white;" id="btn"></i>
      </div>
      <ul class="nav">
          <li>
              <a href="Guide_Assign_tourists.php">
                  <i class="fa-solid fa-person"></i>
                  <span class="link">Assigned Tourists</span>
              </a>
              <span class="desc">Assigned Tourists</span>
          </li>
          <li>
              <a href="availability.php">
                  <i class="fa-solid fa-check"></i>
                  <span class="link">Update availability</span>
              </a>
              <span class="desc">Update availability</span>
          </li>

          <hr style="margin-top:440px;">
          <div>
              <a href="../api/logout.php">
                  <i class="fa-solid fa-right-from-bracket"></i>
                  <span class="link">Sign-out</span>
              </a>
              <span class="desc">Sign-out</span>
          </div>
      </ul>


  </div>

  <script>
let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");

closeBtn.addEventListener("click", () => {
    sidebar.classList.toggle("open");
    menuBtnChange();
});

function menuBtnChange() {
    if (sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
    } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
    }
}
  </script>