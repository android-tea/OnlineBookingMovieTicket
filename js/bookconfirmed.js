function downloadTicket() {
    const location = document.getElementById('location').textContent;
    const day = document.getElementById('day').textContent;
    const month = document.getElementById('month').textContent;
    const date = document.getElementById('date').textContent;
    const showTime = document.getElementById('showTime').textContent;
    const ticketNumber = document.getElementById('ticketNumber').textContent;

    const ticketContent = `
    Location: ${location}
    Day: ${day}
    Month: ${month}
    Date: ${date}
    Show Time: ${showTime}
    Ticket Number: ${ticketNumber}
    `;
    const blob = new Blob([ticketContent], { type: 'text/plain' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = `Ticket_${ticketNumber}.txt`;
    link.click();
}
/*
        alert("Please generate a ticket before downloading.");
        return;
    }

    ------------------- CINEMUST TICKET -------------------
    Location: ${location}
    Day: ${day}
    Month: ${month}
    Date: ${date}
    Show Time: ${showTime}
    Ticket Number: ${ticketNumber}

    ⌛ Reminder: ⌛
    - Present this ticket at the counter.
    - Be on time or arrive 15 minutes early.
    - Enjoy your movie!

    -----------------------------------------------------

    Thank you for booking with Cinemust!
    `;

  
}*/

