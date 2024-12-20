 // Navigate to Payment Page
 function goToTicket() {
    window.location.href = 'Schedule.html';
}
function saveData() {
    const location = document.getElementById('location').value;
    const day = document.getElementById('Day').value;
    const month = document.getElementById('Month').value;
    const date = document.getElementById('Date').value;
    const showTime = document.getElementById('showTime').value;

    localStorage.setItem('location', location);
    localStorage.setItem('day', day);
    localStorage.setItem('month', month);
    localStorage.setItem('date', date);
    localStorage.setItem('showTime', showTime);

    window.location.href = 'Schedule.html';
}

document.addEventListener('DOMContentLoaded', () => {
    if (window.location.pathname.endsWith('Schedule.html')) {
        window.location.href = 'ticket_receipt.html';
    }
});

<button onclick="saveData()">Next</button>



                function setShowTime(time) {
                    document.getElementById('showTime').value = time;
              }
              
            document.addEventListener('DOMContentLoaded', () => {
                const seatTypeList = document.querySelectorAll('.seat-type button');
                
                seatTypeList.forEach(seatTypeEl => {
                    seatTypeEl.addEventListener('click', () => {
                        // Remove 'special' class from all seat types
                        seatTypeList.forEach(el => el.classList.remove('special'));

                        // Add 'special' class to the clicked seat type
                        seatTypeEl.classList.add('special');
                    });
                });

                // Adding click outside functionality to maintain active state
                document.addEventListener('click', (event) => {
                    if (!event.target.closest('.seat-type')) {
                        // Deselect all buttons if clicked outside the button group
                        // Commented out to maintain active state
                        // seatTypeList.forEach(el => el.classList.remove('special'));
                    }
                });
            });
    


//seats JAVASCRIPT FOR SEAT PRICES
