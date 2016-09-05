# POOF!

Cross-browser compatible (including legacy browsers) solution for displaying a 'poof' animation on each click or tap (taken from a project for which I needed this).   
Animation is sprite based.  
Uses [Modernizr](https://github.com/Modernizr/Modernizr) to test whether the browser supports css animations or not. Depending on that, used animation is either css or javascript-based. Also uses Compass/SCSS to dynamically determine element dimensions and set up keyframe animation.  
With some small modifications, this can be turned into a plugin and be used to generally animate using sprites, given the parameters (sprite image, element name, frame count,...).  
  
Feedback, bugs, questions? [E-mail](mailto:vanja@gavric.org) me, I'll respond quickly!

## Demo
- Demo can be found on [link](http://vanja.gavric.org/various/poof/).