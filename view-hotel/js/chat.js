$(document).ready(function () {
  $(".gallery li").on("click", function () {
    var dataId = $(this).attr("data-touserid");
    alert("The data-id of clicked item is: " + dataId);
  });
});

function showUserChat(to_user_id) {
  $.ajax({
    url: "chat.php",
    method: "POST",
    data: { to_user_id: to_user_id, action: "show_chat" },
    dataType: "json",
    success: function (response) {
      $("#userSection").html(response.userSection);
      $("#conversation").html(response.conversation);
      // $("#unread_" + to_user_id).html("");
    },
  });
}
