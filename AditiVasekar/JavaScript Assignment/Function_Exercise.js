//CREATING AN ANIMAL WITH ONE AND MORE THAN ARGUMENTS

function AnimalTestUser()                          
{
	var obj={};
	obj.username = arguments[0];
	otherArgs = new Array();
		
		for(var i=1;i<arguments.length;i++)
		{
			
				otherArgs.push(arguments[i]);
		}
	obj.otherArgs=otherArgs;
	return obj;
		

}
var testSheep = new AnimalTestUser('Cottonball');
//console.log('AnimalTestUser with only one argument:' + testSheep); 

var testSheep1 = new AnimalTestUser('Cottonball', {'loves dancing':true}, [1,2,3]);
console.log('AnimalTestUser with more than one arguments:'); 
console.log(testSheep1); 
//console.log(testSheep1.otherArgs); 

//----------------------------------------------------------------------------------------------------------------
// CREATING CONSTRUCTOR FUNCTION WHICH RETURNS A SINGLE ANIMAL
function AnimalCreater(username,species,tagline,noises)         
{
	this.username=username;
	this.species=species;
	this.tagline=tagline;
	this.noises=noises;
	
}

var sheep = new AnimalCreater('Cloud','sheep','You can count on me',['bah','arrg','cheww']);
console.log('Animal returned by construcor function:');
console.log(sheep);

sheep.friends = new Array();
 console.log('After adding new property to the animal created by construcor function:'); 
 console.log(sheep); 
//----------------------------------------------------------------------------------------------------------------

// CREATING A FUNCTION TO ADD ANOTHER ANIMAL AS A FRIEND TO EXISTING Animal

AnimalCreater.friends = new Array();
function addFriend(object1,object2)                 
{	
	/*  object1.friends = object2; */
	object1.friends = object2.username;
	
}

var cow = new AnimalCreater('Dolly','Cow','I go Mooo',['moo','moomoo']);
addFriend(sheep,cow);
console.log('Animal after adding new animal as its friend:'); 
console.log(sheep); 
//-----------------------------------------------------------------------------------------------------------------
// CREATING A COLLECTION OF NUMBER OF ANIMALS
var myFarm = [];

function addInFarm(object3)
{
	myFarm.push(object3);

	/* for(var i in myFarm)
	{
		for(var j in object3)
		{
			if(object3.hasOwnProperty(j))
			{
				console.log(j + ':' +myFarm[i][j]);
			}
		}
	} */
} 

var cat = new AnimalCreater('fluffy','cat','I go Meow',['meow','mewww']);
var dog = new AnimalCreater('tommy','dog','I like bones',['bhoo','bark']);
var mouse = new AnimalCreater('stuart','mouse','I like cheese',['ewww','kirk']);

cat.friends = [dog.username,mouse.username];
dog.friends = [sheep.username,cow.username];
mouse.friends = [cow.username,dog.username];


/* addFriend(cat,sheep);
addFriend(cat,cow);
addFriend(dog,cow);
addFriend(mouse,cow); */
addInFarm(cat);
addInFarm(dog);
addInFarm(mouse);
console.log('Collection of animal:');
console.log(myFarm);
//---------------------------------------------------------------------------------------------------------------
// ADDING NEW PROPERTY TO ALL THE ANIMAL OBJECTS
var matchesAray = [];
function addMatchesArray(matchesAray)
{
	for(var i in matchesAray)
	{
			matchesAray[i].matches = [];
	}

}

addMatchesArray(myFarm);
/* console.log('After adding an empty array as a new property to all objects in the collection:'); 
console.log(myFarm);  */
//---------------------------------------------------------------------------------------------------------------
// PICKING UP AN ANIMAL FROM FRIENDS PROPERTY AND ASSIGNING IT TO NEW PROPERTY(BOTH BY RANDOM AND FIRST ELEMENT SELECT)
var giveMatch = myFarm;
function giveMatches(giveMatch)
{
	for(var i in giveMatch)
	{	
		/* var name = giveMatch[i].friends[0];
		giveMatch[i].matches = name;  */
		var random = giveMatch[i].friends[Math.floor(Math.random()*giveMatch[i].friends.length)];
		giveMatch[i].matches = random; 
	
		
	}
}

giveMatches(myFarm);
console.log('After matching one of the friends to matches array:');
console.log(myFarm);

