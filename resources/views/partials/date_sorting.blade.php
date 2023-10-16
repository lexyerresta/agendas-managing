<form action="" class="" method="get" id="form_filter" name="form_filter">
    <div class="row mt-2 d-flex justify-content-start">
        <div class="mb-3 col-md-2">
            {{-- <label for="start_date">Start</label> --}}
            <input type="date" class="form-control border border-2 p-2" id="start_date" name="start_date">
        </div>
        <div class="mb-3 col-md-2">
            {{-- <label for="end_date">End</label> --}}
            <input type="date" class="form-control border border-2 p-2" id="end_date" name="end_date">
        </div>
        <div class="mb-3 col-md-2">
            <button class="btn btn-primary border border-2 p-2" type="submit" id="filterBtn">Filter</button>
        </div>
    </div>
</form>

<script>
// // select the start date and end date input fields
// const startDateInput = document.querySelector('#start_date');
// const endDateInput = document.querySelector('#end_date');

// // disable the end date input field initially
// endDateInput.disabled = true;

// // listen for changes in the start date input field
// startDateInput.addEventListener('input', function() {
//   // enable the end date input field if the start date is filled
//   if (startDateInput.value !== '') {
//     endDateInput.disabled = false;
//   } else {
//     endDateInput.disabled = true;
//   }
// });
// //disable end date
// startDateInput.addEventListener('change', function() {
//     endDateInput.disabled = false;
//     endDateInput.min = startDateInput.value;
//     });

const startDateInput = document.querySelector('#start_date');
const endDateInput = document.querySelector('#end_date');
const filterBtn = document.querySelector('#filterBtn');
const form = document.querySelector('#form_filter'); // Replace with your form ID

endDateInput.disabled = true;

startDateInput.addEventListener('input', function() {
  if (startDateInput.value !== '') {
    endDateInput.disabled = false;
  } else {
    endDateInput.disabled = true;
  }
});

startDateInput.addEventListener('change', function() {
  endDateInput.disabled = false;
  endDateInput.min = startDateInput.value;
});

// Check if the URL contains start_date or end_date parameters
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.has('start_date') || urlParams.has('end_date')) {
  filterBtn.innerHTML = 'Clear';
  // Remove the existing 'primary' class
  filterBtn.classList.remove('btn-primary');
  // Add the 'danger' class
  filterBtn.classList.add('btn-danger');
  filterBtn.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the form from submitting
    urlParams.delete('start_date'); // Remove the start_date parameter
    urlParams.delete('end_date'); // Remove the end_date parameter
    const newUrl = window.location.pathname + urlParams.toString();
    window.location.href = newUrl; // Redirect to the updated URL
  });
}
</script>

