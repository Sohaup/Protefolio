const comment_reacts = document.getElementsByClassName("comment_react")
const trash = document.getElementsByClassName('trash')[0].textContent

// comment reacts
function handleChange(element , post_id , comment_id , react_id) {
    let status = "insert";

    const value = element.value ;
    
    if ( value != "React"  && value != trash) {
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
       
        $.ajax({
            url:"/commentreactsdelete?react_id="+react_id+"&status="+status,
            method:"GET",
            success:function(response) {
                console.log(response)
            },
            error:function(error){
                console.log("Insert React in database failed because "+error)
            }
        })
    }
}


// replay comments reacts
function handleReact(element , post_id , comment_id , replay_comment_id , react_id) {
const value = element.value;
let status = "insert";
if (value != trash && value != "React") {

$.ajax({
    url:"/replaycommentreacts?value="+value+"&post_id="+post_id+"&comment_id="+comment_id+"&replay_comment_id="+replay_comment_id+"&status="+status,
    method:"GET",
    success:function (result) {
        console.log(result)
    },
    error:function (error) {
        console.log("Insert react Failed Because "+err)
    }
})
} else {
    status = "delete";
    $.ajax({
        url:"/replaycommentreactsdelete?status="+status+"&react_id="+react_id ,
        method:"GET",
        success:(result)=>{
            console.log(result)
        },
        error:(error)=>{
            console.log("failed because of"+error)
        }
    })
}
}