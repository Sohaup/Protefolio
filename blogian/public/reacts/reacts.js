

// open comments Window
function handleClick(post_id) {   
        const id = post_id;    
        window.open('http://127.0.0.1:8000/comments?post_id='+id,'comment',['width:300px','height:300px']); 
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

// post react

function handleChange(element , post_id , react_id) {  
   
    let status = "insert";
    const value = element.value;
    
    if ( value != "React"  && value != trash) {
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

}
