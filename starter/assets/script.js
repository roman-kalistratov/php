$(document).ready(function () {
  $("#dataForm").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
      url: "./ajax/process.php",
      type: "POST",
      data: $(this).serialize(),
      success: function (response) {
        $("#dataForm").trigger("reset");
        $("#dataDisplay").html(response);
      },
      error: function () {
        $("#dataDisplay").html("Error fetching data");
      },
    });
  });
});
