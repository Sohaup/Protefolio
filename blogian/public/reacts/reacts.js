

const comments_btn = document.getElementsByClassName('comment');
for (let i=0;i<comments_btn.length;i++) {
    const id = comments_btn[i].id;
comments_btn[i].addEventListener('click',()=>{
    window.open('http://127.0.0.1:8000/comments?post_id='+id,'comment',['width:300px','height:300px']);    
})
}


