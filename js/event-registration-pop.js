var modal = document.getElementById('event-registration-modal');
var recipient = '';

modal.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget;

  recipient = button.getAttribute('data-bs-whatever');
});

function submitForm(e) {
  // Retrieve Form details
  var firstName = $(document.getElementById('event-registration-fName')).val();
  var lastName = $(document.getElementById('event-registration-lName')).val();
  var email = $(document.getElementById('event-registration-email')).val();
  var formData = {
    eventFirstName: firstName,
    eventLastName: lastName,
    eventEmail: email,
    eventId: recipient,
  };

  $.ajax({
    url: '../validation/event_registration_validation.php', // server url
    type: 'POST',
    // async: 'false',
    data: formData,
    success: function (response) {
      alert(response);
    },
  });
}
