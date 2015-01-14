$(function() {
    console.log("modal.js is Loaded!");
	
	var modalData = [];
	modalData["sign-in-btn"] = "login.modal.php";
	modalData["sign-up-btn"] = "register.modal.php";
	modalData["account-btn"] = "account.modal.php";
	modalData["viewed-btn"] = "viewed.modal.php";
	modalData["cart-btn"] = "cart.modal.php";
	modalData["product-btn"] = "product.modal.php?id=";
	modalData["cart-add-btn"] = "cart.modal.php?id=";
	
	$(".menuModal").click(function(){
		$id = this.classList[1];
		$("#modalLoad").load("modals/menu.modal.php?id="+$id,function(){
			$("#basicModal").modal("show");
		});
	});
	
	$(".modalMake").click(function(){
		$modal = this.classList[1];
		if ($modal == "product-btn")
		{
			modalData["product-btn"] = "product.modal.php?id="+this.classList[2];
		}
		if ($modal == "cart-add-btn")
		{
			modalData["cart-add-btn"] = "cart.modal.php?id="+this.classList[2];
		}
		$("#modalLoad").load("modals/"+modalData[$modal],function() {
			$("#basicModal").modal("show");
		}
	)});
});