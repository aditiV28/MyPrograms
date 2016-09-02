var usernames = new Array();
var animals = new Array();

var Cat = {};
Cat.username = 'Fluffy';
Cat.tagline = 'Cat likes milk';
Cat.noises = 'Meow';
animals.push(Cat);


var Cow = {};
Cow.username = 'Dolly';
Cow.tagline = 'Cow is a domestic animal';
Cow.noises = 'Mooo';
animals.push(Cow);

var Sheep = {};
Sheep.username = 'Cloud';
Sheep.tagline = 'Sheep gives wool';
Sheep.noises = 'Meh';
animals.push(Sheep);

usernames[0] = Cat.username;
usernames[1] = Cow.username;
usernames[2] = Sheep.username;
console.log(animals);

var friends = [];
for(var i in animals)
{	if(i<2)
	{
		friends.push(animals[i].username);
	}
}
console.log(friends);


var relationships = {};
console.log(relationships);
relationships.frnds = friends;
console.log(relationships);
var count = 0;
for(var i in relationships)
{
	if(relationships.hasOwnProperty(i))
	{
		count++;
	}
}
console.log('Length of object is:' + count);


relationships.matches = [];
console.log(relationships);
relationships.matches.push(Sheep.username);
console.log(relationships);


for(var i in animals)
{
  animals[i].Relationship = relationships;
}

console.log(animals);