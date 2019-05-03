<style>
    input[type=submit]{
        background: red;
        color: black;
        font-weight: 900;
        font-size: 48pt;
        display: block;
        height: 300px; 
        width: 300px; 
        border-radius: 50%; 
        margin-left: auto;
        margin-right: auto; 
    }
</style>

<form id='buttonGame' method="POST" action="../secureClick.php">
<input type='hidden' name='device'>
<input type='hidden' name='type'>
<input type='hidden' name='country'>
<input type='submit' value='BUTTON'/>
</form>

<script>
console.log('Hey');
var d = document.getElementsByName('device')[0].value = navigator.platform;
var t = document.getElementsByName('type')[0].value = 'Click';

console.log(x);
</script>