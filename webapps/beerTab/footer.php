<style>
    #foo{
        position: fixed;
        bottom: 0;
        left:0;
        background: black;
        color: white;
        width: 100%;
    }
</style>
<div id='foo'>
Consession App
<!-- <button onclick='clearall()'>Clear All</button> -->
</div>
<script>
function clearall(){
    var c = confirm("Are you sure you want to clear entire tab?");
    if(c == true){
        console.log("Clear all");
    }
    else {
        console.log("Do nothing");
    }
    
    
}
</script>

