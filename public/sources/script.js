items = document.querySelectorAll(".btn-hide");
eachStock = document.querySelectorAll(".stock");
eachInput = document.querySelectorAll(".input");

items.forEach(item=>item.addEventListener("click",()=>{
    idItem=item.id.replace(/\D/g, "");
    linked_item=document.getElementById("collapse-"+idItem);
    if(linked_item.classList.contains("collapse")){
        linked_item.classList.remove("collapse");
        linked_item.classList.toggle('collapse.show');
    }else{
        linked_item.classList.remove("collapse.show");
        linked_item.classList.toggle('collapse');
    }
}))

eachInput.forEach(item=>item.addEventListener("keyup",e=>{
    idItem=item.id.replace(/\D/g, "");
    itemStock=document.getElementById("stock-"+idItem);
    stock = itemStock.innerHTML.replace(/\D/g, "");
    if( parseInt(item.value)>stock){
        item.value=stock;
    }
}));

