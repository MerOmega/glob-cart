items = document.querySelectorAll(".btn-hide");
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