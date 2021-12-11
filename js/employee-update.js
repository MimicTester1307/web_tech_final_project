// Getting the modal element
var modal = document.getElementById('employee-choice-modal');
var recipient = '';

// Adding an event listener to listen for when modal is shown
modal.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget;

  recipient = button.getAttribute('data-bs-whatever'); // retrieving the value stored in the attribute
});

// Function to delete employee using ajax

function deleteEmployee(e) {
  var formData = {
    employeeId: recipient,
  };

  $.ajax({
    url: '../validation/employee-delete-validate.php', // server url
    type: 'POST',
    // async: 'false',
    data: formData,
    success: function (response) {
      alert(response);
    },
  });
}
