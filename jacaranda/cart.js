
function myFunction() {
    
    var x = document.getElementById("cart");
    var y = document.getElementById("general");
    var z = document.getElementById("footer")
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
        z.style.position = absolute;
        
        
    } else {
        x.style.display = "none";
        y.style.display = "block";
        z.style.position = relative; 
        
    }
}
document.addEventListener('DOMContentLoaded', function () {
    var el = document.getElementById("shopbag");
        if(el){
            el.addEventListener('click', myFunction);
        }
});
