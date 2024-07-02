if(document.getElementById("category")){
  input = document.getElementById("category");
	input.addEventListener('input', function (event) {
		if(event.target.value == "add") {
			document.getElementById('add-category').classList.add('is-active');
		} else {
			document.getElementById('add-category').classList.remove('is-active');
		}
	});
}

/*if($('#delete-income')) {
	$('#delete-income').on("click", function(e) {
		var _id = $(this).attr('data-id');
        var _row = $(this).parent().parent();

        $.ajax({
            url: 'delete-income.php',
            data: {
                income: _id
            },
            type: 'POST',
            dataType: 'json',
            success: function(__resp) {
                if (__resp.success) {
                    _row.remove();
                }
            }
        });

		e.preventDefault();
	})
}*/

/*function Delete() {

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("delete-income").innerHTML = this.responseText;
       }
     };

   xhttp.open("POST", "delete-income.php", true);
   xhttp.send();
}*/
/*
function Activate() {
    var menu_items = document.querySelectorAll('.menu-item-has-children');

    for (var i = 0; i < menu_items.length; ++i) {
        menu_items[i].classList.add('is-active');
        console.log('done');
    }

    var buttons = document.querySelectorAll('.hero_btn');

    for (var i = 0; i < buttons.length; ++i) {
        buttons[i].classList.add('is-active');
        console.log('done1');
    }
}*/
