  <div class="sidebar">
      <div class="intro">
          <div class="welcome">WELCOME !!!</div>
          <i class="fa-solid fa-bars" style="color:white;" id="btn"></i>
      </div>
      <ul class="nav">
          <li>
              <a href="dashboard.php">
                  <i class="fa fa-th-large"></i>
                  <span class="link">Dashboard</span>
              </a>
              <span class="desc">Dashboard</span>
          </li>
          <li>
              <a href="tourpackages2.php">
                  <i class="fa-solid fa-globe"></i>
                  <span class="link">Tour packages</span>
              </a>
              <span class="desc">Tour packages</span>
          </li>
          <li>
              <a href="tourbooking2.php">
                  <i class="fa-sharp fa-solid fa-suitcase"></i>
                  <span class="link">Tour Bookings</span>
              </a>
              <span class="desc">Tour Bookings</span>
          </li>
          <li>
              <a href="manageusers.php">
                  <i class="fa-sharp fa-solid fa-calendar-days"></i>
                  <span class="link">Manage Users</span>
              </a>
              <span class="desc">Manage Users</span>
          </li>
          <li>
              <a href="tourguides.php">
                  <i class="fa-sharp fa-solid fa-address-book"></i>
                  <span class="link">Tourist Guides</span>
              </a>
              <span class="desc">Tourist Guides</span>
          </li>
          <li>
              <a href="admins.php">
                  <i class="fa-solid fa-receipt"></i>
                  <span class="link">Administration</span>
              </a>
              <span class="desc">Administration</span>
          </li>

          <hr>
          <div>
              <a href="../api/alogout.php">
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