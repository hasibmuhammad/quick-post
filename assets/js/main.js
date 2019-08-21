;(function($){
    $(document).ready(function(){
        $("#quick-add-button").on("click",function(){
            var quickPost = new XMLHttpRequest();
            var postData = {
                "title": document.querySelector('.admin-quick-add [name="title"]').value,
                "content": document.querySelector('.admin-quick-add [name="content"]').value,
                "status": "publish"
            }
            quickPost.open("POST", magical.url+"/index.php/wp-json/wp/v2/posts");
            quickPost.setRequestHeader("X-WP-NONCE", magical.nonce);
            quickPost.setRequestHeader("Content-Type","application/json;charset:UTF-8");
            quickPost.send(JSON.stringify(postData));
            quickPost.onreadystatechange = function(){
                if(4 == quickPost.readyState){
                    if(201 == quickPost.status){
                        document.querySelector('.admin-quick-add [name="title"]').value = "";
                        document.querySelector('.admin-quick-add [name="content"]').value = "";
                    } else {
                        alert("Error - try again!");
                    }
                }
            }
        });
    });
})(jQuery);