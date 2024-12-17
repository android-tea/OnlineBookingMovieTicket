document.addEventListener('DOMContentLoaded', () => {
  const seats = document.querySelectorAll('.seat:not(.sold)');
  const count = document.getElementById('count');
  const total = document.getElementById('total');

  const seatPrices = { vip: 350, accessible: 250, default: 270 };
  let selectedSeats = [];

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
    total.textContent = totalAmount.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
  }

  seats.forEach((seat) => {
    seat.addEventListener('click', () => {
      seat.classList.toggle('selected');
      if (seat.classList.contains('selected')) {
        selectedSeats.push(seat);
      } else {
        selectedSeats = selectedSeats.filter((s) => s !== seat);
      }
      updateSummary();
    });
  });

  updateSummary();
});
 // Add active class to selected movie type or show time button
 function toggleActive(button) {
  const buttons = button.parentNode.querySelectorAll('button');
  buttons.forEach(btn => btn.classList.remove('active'));
  button.classList.add('active');
}

// Set the selected show time in the hidden input
function setShowTime(time) {
  document.getElementById('showTime').value = time;
}