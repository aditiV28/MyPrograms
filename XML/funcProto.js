function Cat(name,color)
{
	this.name = name;
	this.color = color;
}

Cat.prototype.age = 4;

var fluffy = new Cat('Fluffy','White');
var muffin = new Cat('Muffin','Brown');
console.log(fluffy.age);
fluffy.age = 6;

console.log(fluffy.age);
Cat.prototype.age = 9;

console.log(fluffy.age);
console.log(muffin.age);

var snowbell = Object.create(Cat.prototype);
snowbell.name = "Snowbell";
snowbell.color = "White";
snowbell.voice = "Meow";
console.log(snowbell);
console.log(snowbell.age);
//Cat.prototype.voice = "Meow";

console.log(fluffy.voice);
console.log(muffin.voice);
console.log(snowbell.voice);
