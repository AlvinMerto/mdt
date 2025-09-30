<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Dual Launch Control</title>
<style>
  body {
    margin:0;
    height:100vh;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
    background:#0f1724;
    font-family:Arial, sans-serif;
    color:#e6eef8;
        background-image: url("/images/bg_blue.jpg");
      background-repeat: no-repeat;
  background-position: center;
  background-attachment: fixed;
  background-size: cover;
  
  }
  main {
    padding:20px;
    text-align:center;
  }
  h1 { margin-bottom:10px; }
  .progress {
    margin:20px auto;
    height:14px;
    max-width:500px;
    background:rgba(255,255,255,0.08);
    border-radius:10px;
    overflow:hidden;
  }
  .bar {
    height:100%;
    width:0%;
    background:linear-gradient(90deg,#1ea8ff,#5fe0ff);
    text-align:right;
    font-size:12px;
    font-weight:bold;
    padding-right:6px;
    color:#03202a;
    transition:width 0.3s linear;
  }
  .status {
    margin:15px auto;
    font-size:16px;
    font-weight:bold;
    color:#ffd54f;
  }
  .steps {
    margin:20px auto;
    max-width:500px;
    background:rgba(255,255,255,0.05);
    padding:10px;
    border-radius:8px;
    font-size:13px;
    text-align:left;
  }
  .steps li {
    margin:4px 0;
    color:#bbb;
  }
  .steps li.active {
    color:#1ea8ff;
    font-weight:bold;
  }
  .steps li.done {
    color:#22c55e;
  }
  .success {
    display:none;
    margin-top:10px;
    font-weight:bold;
    color:#22c55e;
  }
  footer {
    padding:30px;
    display:flex;
    justify-content:center;
    gap:40px;
  }
  .launch-btn {
    width:140px;
    height:140px;
    border-radius:50%;
    border:none;
    background:#87adc2;
    color:#fff;
    font-size:18px;
    font-weight:bold;
    cursor:pointer;
    box-shadow:0 0 20px rgba(0, 119, 184, 0.6),
               inset 0 0 10px rgba(255,255,255,0.2);
    transition:transform 0.2s, box-shadow 0.3s, background 0.3s;
    position:relative;
  }
  .launch-btn:hover {
    background:#0097dd;
    transform:scale(1.05);
    box-shadow:0 0 30px rgba(0,151,221,0.8),
               inset 0 0 15px rgba(255,255,255,0.3);
  }
  .launch-btn:active {
    transform:scale(0.95);
  }
  .launch-btn.engaged {
    background:#22c55e;
    box-shadow:0 0 25px rgba(34,197,94,0.8);
  }
</style>
</head>
<body>
<main>
  <h1>Dual Launch Control</h1>
  <div class="progress"><div id="bar" class="bar">0%</div></div>
  <div id="status" class="status">Status: Waiting for both keys...</div>

  <ul id="stepsList" class="steps">
    <li>Initializing systems</li>
    <li>Uploading assets</li>
    <li>Verifying integrity</li>
    <li>Deploying modules</li>
    <li>Final checks</li>
  </ul>

  <div id="success" class="success">Launch complete!</div>
</main>

<footer>
  <button id="launchBtn1" class="launch-btn">Key 1</button>
  <button id="launchBtn2" class="launch-btn">Key 2</button>
</footer>

<script>
const bar = document.getElementById('bar');
const statusBox = document.getElementById('status');
const success = document.getElementById('success');
const stepsList = document.getElementById('stepsList').children;

const sequence = [
  { label:'Initializing systems', duration:1000 },
  { label:'Uploading assets', duration:1400 },
  { label:'Verifying integrity', duration:1100 },
  { label:'Deploying modules', duration:1600 },
  { label:'Final checks', duration:900 }
];

let running = false;
let key1Pressed = false;
let key2Pressed = false;

function updateProgress(p){
  bar.style.width = p+'%';
  bar.textContent = p+'%';
}

function tryLaunch(){
  if(key1Pressed && key2Pressed && !running){
    startLaunch();
  }
}

function startLaunch(){
  running = true;
  success.style.display = 'none';
  statusBox.textContent = "Status: Launch sequence started";
  updateSteps(-1); // reset steps
  let i = 0;
  function nextStep(){
    if(i >= sequence.length){ finishLaunch(); return; }
    let step = sequence[i];
    updateSteps(i);
    let start = Date.now();
    let dur = step.duration;
    let startPercent = i/sequence.length*100;
    let endPercent = (i+1)/sequence.length*100;
    function frame(){
      let t = Math.min(1,(Date.now()-start)/dur);
      let cur = startPercent+(endPercent-startPercent)*t;
      updateProgress(Math.round(cur));
      if(t < 1) requestAnimationFrame(frame);
      else { 
        stepsList[i].classList.remove('active');
        stepsList[i].classList.add('done');
        i++; nextStep(); 
      }
    }
    frame();
  }
  nextStep();
}

function updateSteps(activeIndex){
  for(let j=0;j<stepsList.length;j++){
    stepsList[j].classList.remove('active','done');
    if(j < activeIndex) stepsList[j].classList.add('done');
    if(j === activeIndex) stepsList[j].classList.add('active');
  }
}

function finishLaunch(){
  updateProgress(100);
  statusBox.textContent = "Status: Launch complete";
  success.style.display = 'block';
  running = false;

  setTimeout(function(){
      window.open("https://www.mindanaotracker.com/tracker/mpap", "_self");
  },1000);

}

// Button listeners
document.getElementById('launchBtn1').addEventListener('click', (e)=>{
  if(!key1Pressed){
    key1Pressed = true;
    e.target.classList.add('engaged');
    statusBox.textContent = "Status: Key 1 engaged. Waiting for Key 2...";
    tryLaunch();
  }
});

document.getElementById('launchBtn2').addEventListener('click', (e)=>{
  if(!key2Pressed){
    key2Pressed = true;
    e.target.classList.add('engaged');
    statusBox.textContent = "Status: Key 2 engaged. Waiting for Key 1...";
    tryLaunch();
  }
});
</script>
</body>
</html>
