let amountElement = document.querySelector('#amount');
let amount = amountElement.value;

let render = (amount) =>{
  amountElement.value = amount;
}
let handlePlus = () =>{
  amount++;
  render(amount);
}

let handleMinus = ()=>{
  if(amount > 1){
    amount--;
    render(amount);
  }
}

amountElement.addEventListener('input',function(){
  amount = amountElement.value;
  amount = parseInt(amount);
  amount = (isNaN(amount) || amount == 0)?1:amount;
  render(amount);
})

// gets a reference to the heartDOm
const heartDOM = document.querySelector('.js-heart');
// initialized like to false when user hasnt selected
let liked = false;

// create a onclick listener
heartDOM.onclick = (event) => {
	// check if liked 
	liked = !liked; // toggle the like ( flipping the variable)
	
	// this is what we clicked on

	const target = event.currentTarget;
    if (liked) {
      // remove empty heart if liked and add the full heart
      target.classList.remove('far');
      target.classList.add('fas', 'pulse');
    } else {
      // remove full heart if unliked and add empty heart
      target.classList.remove('fas');
      target.classList.add('far');
    }

  }

heartDOM.addEventListener('animationend', (event) => {
	event.currentTarget.classList.remove('pulse');
})