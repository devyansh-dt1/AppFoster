const inputNum = document.getElementById("number");
const inputTimes = document.getElementById("times");
const splitBtn = document.getElementById("splitButton");
const result = document.getElementById("result");

splitBtn.addEventListener("click", function () {
  const number = parseInt(inputNum.value);
  const split = parseInt(inputTimes.value);
  const arr = [];
  for(let i=0; i<split; i++){
    const parts = Math.floor(number/split);
    arr.push(parts);
  }
  const reminder = number % split;
  for(let i=0; i<reminder; i++){
    arr[i]++;
  }
  result.innerHTML = "";
  arr.sort((a, b) => b - a);
  arr.forEach(function(parts, index){
    const div = document.createElement("div");
    div.className = 'stores';
    div.style.width = `${(parts / number) * 100}%`;
    div.style.background = getRandomColor();
    div.textContent = parts; 
    result.appendChild(div);
  })
});

function getRandomColor() {
  const r = Math.floor(Math.random() * 256);
  const g = Math.floor(Math.random() * 256);
  const b = Math.floor(Math.random() * 256);
  return `rgb(${r}, ${g}, ${b})`;
}