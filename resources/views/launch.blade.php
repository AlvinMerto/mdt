<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title> Launching Mindanao Development Tracker</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<style>

* {
  font-family: "Roboto Condensed", sans-serif;
  font-optical-sizing: auto;
  font-weight: 300;
  font-style: normal;
}

  body {
    margin:0;
    height:100vh;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
    background:#0f1724;
    font-family:"open-sans-launch";
    color:#e6eef8;
        background-image: url("/images/bg_blue.jpg");
      background-repeat: no-repeat;
  background-position: center;
  background-attachment: fixed;
  background-size: cover;
  
  }
    .card {
        width: 70%;
        background: linear-gradient(180deg,rgba(255,255,255,0.02),rgba(255,255,255,0.01));
        padding: 28px;
        display: grid;
        grid-template-columns: 1fr 360px;
        gap: 24px;
        align-items: start;
        margin: 80px auto 0px;
        background: #ffffff14;
        border-radius: 15px;
        position: relative;
        bottom: 0px;
  }
  main {
    padding:20px;
    text-align:center;
  }
  h1, .h1_it {
    font-size: 78px;
    font-weight: bold;
    margin-top: 0px;
    margin-bottom: 0px;
   }
  .progress {
height: 43px;
  width: 830px;
  background: rgba(255,255,255,0.08);
  border-radius: 10px;
  overflow: hidden;
  margin: 17px 0px 4px;
  }
  .bar {
    height:100%;
    width:0%;
    /* background:linear-gradient(90deg,#1ea8ff,#5fe0ff); */
    background: linear-gradient(90deg,#ffb400,#5fe0ff);
    text-align:right;
    font-size:35px;
    font-weight:bold;
    padding-right:6px;
    color:#03202a;
    transition:width 0.3s linear;
  }
  .status {
    margin:15px auto;
    font-size:40px;
    font-weight:bold;
    color:#ffd54f;
  }
  .steps {
   padding: 10px;
  border-radius: 8px;
  font-size: 13px;
  text-align: left;
  margin-left: 30px;
  }
  .steps li {
margin: 10px 0px;
  color: #fff;
  font-size: 43px;
  }
  .steps li.active {
    color:#023542;
    font-weight:bold;
  }
  .steps li.done {
    color:#474f48;
  }
  .success {
    display:none;
    margin-top:10px;
    font-weight:bold;
    color:#22c55e;
  }
  footer {
    padding:30px 30px 0px 0px;
    display:flex;
    justify-content:left;
    gap:40px;
  }
  .launch-btn {
    width:140px;
    height:140px;
    border-radius:50%;
    border:none;
    background:#f60088;
    color:#fff;
    font-size:40px;
    font-weight:bold;
    cursor:pointer;
    box-shadow:0 0 20px rgba(0, 119, 184, 0.6),
               inset 0 0 10px rgba(255,255,255,0.2);
    transition:transform 0.2s, box-shadow 0.3s, background 0.3s;
    position:relative;

      /* Basic styling */
    cursor: pointer;
    outline: none;
    text-transform: uppercase;
    
    /* Color and 3D effect setup */
    box-shadow: 0 8px 0 #950A57;
    
    /* Transition for smooth press effect */
    transition: all 0.05s linear;
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

  .left_align {
    text-align:left;
  }

  .bbm_logo {
    width:100%;
  }


</style>
</head>
<body>
<main class="card">
    <section class="left_align">
        <!-- <h2> Deployment </h2> -->
        <!-- <h1><span style="font-weight: bold;color: #ffb400;">MINDANAO</span> <br/> <span style="font-weight:bold;">Development Tracker</span></h1> -->
        <p class="h1_it" style="margin-bottom: -22px;"><span style="font-weight: bold;color: #ffb400;">MINDANAO</span> 
        <P class="h1_it"><span style="font-weight:bold;">Development Tracker</span></P>
        <div class="progress"><div id="bar" class="bar">0%</div></div>

        <footer>
            <button id="launchBtn1" class="launch-btn">Key 1</button>
            <button id="launchBtn2" class="launch-btn" style="margin-left: 240px;">Key 2</button>
        </footer>

        <ul id="stepsList" class="steps">
            <li>Initializing systems</li>
            <li>Uploading assets</li>
            <li>Verifying integrity</li>
            <li>Deploying modules</li>
            <li>Final checks</li>
        </ul>
         <div id="status" class="status">Status: Waiting for both keys...</div>
        <div id="success" class="success">Launch complete!</div>

    </section>
    <aside style="width: 700px;margin-left: -190px;">
        <img src="{{asset('images/bbm_map.png')}}" class="bbm_logo"/>
    </aside>
</main>



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
    let dur = 2100; // step.duration;
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
  statusBox.textContent = "Status: Launch complete. Redirecting to Mindanao Development Tracker";
  // success.style.display = 'block';
  running = false;

  setTimeout(function(){
      window.open("http://localhost:8000/tracker/mpap", "_self");
  },1000);

// window.open("https://www.mindanaotracker.com/tracker/mpap", "_self");
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
