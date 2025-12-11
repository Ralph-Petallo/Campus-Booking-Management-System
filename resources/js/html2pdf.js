document.getElementById('downloadBtn').addEventListener('click', function() {
    const element = document.getElementById('confirmationBox');
    
    // PDF options
    var opt = {
        margin:       0.5,
        filename:     'booking_confirmation.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
    };

    // Generate PDF
    html2pdf().set(opt).from(element).save();
});