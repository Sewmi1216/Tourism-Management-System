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
              <a href="hotelPkg.php">
                  <i class="fa-solid fa-hotel"></i>
                  <span class="link">Hotel packages</span>
              </a>
              <span class="desc">Hotel packages</span>
          </li>
          <li>
              <a href="room.php">
                  <i class="fa-sharp fa-solid fa-bed"></i>
                  <span class="link">Rooms</span>
              </a>
              <span class="desc">Rooms</span>
          </li>
          <li>
              <a href="reservation.php">
                  <i class="fa-sharp fa-solid fa-calendar-days"></i>
                  <span class="link">Reservations</span>
              </a>
              <span class="desc">Reservations</span>
          </li>
          <li>
              <a href="reserveRoom.php">
                  <i class="fa-sharp fa-solid fa-address-book"></i>
                  <span class="link">Reserve room</span>
              </a>
              <span class="desc">Reserve room</span>
          </li>
          <li>
              <a href="payment.php">
                  <i class="fa-solid fa-receipt"></i>
                  <span class="link">Payments</span>
              </a>
              <span class="desc">Payments</span>
          </li>

          <hr>
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