 // Navigate to Payment Page
 function goToTicket() {
    window.location.href = '6.html';
}

// Highlight Selected Button and Save the Selection
function toggleActive(button, groupClass) {
    let buttons = document.querySelectorAll(`.${groupClass}`);
    buttons.forEach(btn => btn.classList.remove('active')); // Remove 'active' from all buttons
    button.classList.add('active'); // Add 'active' to clicked button

    if (groupClass === 'time-option') {
        let selectedTime = button.innerText;
        storeSelectedTime(selectedTime);
    }
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

        window.location.href = 'ticket_receipt.html';
    }

<button onclick="saveData()">Next</button>



                function setShowTime(time) {
                    document.getElementById('showTime').value = time;
              }
        
            