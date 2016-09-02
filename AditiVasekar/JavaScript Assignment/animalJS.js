var animal = {
Type:"Dog"};
console.log(animal);

//Dot notation
animal.username = "Bruno";
console.log(animal);
animal['tagline'] = "Bruno is brown in color";
console.log(animal);

//Empty array
var noises = [];
animal.noises = (noises);
console.log(animal);
var count = 0;

//Loop to check number of properties
for(var i in animal)
{	
	if(animal.hasOwnProperty(i))
	{
		console.log(i + ":" + animal[i]);
	}
	count++;
}
console.log('Total no  of properties:'+count);

if(animal.hasOwnProperty('username'))
	{
		console.log("Hi my name is:" +animal.username);	
	}
if(animal.hasOwnProperty('tagline'))
{
	console.log("I like to say:" +animal.tagline);
}

var animals = new Array();
length = animals.length;
animals[length] = animal;
console.log(animals);

var quackers = animal;
animals.push(quackers);
console.log(animals);

//New Object 1
var Cat = {};
Cat.username = 'CaTObject';
Cat.tagline = 'Cat likes milk';
Cat.noises = 'Meow';
animals.push(Cat);
console.log(animals);

//New Object 2
var Cow = {};
Cow.username = 'CowObject';
Cat.tagline = 'Cow is a domestic animal';
Cow.noises = 'Mooo';
animals.push(Cow);
console.log(animals);
console.log('Total length of animals object is:' + animals.length);
