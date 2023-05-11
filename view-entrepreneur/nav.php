<div class="sidebar">
      <div class="logo-details">
          <div class="logo_name">WELCOME !!!</div>
          <i class="fa-solid fa-bars" style="color:white;" id="btn"></i>
      </div>
      <ul class="nav-list">
          <li>
              <a href="dashboard.php">
              <i class="fa fa-th-large"></i>
                  <span class="links_name">Dashboard</span>
              </a>
              <span class="tooltip">Dashboard</span>
          </li>
          
          <li>
              <a href="product.php">
                  <i class="fa-solid fa-star"></i>
                  <span class="links_name">Craft Products</span>
              </a>
              <span class="tooltip">Craft Products</span>
          </li>
          <li>
              <a href="productCategory.php">
              <i class="fa-solid fa-list"></i>
                  <span class="links_name">Product Categories</span>
              </a>
              <span class="tooltip">Product Categories</span>
          </li>
          <li>
              <a href="order.php">
                  <i class="fas fa-shopping-cart"></i>
                  <span class="links_name">Craft Orders</span>
              </a>
              <span class="tooltip">Craft Orders</span>
          </li>
          <li>
              <a href="payment.php">
              <i class="fa-solid fa-receipt"></i>
                  <span class="links_name">Payments</span>
              </a>
              <span class="tooltip">Payments</span>
          </li>
          <hr style="margin-top:250px;">
          <div>
              <a href="../api/logout.php">
                  <i class="fa-solid fa-right-from-bracket" style:></i>
                  <span class="link">Sign-out</span>
              </a>
              <span class="tooltip">Sign-out</span>
          </div>
      </ul>
  </div>
  <script>
let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");
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