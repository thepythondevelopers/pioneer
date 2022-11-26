$(document).ready(function(){

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    
    setProgressBar(current);
    
    $(".next").click(function(){
    
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();
    
    //Add Class Active
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
    
    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;
    
    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    next_fs.css({'opacity': opacity});
    },
    duration: 500
    });
    setProgressBar(++current);
    });
    
    $(".previous").click(function(){
    
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    
    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    
    //show the previous fieldset
    previous_fs.show();
    
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;
    
    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    previous_fs.css({'opacity': opacity});
    },
    duration: 500
    });
    setProgressBar(--current);
    });
    
    function setProgressBar(curStep){
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar")
    .css("width",percent+"%")
    }
    
    $(".submit").click(function(){
    return true;
    })
    
    });

    /* Search Bar */
    $(document).ready(function() {
        $(".input-icon").click(function() {
            $(".search-section").toggleClass("open");
        });
    }); 


    /* range bar */
    const range = document.getElementById("range"),
      tooltip = document.getElementById("tooltip"),
      setValue = () => {
        const newValue = Number(
            ((range.value - range.min) * 100) / (range.max - range.min)
          ),
          newPosition = 16 - newValue * 0.32;
        tooltip.innerHTML = `<span>${range.value}</span>`;
        tooltip.style.left = `calc(${newValue}% + (${newPosition}px))`;
        document.documentElement.style.setProperty(
          "--range-progress",
          `calc(${newValue}% + (${newPosition}px))`
        );
      };
    document.addEventListener("DOMContentLoaded", setValue);
    range.addEventListener("input", setValue); 

    /* Range 2 */
  
    const settings={
      fill: '#fa006e',
      background: '#dee4ec'
    }

    const sliders = document.querySelectorAll('.range-slider');

    Array.prototype.forEach.call(sliders,(slider)=>{
      slider.querySelector('input').addEventListener('input', (event)=>{
        slider.querySelector('span').innerHTML = event.target.value;
        applyFill(event.target);
      });
      applyFill(slider.querySelector('input'));
    });
    function applyFill(slider) {
      const percentage = 100*(slider.value-slider.min)/(slider.max-slider.min);
      const bg = `linear-gradient(90deg, ${settings.fill} ${percentage}%, ${settings.background} ${percentage+0.1}%)`;
      slider.style.background = bg;
}


