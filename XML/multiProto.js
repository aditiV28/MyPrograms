function Animal(voice)
{
	this.voice=voice;
}

Animal.prototype.speak = function(){console.log('Grunt')};

function Cat(name,color)
{
	Animal.call(this);
	this.name = name;
	this.color = color;
}

Cat.prototype = Object.create(Animal.prototype);

var fluffy  = new Cat('Fluffy','White');
Cat.prototype.voice = "Meow"; 
console.log(fluffy.name);
console.log(fluffy.color); 

console.log(fluffy.voice);