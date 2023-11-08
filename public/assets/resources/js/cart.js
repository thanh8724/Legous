let amountElement = document.querySelector('#amount');
let amount = amountElement.value;

let render = (amount) =>{
  amountElement.value = amount;
}
let handlePlus = () =>{
  // Tạo một mảng chứa các giá trị amount đã có sẵn
  let values = [];
  for (let i = 1; i <= amount; i++) {
    values.push(i);
  }

  // Tăng amount lên 1
  amount++;

  // Kiểm tra trùng lặp
  if (!values.includes(amount)) {
    // Render amount mới
    render(amount);
  }
}

let handleMinus = ()=>{
  // Tạo một mảng chứa các giá trị amount đã có sẵn
  let values = [];
  for (let i = 1; i <= amount; i++) {
    values.push(i);
  }

  // Giảm amount xuống 1
  amount--;

  // Kiểm tra trùng lặp
  if (values.includes(amount)) {
    // Render amount cũ
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