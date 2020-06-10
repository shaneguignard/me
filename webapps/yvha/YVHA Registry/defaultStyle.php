<style> 

#error{
	position: relative;
	top:0;
	left:0;
	color: black;
	padding:5px;
	text-align:center;
	width: 100%;
}
h1{
	text-align:center;
}
a{
	text-decoration: none;
}


#village{
	width: 100%;
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	grid-gap: 20px;
	grid-auto-rows: minmax(100px, auto);
}

#myStreet{
	width:100%;
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	grid-gap: 20px;
	grid-auto-rows: minmax(100px, auto);
}


.streets img{
	height: 200px;
	display: block;
	margin-right: auto;
	margin-left: auto;
}

table{
	border: 1px solid black;
	border-radius: 10px;
	padding: 20px;
	width: 100%;
	text-align: left;
	max-width:500px;
}

table:hover{
	border: 1px solid red;
}

.residents{
	display:block;
	margin-left:auto;
	margin-right:auto;
}
@media only screen and (max-width: 1000px){
	#village, #myStreet{
		grid-template-columns: repeat(2, 1fr);
	}
}
@media only screen and (max-width: 550px){
	#village, #myStreet{
		grid-template-columns: repeat(1, 1fr);
	}
}
</style>