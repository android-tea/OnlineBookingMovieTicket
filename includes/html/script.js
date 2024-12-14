// Select necessary DOM elements
const seats = document.querySelectorAll('.seat:not(.sold)');
const count = document.getElementById('count');
const total = document.getElementById('total');

// Initialize seat prices
const seatPrices = {
  vip: 350,
  accessible: 250,
  default: 270
};

// Variables to keep track of selected seats and total price
let selectedSeats = [];
let totalPrice = 0;

// Function to update the total and count display
function updateSummary() {
  const seatCount = selectedSeats.length;
  const totalAmount = selectedSeats.reduce((sum, seat) => {
    const seatType = seat.classList.contains('vip')
      ? 'vip'
      : seat.classList.contains('accessible')
      ? 'accessible'
      : 'default';
    return sum + seatPrices[seatType];
  }, 0);

  count.textContent = seatCount;
  total.textContent = totalAmount.toLocaleString('en-US', { style: 'currency', currency: 'PHP' });
}

// Event listener for seat selection
seats.forEach((seat) => {
  seat.addEventListener('click', () => {
    // Toggle selection
    seat.classList.toggle('selected');

    // Update the selectedSeats array
    if (seat.classList.contains('selected')) {
      selectedSeats.push(seat);
    } else {
      selectedSeats = selectedSeats.filter((s) => s !== seat);
    }

    // Update the UI summary
    updateSummary();
  });
});

// Initialize UI
updateSummary();


function saveSeatInfo() {
  // Get selected seat and price
  const seat = document.getElementById('seat').value;
  const price = document.getElementById('price').value;

  // Save data to localStorage
  localStorage.setItem('selectedSeat', seat);
  localStorage.setItem('ticketPrice', price);

  // Redirect to Payment Summary page
  window.location.href = 'payment-summary.html';
}


