const comment_reacts = document.getElementsByClassName("comment_react")
const trash = document.getElementsByClassName('trash')[0].textContent


for (let i=0 ; i<comment_reacts.length ; i++) {
    const post_id = document.getElementsByClassName('comment')[0].role;
    const comment_id = comment_reacts[i].id;
    let status = "insert";
comment_reacts[i].addEventListener("change",()=>{
    const value = comment_reacts[i].value;
    
    if ( comment_reacts[i].value != "React"  && comment_reacts[i].value != trash) {
        $.ajax({
            url:"/commentreacts?post_id="+post_id+"&value="+value+"&status="+status+"&comment_id="+comment_id,
            method:"GET",
            success:function(response) {
                console.log(response)
            },
            error:function(error){
                console.log("Insert React in database failed because "+error)
            }
        })
    } else {
        status = "delete";
        const react_id = comment_reacts[i].role;
        //console.log(react_id);
        $.ajax({
            url:"/commentreacts?react_id="+react_id+"&status="+status,
            method:"GET",
            success:function(response) {
                console.log(response)
            },
            error:function(error){
                console.log("Insert React in database failed because "+error)
            }
        })
    }
})
}
