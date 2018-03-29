import React from "react";
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, NavLink } from "react-router-dom";

// import Example from './router/basic';
// import Example from './router/param';
// import Example from './router/auth';
// import Example from './router/custom';
import Example from './router/preventing-transitions';
// import Example from './router/nomatch';
// import Example from './router/recursive';
// import Example from './router/sidebar';
// import Example from './router/animated';
// import Example from './router/static';
// import Example from './router/model';

// const Example = () => {
//     return (
//         <Router basename="mobile">
//             <div>
//                 <Title to="/" exact={true} title='Home' />
//                 <Title to="/about" title='About' />
//                 <hr />
//                 <Route exact path="/" render={()=><h3>Home</h3>} />
//                 <Route path="/about" render={()=><h3>About</h3>} />
//             </div>
//         </Router>
//     );
// };

// const Title = ({title, to}) => {
//     return (
//         <div>
//             <NavLink 
//                 exact 
//                 to={to} 
//                 activeClassName={'selected'}
//                 activeStyle={{
//                     fontWeight: 'bold',
//                     color: 'red'
//                 }}
//                 isActive={(a, b)=>{
//                     console.log(a);
//                     console.log(b);
//                     return !!a;
//                 }}
//             >
//                 {title}
//             </NavLink>
//         </div>
//     );
// };


if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}