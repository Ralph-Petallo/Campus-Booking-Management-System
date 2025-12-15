document.querySelectorAll('.download-btn').forEach(button => {
    button.addEventListener('click', function () {
        const bookingId = this.dataset.bookingId;
        const element = document.getElementById('booking-' + bookingId);

        const opt = {
            margin: 0.5,
            filename: `booking_confirmation_${bookingId}.pdf`,
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        };

        html2pdf().set(opt).from(element).save();
    });
});
