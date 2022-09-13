<?php
function go($path){
echo "<script>
window.location.replace('/courses_booking/$path')
</script>
";

}
function auth(){
if(isset($_SESSION['admin'])){
   
}
else{
     go("/login_user.php");
}

}
auth();




?>