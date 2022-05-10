var showCode = (id,e)=>{
    if(e.innerHTML == "Pokaż kod odbioru"){
        $.ajax({
            url: "./php/showCode.php",
            type: "POST",
            data: {id: id},
            success: function (data) {
                let result = $.parseJSON(data)
                
                if(result.success){
                    // alert(result.msg)
                    e.innerHTML = result.code
    
                }else{
                    alert(result.error)
                }
            }
        })
    }else{
        e.innerHTML = "Pokaż kod odbioru"
    }
    
}