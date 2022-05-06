var updateCart = (id)=>{
    console.log({id: id, newVal: parseFloat(document.getElementById("amount"+id).value)})
    $.ajax({
        url: "./php/updateCart.php",
        type: "POST",
        data: {id: id, newVal: parseFloat(document.getElementById("amount"+id).value)},
        success: function (data) {
            console.log(data)
            let result = $.parseJSON(data)
            if(result.success){
                document.getElementById('amount'+id).value=result.newAmount
                document.getElementById('price'+id).innerHTML=result.newPrice
                let payment = 0;
                for(el of document.getElementsByClassName('partPrice')){
                    payment = payment+parseFloat(el.innerHTML)
                }
                document.getElementById('payment').innerHTML= `${payment}zł`
            }else{
                alert(result.error)
                if(result.newAmount!=undefined){
                    document.getElementById('amount'+id).value=result.newAmount
                }
                if(result.newPrice!=undefined){
                    document.getElementById('price'+id).innerHTML=result.newPrice
                }
            }
        } 

    })
}