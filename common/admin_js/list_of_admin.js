
  $(document).ready(function() {
    var selectedId;
    $('.btnDelete').click(function() {
      selectedId = this.id;
    });
    $('#deleteModalYes').click(function() {
      $('#deleteModal').dismiss();
      console.log("awts");
    });
  });
    