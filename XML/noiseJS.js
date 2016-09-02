
var noiseArray = ["honk"];
document.getElementById("MyPara").innerHTML = noiseArray;
noiseArray.unshift("quack")                                      //Adding noise to begining of array

document.getElementById("MyPara").innerHTML = noiseArray;
noiseArray.push("sneeze");                                       //Adding noise to end of array
document.getElementById("MyPara").innerHTML = noiseArray;

																//Bracket notation to add element to end of array
noiseArray[noiseArray.length] = "bark";
console.log(noiseArray);

var animal = {username:"DaffyDuck",tagline:"Yiepee",noiseArray};
console.log(animal);

function getLength()
{	console.log(noiseArray.length);
	//document.getElementById("MyForm").innerHTML = noiseArray.length;
}

function getIndex()
{	//console.log(noiseArray.length-1);
	console.log(noiseArray.lastIndexOf("chirp"));
}


//Functions to add at end without using length of array.
function addAtEnd()
{	console.log(noiseArray);
	noiseArray.push("roar");
	console.log(noiseArray);
	noiseArray = noiseArray.concat(["chirp"]);
	console.log(noiseArray);
}