function submitForm() {
  // Retrieve Form details
  let firstName = $(document.getElementById('event-registration-fName')).val();
  let lastName = $(document.getElementById('event-registration-lName')).val();
  let email = $(document.getElementById('event-registration-email')).val();
  let formData = {
    eventFirstName: firstName,
    eventLastName: lastName,
    eventEmail: email,
  };

  //   alert(firstName);
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
