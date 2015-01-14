$(function() {
    console.log("menu.modal.js is Loaded!");
	
	$(".menuModal").click(function(){
		$id = this.classList[1];
		$("#menuModal").load("modals/menu.modal.php?id="+$id,function(){
			$("#basicModal").modal("show");
		});
	});
});