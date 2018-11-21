$( document ).ready(function() {

	if ($('#category_count').length){
		$('#category_count').on("change keyup", function(){
			var count = $(this).val();
			var container = $('.category-list');
			var label = $('<label>Nama Kategori: </label>');
			container.empty();
			container.append(label);
			for (var i = 0; i < count; i++){
				var div = $('<div class="form-group"></div>');
				var input = $('<input type="text" class="form-control"/>');
				var added = "category-added-" + i;
				input.addClass(added);
				div.append(input);
				container.append(div);
			}
		});

		$('.category-submit').on("click", function(e){
			e.preventDefault();
			var category = "";
			var count = $('#category_count').val();
			for (var i = 0; i < count; i++){
				var added = ".category-added-" + i;
				// console.log(added);
				var get = $(added);
				category = category + get.val();
				// console.log(category);
				if (!((i+1) == count)){
					category = category + "-";
				}
			}
			// console.log(category);
			$('#category_list').val(category);
			$('.category-form').submit();
		});
	}

	if($('.add-description').length){
		$('.add-description').on("click", function(){
			var container = $('.added-description');
		})
	}

	if($('.category-control-value').length){
		console.log("adakok");
		$('.category-control-value').on("keyup", function(){
				console.log("lol: " + $(this).val());
				if (!$(this).val()){
					$(this).val(0);
				}
		})
	}

});
