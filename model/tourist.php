<?php
require_once "../db/db_connection.php";

class tourist extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    private function getData($query)
    {
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            die('Error in query: ' . mysqli_error());
        }
        $data = array();
        while ($row = mysqli_fetch_array($result)) {
            $data[] = $row;
        }
        return $data;
    }
    public function validate($username, $password)
    {
        $query = "SELECT * FROM tourist where email='$username' and password='$password'";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }

    public function insertTourist($inputs)
    {

        $query = "INSERT INTO tourist (name, address, email, phone, profileImg,  password, dob, country) VALUES ('$inputs[0]', '$inputs[1]', '$inputs[2]', '$inputs[3]', '$inputs[4]', '$inputs[5]', '$inputs[6]','$inputs[7]')";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getallproducts()
    {
        $query = "SELECT * FROM product";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }

    public function getproduct($id)
    {
        $query = "SELECT * FROM product WHERE productID='$id'";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
    public function insertToCart($quantity, $productID, $touristID)
    {
        $query = "INSERT INTO cart_item (quantity, productID, tourist_ID) VALUES ('$quantity', '$productID' , '$touristID')";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function getallcartitems()
    {
        $t_id = $_SESSION['touristID'];
        $query = "SELECT * FROM cart_item WHERE tourist_ID='$t_id'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }

    public function checkmail($email)
    {
        $query = "SELECT * FROM tourist where email='$email'";

        $stmt = mysqli_query($this->conn, $query);
        $rows = mysqli_fetch_array($stmt);
        return $rows;
    }

    public function checkproid($id)
    {
        $query = "SELECT * FROM cart_item where productID='$id'";
        $stmt = mysqli_query($this->conn, $query);
        $rows = mysqli_num_rows($stmt);
        return $rows;
    }

    public function updateToCart($quan, $productID, $tourist_id)
    {
        $query = "SELECT quantity FROM cart_item where productID='$productID'";
        $stmt = mysqli_query($this->conn, $query);
        $quantity = mysqli_fetch_assoc($stmt);
        $q = intval($quantity['quantity']);

        $q2 = intval($quan);
        $u_quantity = $q + $q2;
        $sql2 = "UPDATE cart_item SET quantity='$u_quantity' WHERE productID='$productID'";
        $stmt2 = mysqli_query($this->conn, $sql2);
        return $stmt2;
    }

    public function viewtourist()
    {
        $sql = "SELECT * from tourist";
        $stmt = mysqli_query($this->conn, $sql);
        return $stmt;
    }

    public function viewAllHotels()
    {
        $sql = "SELECT * from hotel where status='1'";
        return $this->getData($sql);
    }
    public function viewHotel($id)
    {
        $sql = "SELECT * from hotel where hotelID='$id'";
        $stmt = mysqli_query($this->conn, $sql);
        return $stmt;

    }
    public function viewAllRoomTypes($id)
    {
        $query = "Select * from roomtype r, roomtype_img i, hotel h where i.roomTypeId=r.roomTypeId and r.hotelID=h.hotelID and h.hotelID='$id'";
        return $this->getData($query);
    }
    public function searchRoom($id, $person, $room)
    {
        $query = "SELECT * FROM room r, roomtype t, hotel h WHERE r.typeID=t.roomTypeId AND r.hotelID=h.hotelID AND h.hotelID='$id' AND t.typeName='$room' AND r.noOfPersons='$person'";
        $stmt = mysqli_query($this->conn, $query);
        $results = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
        return $results;

    }
    public function availability($checkin, $checkout, $room)
    {
        $query = "SELECT * FROM guest_reservation WHERE ((
                    '$checkin' >= DATE_FORMAT(`checkInDate`,'%Y-%m-%d')
                    AND  '$checkin' <= DATE_FORMAT(`checkOutDate`,'%Y-%m-%d')
                    )
                    OR (
                    '$checkout' >= DATE_FORMAT(`checkInDate`,'%Y-%m-%d')
                    AND  '$checkout' <= DATE_FORMAT(`checkOutDate`,'%Y-%m-%d')
                    )
                    OR (
                    DATE_FORMAT(`checkInDate`,'%Y-%m-%d') >=  '$checkin'
                    AND DATE_FORMAT(`checkInDate`,'%Y-%m-%d') <=  '$checkout'
                    )
                    )
                    AND roomID ='$room'";
        $stmt = mysqli_query($this->conn, $query);
        $results = mysqli_fetch_all($stmt, MYSQLI_ASSOC);

        return $results;

    }

    public function insertReservation($guestName, $guestPhone, $guestEmail, $total_amount, $checkInDate, $checkOutDate, $touristID, $roomno, $hotelId)
    {
        $query = "INSERT INTO guest_reservation (bookingDateTime, guestName, guestPhone, guestEmail, status, total_amount, checkInDate, checkOutDate,touristID, roomID,hotelId) VALUES (NOW(), '$guestName', '$guestPhone', '$guestEmail', 'Confirmed', '$total_amount', '$checkInDate', '$checkOutDate', '$touristID', '$roomno', '$hotelId')";
        $stmt = mysqli_query($this->conn, $query);
        if ($stmt) {
            $reslId = mysqli_insert_id($this->conn); // get the reservation ID
            $query1 = "INSERT INTO hotel_payment (paymentDateTime, type, amount, paymentStatus, reservationID) VALUES (NOW(), 'Card',  '$total_amount', 'Completed','$reslId')";
            $stmt = mysqli_query($this->conn, $query1);
            return $stmt;
        } else {
            print("error");
        }

    }
    public function insertTourBooking($name, $phone, $email, $total_amount, $aDate, $dDate, $guests, $touristID, $packageId)
    {
        $query = "INSERT INTO tourbooking (bookingDateTime, bookingStatus, guestName, guestPhone, guestEmail, arrivalDate, departureDate, noOfGuests, tourPkgID, touristID) VALUES (NOW(), 'Pending', '$name', '$phone', '$email', '$aDate', '$dDate','$guests', '$packageId', '$touristID')";
        $stmt = mysqli_query($this->conn, $query);
        if ($stmt) {
            $bookingId = mysqli_insert_id($this->conn); // get the booking ID
            $query1 = "INSERT INTO tourbooking_payment (paymentDateTime, amount, paymentStatus, tourBookingId) VALUES (NOW(), '$total_amount', 'Completed','$bookingId')";
            $stmt = mysqli_query($this->conn, $query1);
            return $stmt;
        } else {
            $error = mysqli_error($this->conn);
            return "Error: $error";
        }

    }
    public function insertCraftOrder($touristID, $productId, $qty, $name, $phone, $address)
    {

       // $query = "INSERT INTO craftorder(`orderID`, `orderDateTime`, `status`, `touristID`, `productID`, `orderQuantity`, `customerName`, `customerPhone`, `customerAddress`) VALUES (, NOW(),'Confirmed', '$touristID', '$productId', '$qty', '$name', '$phone', '$address')";
         $query = "INSERT INTO craftorder (orderDateTime, status, touristID, productID, orderQuantity, customerName, customerPhone, customerAddress,orderPaymentID) VALUES (NOW(), 'Pending', '$touristID', '$productId', '$qty','$name','$phone','$address',NULL)";
        $stmt = mysqli_query($this->conn, $query);
        if (!$stmt) {
            echo "Error: " . mysqli_error($this->conn);
            return false; // or handle the error in an appropriate way
        }
        return $stmt;
    }
    public function insertOrderPayment($total)
    {
       $query = "INSERT INTO craftorder_payment(paymentDateTime, amount, paymentStatus) VALUES (NOW(), '$total','Completed')";
        $stmt = mysqli_query($this->conn, $query);
        if (!$stmt) {
            echo "Error: " . mysqli_error($this->conn);
            return false; // or handle the error in an appropriate way
        }
        return $stmt;
    }

    public function insertReservationatSite($guestName, $guestPhone, $guestEmail, $total_amount, $checkInDate, $checkOutDate, $touristID, $roomno, $hotelId)
    {
        $query = "INSERT INTO guest_reservation (bookingDateTime, guestName, guestPhone, guestEmail, status, total_amount, checkInDate, checkOutDate,touristID, roomID,hotelId) VALUES (NOW(), '$guestName', '$guestPhone', '$guestEmail', 'Pending', '$total_amount', '$checkInDate', '$checkOutDate', '$touristID', '$roomno', '$hotelId')";
        $stmt = mysqli_query($this->conn, $query);
        // $stmt = $this->conn->prepare($query);
        // $stmt->bind_param("ssssissiii",);
        // $stmt->execute();
        return $stmt;
    }
    
    public function viewProfile($id)
    {
        //    $query = "Select * from roomtype p, hotel h where p.hotelID=h.hotelID and roomTypeId = '$pId'";
        $query = "Select * from tourist where userID = '$id'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
    public function viewTouristProfile($id)
    {
        $query = "Select * from tourist where userID = '$id'";
        return $this->getData($query);

    }
    public function viewReservation($id)
    {
        //    $query = "Select * from roomtype p, hotel h where p.hotelID=h.hotelID and roomTypeId = '$pId'";
        $query = "Select * from guest_reservation where reservationID = '$id'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }

    // Tour packages
    public function viewAllTourPackages()
    {
        $sql = "SELECT * from tourpackage";
        return $this->getData($sql);
    }
    public function viewTourPkg($pid)
    {
        $sql = "SELECT * from tourpackage where packageID='$pid'";
        $stmt = mysqli_query($this->conn, $sql);
        return $stmt;
    }
    public function viewAllTourImgs($id)
    {
        $query = "Select * from tourpackage_img i, tourpackage t where i.tourpackageId=t.packageID and i.tourpackageId='$id'";
        return $this->getData($query);
    }

    public function viewProduct($pId)
    {

        $query = "Select * from product where productID = '$pId'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }
    public function viewCartItems($cart)
    {
        if (is_array($cart)) {

            // $array_to_question_marks = implode(',', array_fill(0, count($cart), '?'));

            // $query = "SELECT * FROM product_img i, product p WHERE i.productID=p.productID AND p.productID IN ('$array_to_question_marks')";
            // return $this->getData($query);

            // $sql = "SELECT * FROM product_img i, product p WHERE i.productID=p.productID AND p.productID IN (";
            $sql = "SELECT * FROM product WHERE productID IN (";
            foreach ($cart as $id => $value) {
                $sql .= $id . ",";
            }
            $sql = substr($sql, 0, -1) . ") ORDER BY productID ASC";
            $stmt = mysqli_query($this->conn, $sql);
            return $stmt;

            // return $this->getData($sql);

        } else {
            return "Invalid cart data. Please provide a valid array.";

        }
    }

}
