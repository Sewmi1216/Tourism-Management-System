  <div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">WELCOME !!!</div>
        <i class="fa-solid fa-bars" style="color:black;" id="btn" ></i>
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
       <a href="hotelPkg.php">
         <i class="fa-solid fa-hotel"></i>
         <span class="links_name">Hotel packages</span>
       </a>
       <span class="tooltip">Hotel packages</span>
     </li>
     <li>
       <a href="room.php">
         <i class="fa-sharp fa-solid fa-bed"></i>
         <span class="links_name">Rooms</span>
       </a>
       <span class="tooltip">Rooms</span>
     </li>
     <li>
       <a href="reservation.php">
         <i class="fa-sharp fa-solid fa-calendar-days"></i>
         <span class="links_name">Reservations</span>
       </a>
       <span class="tooltip">Reservations</span>
     </li>
     <li>
       <a href="reserveRoom.php">
         <i class="fa-sharp fa-solid fa-address-book"></i>
         <span class="links_name">Reserve room</span>
       </a>
       <span class="tooltip">Reserve room</span>
     </li>
     <li>
       <a href="payment.php">
         <i class="fa-solid fa-receipt"></i>
         <span class="links_name">Payments</span>
       </a>
       <span class="tooltip">Payments</span>
     </li>
    
    </ul>
  </div>
  
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  
  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>







