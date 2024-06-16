

const comments_btn = document.getElementsByClassName('comment');
for (let i=0;i<comments_btn.length;i++) {
    const id = comments_btn[i].id;
comments_btn[i].addEventListener('click',()=>{
    window.open('http://127.0.0.1:8000/comments?post_id='+id,'comment',['width:300px','height:300px']);    
})
}


// access required elements
const reacts = document.getElementsByClassName("react")
const love = document.getElementsByClassName("love")[0].textContent
const support = document.getElementsByClassName("support")[0].textContent
const like = document.getElementsByClassName("like")[0].textContent
const sad = document.getElementsByClassName("sad")[0].textContent
const happy = document.getElementsByClassName("happy")[0].textContent
const confused = document.getElementsByClassName("confused")[0].textContent
const trash = document.getElementsByClassName("trash")[0].textContent
// insert action

for (let i=0 ; i<reacts.length ; i++) {
    const post_id = reacts[i].id;
   
    let status = "insert";
reacts[i].addEventListener("change",()=>{
    const value = reacts[i].value;
    
    if ( reacts[i].value != "React"  && reacts[i].value != trash) {
        $.ajax({
            url:"/postreacts?post_id="+post_id+"&value="+value+"&status="+status,
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
        const react_id = reacts[i].role;
        //console.log(react_id);
        $.ajax({
            url:"/postreacts?react_id="+react_id+"&status="+status,
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

