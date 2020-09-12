function getSubCat(val) {
    $.ajax({
        type: "POST",
        url: "inc/actions/getsubcat.php",
        data:'catId='+val,
        success: function(data){
            $("#subcategory").html(data);
        }
    })
}