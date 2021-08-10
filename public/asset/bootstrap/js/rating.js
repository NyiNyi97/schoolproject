let star = document.querySelectorAll('input');

// let showvalue= document.querySelector('#rating-value');

for (let i = 0; i < star.length; i++) {
	star[i].addEventListener('click', function () {
		i= this.value;

		// showvalue.innerHTML = i + "out of 5";
	})
}