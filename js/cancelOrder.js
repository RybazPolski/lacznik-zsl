var cancel = (id)=>{
    $.ajax({
        url: "./php/cancelOrder.php",
        type: "POST",
        data: {id: id},
        success: function (data) {
            let result = $.parseJSON(data)
            
            if(result.success){
                alert(result.msg)
            }else{
                alert(result.error)
            }
        }
    })
}