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
<input type='hidden' name='browser'>
<input type='submit' value='BUTTON'/>
</form>

<script>
var s = (navigator.userAgent).split(' ').pop();
s = s.split('/');
browser = s[0];
console.log(browser);
var d = document.getElementsByName('device')[0].value = navigator.platform;
var t = document.getElementsByName('type')[0].value = 'Click';
var b = document.getElementsByName('browser')[0].value = browser;
</script>