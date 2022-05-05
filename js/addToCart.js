var addToCart = (id)=>{
    $.ajax({
        url: "./php/addToCart.php",
        type: "POST",
        data: {id: id, n: document.getElementById("quantity"+id).value}, //n reprezentuje ilość. Można będzie zmodyfikować skrypt aby dodać wskazaną przez siebie ilość produktu. (MOSCOW: COULD)
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