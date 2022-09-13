<?php
function auth(){
if(isset($_SESSION['user'])){
   
}
else{
     go("login_user.php");
}

}
auth();
function go($path){
    echo "<script>
    window.location.replace('/courses_booking/$path')
    </script>
    ";
    
    }
?>