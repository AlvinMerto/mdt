<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Launch Page</title>
<style>
  :root {
    --bg:#0f1724;
    --accent:#1ea8ff;
    --accent-2:#22c55e;
    --muted:rgba(255,255,255,0.6);
  }
  body {
    margin:0;
    height:100vh;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
    background: radial-gradient(1200px 600px at 10% 20%, rgba(34,197,94,0.06), transparent),
                radial-gradient(1000px 500px at 90% 80%, rgba(30,168,255,0.06), transparent),
                var(--bg);
    font-family:Arial, sans-serif;
    color:#e6eef8;
  }
  main {
  flex: 1;
      padding: 20px;
      display: grid;
      /* grid-template-columns: 1fr 1fr; */
      gap: 30px;
      width: 45%;
      margin: 30px auto 25px;
      background: #303030;
      border-radius: 30px;
  }
  h1 { margin-bottom:10px; }
  .progress {
    margin:20px 0;
    height:14px;
    background:rgba(255,255,255,0.08);
    border-radius:10px;
    overflow:hidden;
  }
  .bar {
    height:100%;
    width:0%;
    background:linear-gradient(90deg,var(--accent),#5fe0ff);
    text-align:right;
    font-size:12px;
    font-weight:bold;
    padding-right:6px;
    color:#03202a;
    transition:width 0.3s linear;
  }
  .log {
    margin-top:20px;
    background:rgba(255,255,255,0.05);
    padding:10px;
    border-radius:8px;
    font-size:12px;
    font-family:monospace;
    color:var(--muted);
    max-height:150px;
    overflow:auto;
  }
  .success {
    display:none;
    margin-top:10px;
    font-weight:bold;
    color:#22c55e;
  }
  .status-box {
    margin-top:10px;
    font-size:14px;
    font-weight:bold;
    color:var(--accent-2);
  }
  ul.steps {
    list-style:none;
    padding:0;
    margin:0;
    display:grid;
    gap:8px;
    margin-top:20px;
  }
  ul.steps li {
    display:flex;
    align-items:center;
    gap:10px;
    padding:8px;
    border-radius:6px;
    background:rgba(255,255,255,0.04);
    font-size:13px;
    color:var(--muted);
  }
  ul.steps li.active {
    color:#fff;
    background:rgba(34,197,94,0.15);
  }
  .dot {
    width:10px;
    height:10px;
    border-radius:50%;
    background:rgba(255,255,255,0.2);
  }
  .active .dot {
    background:var(--accent-2);
  }
  footer {
    padding:3px;
    display:flex;
    justify-content:center;
    gap:30px;
  }
  .launch-btn {
    width:140px;
    height:140px;
    border-radius:50%;
    border:none;
    background:linear-gradient(180deg,var(--accent),#0077b8);
    color:#fff;
    font-size:18px;
    font-weight:bold;
    cursor:pointer;
    box-shadow:0 8px 20px rgba(0,0,0,0.4);
    transition:transform 0.2s;
  }
  .launch-btn:active {
    transform:scale(0.96);
  }
  .confetti {
    position:fixed;
    left:0;
    top:0;
    width:100%;
    height:100%;
    pointer-events:none;
    overflow:hidden;
    z-index:50;
  }
  #l_in {
    display: none;
    text-align: center;
    margin: 12px;
    font-size: 30px;
  }
</style>
</head>
<body>
<main>
  <section>
    <h1>Launch Control</h1>
    <div class="progress"><div id="bar" class="bar">0%</div></div>
    <div id="statusBox" class="status-box">Status: Idle</div>
    <div id="log" class="log">ready</div>
    <div id="success" class="success">Launch complete</div>
    <div id="l_in"></div>
  </section>
  <aside>
    <h2>Launch Steps</h2>
    <ul id="stepsList" class="steps">
      <li><span class="dot"></span> Initializing systems</li>
      <li><span class="dot"></span> Uploading assets</li>
      <li><span class="dot"></span> Verifying integrity</li>
      <li><span class="dot"></span> Deploying modules</li>
      <li><span class="dot"></span> Final checks</li>
    </ul>
  </aside>
</main>

<footer>
  <button id="launchBtn1" class="launch-btn">Launch Key</button>
  <button id="launchBtn2" class="launch-btn">Launch Key</button>
</footer>

<div id="confetti" class="confetti"></div>

<script>
const bar = document.getElementById('bar');
const logBox = document.getElementById('log');
const success = document.getElementById('success');
const confettiRoot = document.getElementById('confetti');
const stepsList = document.querySelectorAll('#stepsList li');
const statusBox = document.getElementById('statusBox');
const l_in = document.getElementById("l_in");

const sequence = [
  { label:'Initializing systems', duration:900 },
  { label:'Uploading assets', duration:1400 },
  { label:'Verifying integrity', duration:1100 },
  { label:'Deploying modules', duration:1600 },
  { label:'Final checks', duration:800 }
];

let running = false;

function logLine(text){
  const time = new Date().toLocaleTimeString();
  logBox.textContent = time+' '+text+'\n'+logBox.textContent;
}

function updateProgress(p){
  bar.style.width = p+'%';
  bar.textContent = p+'%';
}

function setActiveStep(i){
  stepsList.forEach((li,idx)=>{
    li.classList.toggle('active', idx===i);
  });
}

function startLaunch(label){
  if(running) return;
  running = true;
  success.style.display = 'none';
  logLine(label+' started');
  statusBox.textContent = 'Status: '+label+' in progress...';
  let i = 0;
  function nextStep(){
    if(i >= sequence.length){ finishLaunch(); return; }
    let step = sequence[i];
    logLine(step.label);
    statusBox.textContent = 'Status: '+step.label;
    setActiveStep(i);
    let start = Date.now();
    let dur = step.duration;
    let startPercent = i/sequence.length*100;
    let endPercent = (i+1)/sequence.length*100;
    function frame(){
      let t = Math.min(1,(Date.now()-start)/dur);
      let cur = startPercent+(endPercent-startPercent)*t;
      updateProgress(Math.round(cur));
      if(t < 1) requestAnimationFrame(frame);
      else { i++; nextStep(); }
    }
    frame();
  }
  nextStep();
}

function finishLaunch(){
  updateProgress(100);
  logLine('launch complete');
  statusBox.textContent = 'Status: Complete';
  l_in.style.display = "block";

  setTimeout(function(){
      window.open("https://www.mindanaotracker.com/tracker/mpap", "_self");
  },1000);

  success.style.display = 'block';
  triggerConfetti();
  running = false;
}

function triggerConfetti(){
  confettiRoot.innerHTML = '';
  for(let i=0;i<50;i++){
    let el=document.createElement('div');
    let size=Math.random()*8+6;
    el.style.position='absolute';
    el.style.left=Math.random()*100+'%';
    el.style.top='-10%';
    el.style.width=size+'px';
    el.style.height=size*0.6+'px';
    el.style.background='hsl('+Math.random()*360+' 90% 60%)';
    el.style.opacity='0.8';
    el.style.borderRadius='2px';
    confettiRoot.appendChild(el);
    el.animate([
      { transform:'translateY(0) rotate(0)' },
      { transform:'translateY(100vh) rotate(720deg)' }
    ], { duration:2000+Math.random()*2000, easing:'cubic-bezier(.2,.9,.2,1)' });
  }
  setTimeout(()=>confettiRoot.innerHTML='',5000);
}

document.getElementById('launchBtn1').addEventListener('click', ()=>startLaunch('Launch 1'));
document.getElementById('launchBtn2').addEventListener('click', ()=>startLaunch('Launch 2'));
</script>
</body>
</html>
