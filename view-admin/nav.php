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
              <a href="tourpackages.php">
                  <i class="fa-solid fa-globe"></i>
                  <span class="link">Tour packages</span>
              </a>
              <span class="desc">Tour packages</span>
          </li>
          <li>
              <a href="tourbooking.php">
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
              <a href="touristdetails.php">
                  <i class="fa-solid fa-globe"></i>
                  <span class="link">Tourists</span>
              </a>
              <span class="desc">Tourist Details</span>
          </li>
          
          <li>
              <a href="payment.php">
                  <i class="fa-solid fa-file-invoice-dollar"></i>
                  <span class="link">Payments</span>
              </a>
              <span class="desc">Payment</s=pan>
          </li>
          <li>
              <a href="trash.php">
                  <i class="fa-solid fa-trash"></i>
                  <span class="link">Recently deleted</span>
              </a>
              <span class="desc">Recently Deleted</s=pan>
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