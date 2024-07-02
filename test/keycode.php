<style>
html {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  height: 100%;
  background: #FFCC80;
  text-align: center;
  font-family: monospace;
  line-height: 1.4;
  font-size: 25px;
}

pre {
  text-align: left;
}
</style>


<script>
document.addEventListener("keydown", function(event) {
  
  console.log(event);
    
  document.body.innerHTML = `
    &nbsp;&nbsp;&nbsp;
    <b>which: ${event.which}</b>
    <br>&nbsp;
    <b>keyCode:</b> ${event.keyCode}
    <br>&nbsp;&nbsp;&nbsp;
    <b>shiftKey:</b> ${event.shiftKey}
    </br>&nbsp;&nbsp;&nbsp;&nbsp;
    <b>altKey:</b> ${event.altKey}
    <br>&nbsp;&nbsp;&nbsp;
    <b>ctrlKey:</b> ${event.ctrlKey}
    <br>&nbsp;&nbsp;
    <b>metaKey:</b> ${event.metaKey}
  `;
  
});
</script>