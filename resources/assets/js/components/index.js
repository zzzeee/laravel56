import React from "react";
import ReactDOM from 'react-dom';

// import Example from './router/basic';
// import Example from './router/param';
// import Example from './router/auth';
// import Example from './router/custom';
// import Example from './router/preventing-transitions';
// import Example from './router/nomatch';
// import Example from './router/recursive';
// import Example from './router/sidebar';
import Example from './router/animated';

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}