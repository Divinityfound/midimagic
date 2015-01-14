$(function() {
    console.log("admin.js is Loaded!");
	var id,field,fieldVal;
	var flag = 0;
	
	$(".quickEdit").click(function(){
		if (flag == 0)
		{
			id = this.classList[1];
			field = $(this).attr("value");
			fieldVal = $(this).html();
			
			$(this).html("<input type='text' name='inputBox' class='inputBox' placeholder='"+field+"' value='"+fieldVal+"' />");
			
			$(".inputBox").focus();
			flag = 1;
		}
	});
	
	$(".quickEdit").focusout(function(){
		if (flag = 1)
		{
			var newVal = $(".inputBox").val();
			$(this).html(newVal);
			if (newVal != fieldVal)
			{
				$.ajax({
				type: "POST",
				url: "adminUpdateJquery.php",
				data: "class="+getParameterByName("view")+"&id="+id+"&key="+field+"&val="+newVal,
				success: function(data)
				{
					alert(data);
				}
			});
			}
			flag = 0;
		}
	});
	
	$(".modalEdit").click(function(){
		$view = getParameterByName("view");
		$id = this.classList[1];
		$("#modalLocation").load("setData.modal.php?view="+$view+"&id="+$id,function(){
			$("#basicModal").modal("show");
		});
	});
	
	$(".newModal").click(function(){
		$view = getParameterByName("view");
		$("#modalLocation").load("setData.modal.php?view="+$view,function(){
			$("#basicModal").modal("show");
		});
	});
	
});

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function logger(data)
{
	console.log(data);
}