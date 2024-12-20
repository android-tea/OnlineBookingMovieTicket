<?php

$movieId = null;

if(isset($_POST["movieId"])){

    $movieId = $_POST["movieId"];

    // echo "<script>alert('$movieId');</script>";

    $pdo = require __DIR__ . ("/db.php");

    require __DIR__ . ("/functions.php");

    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Timings</title>
    <link rel="stylesheet" href="../css/Timings.css">
    <script src="../js/timings.js"></script>
</head>
<body>

    <div>
        <div class="navbar">
            <!-- Navigation -->
            <div class="nav-left"> 
                <img src="../pics/logo.png" alt="logo" class="logo">
            </div>
            <div class="nav-center">
                <nav>
                    <a href="homepage.php" id="home">Home</a>
                    <a href="schedmenu.html" id="schedule">Schedule</a>
                    <a href="cinemas.html" id="cinemas">Cinemas</a>
                    <a href="eventsandexp.html" id="eventsandexp">Events and Experiences</a>
                </nav>
            </div>
            <div class="nav-right">
                <a href="#notification"><img src="../pics/notif (1).png" id="notifBox" alt="Notifications"></a>
                <a href="profile"><img src="../pics/profile (1).png" id="profileBox" alt="Profile"></a>
            </div>
        </div>
        
        <!-- Main Form -->

        <div>
            
        </div>
        <form id="timingsForm" class="timings-form" action="confirmDetails.php" method="POST">
           <div>
            <div class="timings">
                <h2>Schedule</h2>
                <br>
                <div class="location">
                    <label for="location">Location</label>
                    <select id="location" name="location" required>
                        <option value="">Choose Cinema Location</option>
                        <option value="Taguig City">Taguig City</option>
                        <option value="Tagaytay">Tagaytay</option>
                        <option value="Cavite">Cavite</option>
                        <option value="Bulacan">Bulacan</option>
                        <option value="Makati City">Makati City</option>
                        <option value="Quezon City">Quezon City</option>
                        <option value="Pasig City">Pasig City</option>
                        <option value="Las Piñas">Las Piñas</option>
                        <option value="Parañaque">Parañaque</option>
                        <option value="Marikina">Marikina</option>
                        <option value="Cebu City">Cebu City</option>
                        <option value="Davao City">Davao City</option>
                        <option value="Iloilo City">Iloilo City</option>
                        <option value="Baguio City">Baguio City</option>
                        <option value="Antipolo City">Antipolo City</option>
                        <option value="Muntinlupa">Muntinlupa</option>
                        <option value="San Juan City">San Juan City</option>
                        <option value="Zamboanga City">Zamboanga City</option>
                        <option value="Laoag City">Laoag City</option>
                        <option value="Tarlac City">Tarlac City</option>
                        
                    </select>
                </div>
            
                <!-- Date Selector -->
                <div class="date-bigBox">

                    <input type="hidden" name="year" value="<?= date("Y") ?>">
            
                    <label for="Month">Month</label>
                    <select id="Month" name="month" required>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
            
                    <label for="Date">Date</label>
                    <select id="Date" name="day" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                </div>
                <br><br>
                <div class="show-time-container">
                    <label>Show Time</label>
                    <div class="show-time-buttons">
                        <button type="button" onclick="setShowTime('9:00 AM')" class="time-option">9:00 AM</button>
                        <button type="button" onclick="setShowTime('12:00 PM')" class="time-option">12:00 PM</button>
                        <button type="button" onclick="setShowTime('3:00 PM')" class="time-option">3:00 PM</button>
                        <button type="button" onclick="setShowTime('4:00 PM')" class="time-option">4:00 PM</button>
                        <button type="button" onclick="setShowTime('5:00 PM')" class="time-option">5:00 PM</button>
                        <button type="button" onclick="setShowTime('6:00 PM')" class="time-option">6:00 PM</button>
                        <button type="button" onclick="setShowTime('7:00 PM')" class="time-option">7:00 PM</button>
                    </div>
                    <input type="hidden" id="showTime" name="showTime" required>


                    
                 <!--SELECTING SEAT-->
<div>
    <body2>
        <div class="movie-container">
            <label>Select a Seat(s): </label>
           
       </div>

       <ul class="showcase">
           <li>
               <div class="seat"></div>
               <small>Available</small>
           </li>
           <li>
               <div class="seat selected"> </div>
               <small>Selected</small>
              
           </li>
           <li>
               <div class="seat sold"></div>
               <small>Sold</small>
           </li>
           <li>
             <div class="seat vip"></div>
             <small>VIP</small>
           </li>
           <li>
            <div class="seat accessible"></div>
            <small>Accessible</small>
           </li>
       </ul>

       <div class="container">

<div class="row VIP"> 
    <div class="seat vip" onclick="setSeatId('A1')" data-value="350"></div>
    <div class="seat vip" onclick="setSeatId('A2')" data-value="350"></div>
    <div class="seat vip" onclick="setSeatId('A3')" data-value="350"></div>
    <div class="seat vip" onclick="setSeatId('A4')" data-value="350"></div>
    <div class="seat vip" onclick="setSeatId('A5')" data-value="350"></div>
    <div class="seat vip" onclick="setSeatId('A6')" data-value="350"></div>
    <div class="seat vip" onclick="setSeatId('A7')" data-value="350"></div>
    <div class="seat vip" onclick="setSeatId('A8')" data-value="350"></div>
</div>

<div class="row">
    <div class="seat" onclick="setSeatId('B1')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('B2')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('B3')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('B4')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('B5')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('B6')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('B7')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('B8')" data-value="270"></div>
</div>

<div class="row">
    <div class="seat sold" onclick="setSeatId('C1')" data-value="0"></div>
    <div class="seat" onclick="setSeatId('C2')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('C3')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('C4')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('C5')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('C6')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('C7')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('C8')" data-value="270"></div>
</div>

<div class="row">
    <div class="seat" onclick="setSeatId('D1')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('D2')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('D3')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('D4')" data-value="270"></div>
    <div class="seat sold" onclick="setSeatId('D5')" data-value="0"></div>
    <div class="seat sold" onclick="setSeatId('D6')" data-value="0"></div>
    <div class="seat" onclick="setSeatId('D7')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('D8')" data-value="270"></div>
</div>

<div class="row">
    <div class="seat" onclick="setSeatId('E1')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('E2')" data-value="270"></div>
    <div class="seat sold" onclick="setSeatId('E3')" data-value="0"></div>
    <div class="seat" onclick="setSeatId('E4')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('E5')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('E6')" data-value="270"></div>
    <div class="seat" onclick="setSeatId('E7')" data-value="270"></div>
    <div class="seat sold" onclick="setSeatId('E8')" data-value="0"></div>
</div>


<div class="row"> 
    <div class="seat accessible" onclick="setSeatId('G1')" data-value="250"></div>
    <div class="seat accessible" onclick="setSeatId('G2')" data-value="250"></div>
    <div class="seat accessible" onclick="setSeatId('G3')" data-value="250"></div>
    <div class="seat accessible" onclick="setSeatId('G4')" data-value="250"></div>
    <div class="seat accessible" onclick="setSeatId('G5')" data-value="250"></div>
    <div class="seat accessible" onclick="setSeatId('G6')" data-value="250"></div>
    <div class="seat accessible" onclick="setSeatId('G7')" data-value="250"></div>
    <div class="seat accessible" onclick="setSeatId('G8')" data-value="250"></div>
</div>
       </div>

       <p class="text">
            <span id="count">0</span> Ticket(s)   P
            <span id="total">P</span>
       </p>

       <input type="hidden" id="seatList" name="seatList" required>
       <input type="hidden" id="totalPrice" name="totalPrice" required>
       <input type="hidden" id="movieId" name="movieId" value="<?= $movieId ?>" >

    </body2>
    </div>
        
</div>

 </div>
            </div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.container');
    const seats = document.querySelectorAll('.row .seat:not(.sold)');
    const count = document.getElementById('count');
    const total = document.getElementById('total');
    const seatType = document.getElementById('seatType');
    const showTimeInput = document.getElementById('showTime');

    const seatPrices = { vip: 350, accessible: 250, default: 270 };
    let selectedSeats = [];

    function updateSummary() {
        const seatCount = selectedSeats.length;
        const totalAmount = selectedSeats.reduce((sum, seat) => {
            const type = seat.classList.contains('vip')
                ? 'vip'
                : seat.classList.contains('accessible')
                ? 'accessible'
                : 'default';
            return sum + seatPrices[type];
        }, 0);

        count.textContent = seatCount;
        total.textContent = totalAmount.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
        document.getElementById('totalPrice').value = total.textContent;
    }

    container.addEventListener('click', (e) => {
        if (e.target.classList.contains('seat') && !e.target.classList.contains('sold')) {
            e.target.classList.toggle('selected');
            if (e.target.classList.contains('selected')) {
                selectedSeats.push(e.target);
            } else {
                selectedSeats = selectedSeats.filter((s) => s !== e.target);
            }
            updateSummary();
        }
    });

    seatType.addEventListener('change', () => {
        const selectedSeats = document.querySelectorAll('.row .seat.selected');
        selectedSeats.forEach((seat) => {
            seat.classList.remove('selected');
        });
        selectedSeats.length = 0;
        updateSummary();
    });

    function toggleActive(button) {
        const buttons = button.parentNode.querySelectorAll('button');
        buttons.forEach((btn) => btn.classList.remove('active'));
        button.classList.add('active');
    }

    function setShowTime(time) {
        showTimeInput.value = time;
    }

    window.toggleActive = toggleActive;
    window.setShowTime = setShowTime;

    updateSummary();
});


</script>


            
            
            <!-- Footer -->
            <footer>
                <div class="button-container">
                    <button class="btn btn-primary" type="submit" name="submit">Next</button>
               </div>
            </footer>
        </form>
    </div>

    <script>
        // Set selected showtime in hidden input
        function setShowTime(time) {
            document.getElementById('showTime').value = time;
        }

        function setSeatId(id) {
       // Get the input element by ID
        let inputElement = document.getElementById("seatList");
  
        if (!inputElement) {
           console.error('Element with id "seatList" not found.');
           return;
        }

        // Get the current value of the input
        let currentValue = inputElement.value.trim();

        if (currentValue === "") {
        // If input is empty, add the seat ID as the first value
        inputElement.value = id;
        } else {
        // Split the current value into an array
        let seatArray = currentValue.split(",");

        if (seatArray.includes(id)) {
            // If the seat ID exists, remove it
            seatArray = seatArray.filter(seat => seat !== id);
        } else {
            // If the seat ID does not exist, add it
            seatArray.push(id);
        }

        // Update the input value
        inputElement.value = seatArray.join(",");
    }
}



    function redirectToConfirmation(event) {
        event.preventDefault();

        const location = document.getElementById('location').value;
        const day = document.getElementById('Day').value;
        const month = document.getElementById('Month').value;
        const date = document.getElementById('Date').value;
        const showTime = document.getElementById('showTime').value;
        const price = document.getElementById('seatType').value; // Get the price directly

        const queryString = `?location=${encodeURIComponent(location)}&day=${encodeURIComponent(day)}&month=${encodeURIComponent(month)}&date=${encodeURIComponent(date)}&showTime=${encodeURIComponent(showTime)}&price=${encodeURIComponent(price)}`;
        window.location.href = `test2.html${queryString}`;
        }


    </script>

</body>
</html>
