const addBtn = document.querySelector('.add-btn');
const overlay = document.querySelector('.facilities-overlay');
const cancelBtn = document.getElementById('cancelBtn');
const form = document.getElementById('facilityForm');
const previewImg = document.getElementById('previewImg');

// Open add form
addBtn.addEventListener('click', () => {
    document.getElementById("modalTitle").textContent = "Add Facility";
    form.action = "facilities";
    form.reset();
    previewImg.src = "";
    overlay.style.display = 'flex';
});

// Close modal
cancelBtn.addEventListener('click', () => {
    overlay.style.display = 'none';
});

// Edit button
document.querySelectorAll('.edit-btn').forEach(btn => {
    btn.addEventListener('click', e => {
        const card = e.target.closest('.facilities-card');

        document.getElementById("modalTitle").textContent = "Edit Facility";
        form.action = "/admin/facilities/update/" + card.dataset.id;

        form.querySelector("[name='faculty_name']").value = card.dataset.name;
        form.querySelector("[name='type']").value = card.dataset.type;
        form.querySelector("[name='location']").value = card.dataset.location;
        form.querySelector("[name='time_open']").value = card.dataset.time;

        previewImg.src = "/uploads/facilities/" + card.dataset.image;

        overlay.style.display = 'flex';
    });
});

// Image preview
form.querySelector("input[name='image']").addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = e => previewImg.src = e.target.result;
    reader.readAsDataURL(file);
});
